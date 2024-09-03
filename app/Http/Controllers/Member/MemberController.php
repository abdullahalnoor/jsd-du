<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\AuthorProfile;
use App\Models\Manuscript;
use App\Models\ManuscriptVersion;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;

use App\Notifications\GeneralMail;


use App\Models\ManuscriptMail;

use App\Notifications\ManuscriptMail as ManuscriptMailNotification ;



use Response;
use File;

class MemberController extends Controller
{

   
    
    public function index(){
        // return auth()->user();
        $profile = AuthorProfile::where('user_id',auth()->user()->id)
        ->first();
        return view('frontend.member-profile.index',get_defined_vars());
    }

    
    public function verifyMailForm()
    {
        // return 1;
        if(auth()->user()->account_status == 2){
            return redirect()->route('member.index');
        }
        return view('frontend.member-profile.verify-mail', get_defined_vars());
    }

    public function verifyMail(Request $request){
        if(auth()->user()->account_status == 2){
            return redirect()->route('member.index');
        }
        $verification_code = auth()->user()->verification_code;
        $verification_code = (int) $verification_code;
        $request_verification_code = (int) $request->verification_code;
        if($request_verification_code  === $verification_code){
            $user = auth()->user();
            $user->verification_code = 0;
            $user->is_email_verified = 2;
            $user->account_status = 2;
            $user->random_url = null;
            $user->sent_time = null;
            
            $user->email_verified_at =  date('Y-m-d H:i:s');
             $user->save(); 
          
            Session::flash('success', 'Your mail is verfied. Please update your profile info ..');
        }else{
       
            Session::flash('danger', 'the verification code is incorrect.. Please try again..');
            return back()->withInput();

        }
        return redirect()->route('member.index');
    }

    public function sendMailVerificationCode( )
    {
        $user = auth()->user();

        if ($user && $user->role_id  != 1) {

            if ($user->sent_time < date('Y-m-d H:i:s')) {

                $user->random_url = 0;
                $user->verification_code = rand(0000000, 9999999);
                $time = date('Y-m-d H:i:s');
                $newtime = strtotime($time . '+ 2 minute');
                $user->sent_time = date('Y-m-d H:i:s', $newtime);
                $user->save();
                $mail_body = " <br/> <b> Verification Code : </b>" . $user->verification_code;
                $mailMessages = [
                    'subject' => 'Mail  Verification..',
                    'action_text' => 'Mail  Verification',
                    'mail_body' =>  $mail_body,
                    'action_url' => '#',
                    'home_url' => route('frontend.index'),
                    'markdown' => 'mail.general-mail',
                ];

                $user->notify((new GeneralMail($mailMessages)));

                Session::flash('success', ' Check your Email  ..');
            } else {
                $message = ' An Email already sent ' . $user->updated_at->diffforhumans() . ' .. Please Wait..';
                Session::flash('danger', $message);
            }
        } else {
            // Session::flash('danger', 'Email does not exist in our records..');
        }
        return back()->withInput();
    }
    public function updatePasswordForm(){
       
        return view('frontend.member-profile.update-password', get_defined_vars());
    }

    public function updatePassword(Request $request){

        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            if (Hash::check($request->password, auth()->user()->password)) {
                return redirect()->back()->with('danger','New password cannot be the same as your old password. ');
            }else{
                User::findOrFail(Auth::user()->id)->update([
                    'password' => Hash::make($request->password),
                ]);
    
                return redirect()->back()->with('success','Password Updated Successfully');
    
            }
            

          
        }else{

            return redirect()->back()->with('danger','Current Password does not match with Old Password');
        }
        // return auth()->user();


    //    $validator = Validator::make($request->all(),[
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     if ($validator->fails()) {
    //         Session::flash('danger', 'Please. Fill out form correctly..');

    //         return back()->withErrors($validator)
    //             ->withInput();
    //     }

    //     // $profile = Profile::where('user_id',auth()->user()->id)->firstOrFail();
    //     $profile = auth()->user();
    //     $profile->password = \bcrypt($request->password);
    //     $profile->save();
    //     Session::flash('success','Password Updated successfully..');
    //     // }catch(\Exception $e){
    //     //     Session::flash('error','Please. Fill out form correctly..');
    //     //     DB::rollback();
    //     // }

    //     return back();

    }
    
    public function updateProfileForm(){
        $profile = AuthorProfile::where('user_id',auth()->user()->id)
        ->first();
        return view('frontend.member-profile.update-profile',get_defined_vars());
    }
        public function updateProfile(Request $request){
        // return $request->all();
        $validator = Validator::make($request->all(),[
            // 'image' => 'nullable|max:512',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:512',
            // 'image' => ['required', 'extensions:jpg,png'],
            'name' => 'nullable|string|max:120',
            'affiliation' => 'required|string|max:255',
            'mobile_number' => 'nullable|string|max:50',
            'contact_email' => 'nullable|string|max:255',
            'website_url' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|string|max:255',
          
        ]);

        

        if ($validator->fails()) {
            Session::flash('danger','Please. Fill out form correctly..');
            return back()->withErrors($validator)
            ->withInput();
        }

        DB::beginTransaction();
        try{

            $user = User::find(auth()->user()->id);
            $user->can_submit_journal = 2;
            $user->save();

        $profile = AuthorProfile::where('user_id',auth()->user()->id)->firstOrFail();

        if($request->hasFile('image')){
            // return 6;
            @unlink(public_path().'/'.$profile->image);
            $file = $request->file('image');
            $fileName = 'image-'.time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
            $fileDrectory = 'uploads/author-profile/image/';
            $fileUrl = $fileDrectory.$fileName;
            $file->move(public_path().'/'.$fileDrectory,$fileName);
            $profile->image = $fileUrl;
        }

        // $profile->member_id = $request->member_id;
        // $profile->can_submit_journal = 2;
        $profile->name = $request->name; 
       
        $profile->address = $request->address;
     
        $profile->mobile_number = $request->mobile_number;
        $profile->affiliation = $request->affiliation;

        $profile->contact_email = $request->contact_email;
            $profile->linkedin_url = $request->linkedin_url;
            $profile->website_url = $request->website_url;
        $profile->save();

        DB::commit();
        Session::flash('success','Profile Info Updated successfully..');
        }catch(\Exception $e){
            DB::rollback();
            $status = false;
            // return $e->getMessage();
            return back()->with('danger', 'Internal Server Error....');
        }

        return back();
    }


    

    public function updatePrimaryEmail(Request $request){

        // $email = $request->new_email;
        $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:users',
        ]);
  
       $user = auth()->user();
       $user->email = $request->email;
       $user->save();
       Session::flash('success','Primary E-mail Updated successfully..');
       return back();
    }
    

    public function submitManuscriptForm(){
        if(auth()->check() && auth()->user()->role_id == 2){
            if(auth()->user()->can_submit_journal == 1){
                Session::flash('danger','Please. Update your personal information before submit The Manuscript..');
                return redirect()->route('member.update.profile');
            }else{
                return view('frontend.submit-manuscript.submit-manuscript',get_defined_vars());
            }
        }

        return redirect()->route('member.login.form');
    }
    public function submitManuscript(Request $request){
        $validator = Validator::make($request->all(),[
            // 'image' => 'nullable|max:512',
            'main_file' => 'required|mimes:doc,docx|max:5060',
            'subject' => 'required|string|max:120',
            'abstract' => 'required|string|max:255',
          
        ]);

        
        if ($validator->fails()) {
            Session::flash('danger','Please. Fill out form correctly..');
            return back()->withErrors($validator)
            ->withInput();
        }

        DB::beginTransaction();
        try{


            $manuscript = new Manuscript();
            $manuscript->user_id = auth()->user()->id;
            $manuscript->subject = $request->subject;
            $manuscript->approval_status = 1;
            $manuscript->resubmittable = 1;
            $manuscript->save();
            $manuscriptVersion = new ManuscriptVersion();
            if($request->hasFile('main_file')){
                // @unlink(public_path().'/'.$manuscriptVersion->main_file);
                $file = $request->file('main_file');
                $fileName = 'main_file_1'.time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $fileDrectory = 'uploads/manuscript/main-file/';
                $fileUrl = $fileDrectory.$fileName;
                $file->move(public_path().'/'.$fileDrectory,$fileName);
                $manuscriptVersion->main_file = $fileUrl;
            }
            $manuscriptVersion->manuscript_id = $manuscript->id;
            $manuscriptVersion->version_no = 1;
            $manuscriptVersion->abstract = $request->abstract;
            $manuscriptVersion->approval_status = 1;
            $manuscriptVersion->save();

        DB::commit();
        Session::flash('success','The Manuscript has been successfully submitted..');
        }catch(\Exception $e){
            DB::rollback();
            $status = false;
            // return $e->getMessage();
            return back()->with('danger', 'Internal Server Error....');
        }

        return redirect()->route('member.my.manuscript');
    }

    public function myManuscript(){
        $manuscripts = Manuscript::where('user_id',auth()->user()->id,auth()->user()->id)
                                ->orderBy('id','desc')->get();
        return view('frontend.submit-manuscript.my-manuscript',get_defined_vars());
    }

    public function viewManuscript($id){
         $manuscript = Manuscript::with('manuscriptVersion')->findOrFail($id);
         $manuscriptMails = ManuscriptMail::where('manuscript_version_id',$manuscript->manuscriptVersion->id)->orderBy('id','desc')->get();
        return view('frontend.submit-manuscript.view-manuscript',get_defined_vars());
    }
    public function sendMail(Request $request){
    // return $request->all();

    DB::beginTransaction();
    try {

        $manuscript = Manuscript::with('manuscriptVersion')->findOrFail($request->manuscript_id);
   
    $mail_body = " <br/> You have been submitted a manuscript in  ". date('Y-M-d',strtotime($manuscript->submitted_date)).'.';
    $mail_body .= "  <br/> <b>Manuscript Subject</b> is ". $manuscript->subject;
    $mail_body .= " <br/><br/>  <b>Message</b> : ". $request->message;

    $mailMessages = [
              'send_to' => 'kristinrlutz@gmail.com',
              'subject' => $request->subject,
              'name' => "JSD-ISWR",
              'action_text' => 'Mail Verification',
               'mail_body' =>  $mail_body,
              'action_url' => '#',
              'home_url' => route('frontend.index'),
              'markdown' =>'mail.manuscript-mail',
          ];

     $user = User::find($manuscript->user_id);     
        //   return $user->profile;
      $user->notify((new ManuscriptMailNotification($mailMessages)));

      $manuscriptMail = new ManuscriptMail();
      $manuscriptMail->user_id  = $manuscript->user_id;
      $manuscriptMail->manuscript_id  = $manuscript->id;
      $manuscriptMail->manuscript_version_id  =  $manuscript->manuscriptVersion->id;
      $manuscriptMail->subject  = $request->subject;
      $manuscriptMail->message  = $request->message;
      $manuscriptMail->save();

        DB::commit();
       
    } catch (\Exception $e) {
        return $e->getMessage();
        // Session::flash('danger', 'Please. Fill out form correctly..');
        DB::rollback();
        $notification = ['messege'=>'Internal Server Error...',
        'alert-type'=>'error'] ;
        \Log::error('Exception caught: ' . $e->getMessage()); 
        return  back()->with( $notification);
        return \redirect()->route('admin.manage-manuscript.view',$manuscript->id)->with( $notification);

    }
    
    // Session::flash('success', 'Info Saved successfully..');
    $notification = ['messege'=>'Successfully Mail has been send',
    'alert-type'=>'success'] ;
    // return view('admin.journal-article.create',get_defined_vars())->with( $notification);
    return  back()->with( $notification);
    return \redirect()->route('admin.manage-manuscript.view',$manuscript->id)->with( $notification);
  
    
    }
    public function myJournal()
    {
        $journal = Journal::firstOrFail();
        $myJournals = JournalSubmission::with('journalVersion')
                        ->where('user_id',auth()->user()->id)
                         ->orderBy('id', 'desc')
                        ->paginate(15);
        return view('frontend.submit-journal.my-journal', \get_defined_vars());
    }


    public function submitJournalForm()
    {
        $journal = Journal::firstOrFail();
        $journalSubmission =  JournalSubmission::where('user_id', auth()->user()->id)
        ->first();
        $progress = [
            'title'=>true,
            'author' => false,
            'file' => false,
            'view' => false,
        ];
       
            return view('frontend.submit-journal.submit-journal', \get_defined_vars());
       
        
    }

    public function submitJournal(Request $request){
        // return $request->all();
        $validator =  Validator::Make($request->all(), [
            'title' => 'required',
            'abstract' => 'required',
            // 'authors' => 'required',
            'keywords' => 'required',
            // 'contact_mail' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('danger', 'Please. Fill out form correctly..');

            return back()->withErrors($validator)
            ->withInput();
        }

        DB::beginTransaction();

        try {


            $journalSubmission = new JournalSubmission();
            $journalSubmission->user_id = auth()->user()->id;

            $journalSubmission->approval_status = 0;
            $journalSubmission->save();

            $journalVersion = new JournalVersion();
            $journalVersion->journal_submission_id = $journalSubmission->id;
            $journalVersion->title = $request->title;
            $journalVersion->abstract = $request->abstract;
            $journalVersion->keywords = $request->keywords;
            $journalVersion->submit_status = 1;
            
            $journalVersion->save();
            DB::commit();
            $status = true;
        } catch (\Exception  $e) {
            // return  $message = $e->getMessage();
            // return  $message = $e->getLine();
            DB::rollback();
            $status = false;
            return back()->with('danger', 'Internal Server Error....')->withInput();
        }
       

        Session::flash('success', 'Your journal info saved successfully....');
        return redirect()->route('member.submit.journal-author',['id'=>\encrypt($journalSubmission->id)]);

    }

    

    public function submitJournalManuscript(Request $request,$id)
    {
        // return $request->all();
        $validator =  Validator::Make($request->all(), [
            'status' => 'required',
          
        ]);

        if ($validator->fails()) {
            Session::flash('danger', 'Please. Fill out form correctly..');

            return back()->withErrors($validator)
                ->withInput();
        }
//   return $request->all();
        DB::beginTransaction();

        try {

            $journalSubmission =  JournalSubmission::find($id);
            if($journalSubmission->submit_status != 2){
                $journalSubmission->submit_status = $request->status;
            }
            // $journalSubmission->user_id = auth()->user()->id;
            // $journalSubmission->insert_status = 1;
            // $journalSubmission->approval_status = 0;
         
            $journalSubmission->save();

            $journalVersion = JournalVersion::where('journal_submission_id', $journalSubmission->id)
                ->where('submit_status', 1)
                ->first();

           
            $journalVersion->submit_status = $request->status;

            $journalVersion->save();

            // $user = User::find(auth()->user()->id);
            if($request->status == 2){
                 $user = auth()->user();

                $mail_body = " <br/> Manuscript Submission ";
                $mailMessages = [
                    'subject' => 'Manuscript Submission..',
                    'action_text' => 'Manuscript Submission',
                    'mail_body' =>  $mail_body,
                    'action_url' => '#',
                    'home_url' => route('frontend.index'),
                    'markdown' => 'mail.general-mail',
                ];

                $user->notify((new GeneralMail($mailMessages)));

                $gsbsm2020 = User::where('email','gsbsm2020@gmail.com')->first();
                if($gsbsm2020){
                    $gsbsm2020->notify((new GeneralMail($mailMessages)));
                }
                $bjmeditor19 = User::where('email','bjmeditor19@gmail.com')->first();
                if($gsbsm2020){
                    $bjmeditor19->notify((new GeneralMail($mailMessages)));
                }
                
                
            }
           

            DB::commit();
            $status = true;
        } catch (\Exception  $e) {
            // return  $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('danger', 'Internal Server Error....')->withInput();
        }
        // return 1;


        Session::flash('success', 'Your Manuscript Submitted successfully....');
        return redirect()->route('member.my.journal');
    }



    public function submitJournalAuthorForm($id)
    {
        $id = \decrypt($id);
        $journal = Journal::first();
        $journalSubmission =  JournalSubmission::where('id', $id)
        ->where('user_id', auth()->user()->id)
        ->firstOrFail();

        $manuscriptAuthors =  ManuscriptAuthor::where('journal_submission_id', $journalSubmission->id)
                                ->get();

        $progress = [
            'title' => true,
            'author' => true,
            'file' => false,
            'view' => false,
        ];


        return view('frontend.submit-journal.journal-author', \get_defined_vars());
    }

    public function submitJournalAuthor(Request $request, $id)
    {

        // return $request->all();

        DB::beginTransaction();

        try {


            $journalSubmission =  JournalSubmission::where('id', $id)
                ->where('user_id', auth()->user()->id)
                ->firstOrFail();


            $manuscriptAuthor = new ManuscriptAuthor();
            $manuscriptAuthor->journal_submission_id  = $journalSubmission->id;
            $manuscriptAuthor->name  = $request->name;
            // $manuscriptAuthor->address  = $request->address;
               $manuscriptAuthor->order_by  = $request->order_by;
            $manuscriptAuthor->email  = $request->email;
            $manuscriptAuthor->is_contact_person  = isset($request->corespondent) ? 1 : 0;
            $manuscriptAuthor->save();
            
            DB::commit();
            $status = true;
        } catch (\Exception  $e) {
            return  $message = $e->getMessage();
            DB::rollback();
            return ['data' => '', 'status' => false];
       
            $status = false;
            return back()->with('danger', 'Internal Server Error....')->withInput();
        }
        return ['data' => $manuscriptAuthor, 'status' => true];
    }

    public function deleteJournalAuthor($id){
        DB::beginTransaction();

        try {


            $manuscriptAuthor =  ManuscriptAuthor::findOrFail($id);
            $manuscriptAuthor->delete();

            DB::commit();
            $status = true;
        } catch (\Exception  $e) {
            // return  $message = $e->getLine();
            DB::rollback();
            return ['data' => '', 'status' => false];
           
            $status = false;
            return back()->with('danger', 'Internal Server Error....')->withInput();
        }
        return ['data' => '', 'status' => true];
    }



    public function submitJournalFigureFileForm($id)
    {
        $id = \decrypt($id);
        $journal = Journal::first();
        $journalSubmission =  JournalSubmission::where('id', $id)
        ->where('user_id', auth()->user()->id)
        ->firstOrFail();

        $journalVersion = JournalVersion::where('journal_submission_id', $journalSubmission->id)
            ->where('submit_status', 1)
            ->first();

        $manuscriptFigures =  ManuscriptFigure::where('journal_version_id', $journalVersion->id)
            ->get();
        $manuscriptTables =  ManuscriptTable::where('journal_version_id', $journalVersion->id)
            ->get();

        $manuscriptSupplements =  ManuscriptSupplement::where('journal_version_id', $journalVersion->id)
            ->get();

        $progress = [
            'title' => true,
            'author' => true,
            'file' => true,
            'view' => false,
        ];

        return view('frontend.submit-journal.upload-journal', \get_defined_vars());
    }



    public function submitJournalFigureFile(Request $request, $id)
    {
        // return $request->all();
        $validator =  Validator::Make($request->all(), [
            'figure' => 'required',

        ]);

        if ($validator->fails()) {
            return ['data' => '', 'status' => false,'message'=>''];
            // Session::flash('danger', 'Please. Fill out form correctly..');

            // return back()->withErrors($validator)
            // ->withInput();
        }


        DB::beginTransaction();

        try {

            $journalSubmission =  JournalSubmission::where('id', $id)
                ->where('user_id', auth()->user()->id)
                ->firstOrFail();

             $journalVersion = JournalVersion::where('journal_submission_id',$journalSubmission->id)
                            ->where('submit_status',1)
                            ->first();

            
            if (!$journalSubmission) {
                abort(404);
            }


            $manuscriptFigure = new ManuscriptFigure();
            if ($request->hasFile('figure')) {
              

                // @unlink(public_path() . '/' . $journalSubmission->submitted_file);
                $file = $request->file('figure');
                $fileName = auth()->user()->id . '-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $fileDrectory = 'frontend/journal/volume-abstract/user-files/figures/';
                $fileUrl = $fileDrectory . $fileName;
                $file->move(public_path() . '/' . $fileDrectory, $fileName);
                $manuscriptFigure->figure = $fileUrl;
               
            }


          
            $manuscriptFigure->title = $request->title;
            $manuscriptFigure->journal_version_id = $journalVersion->id;
            $manuscriptFigure->save();

            DB::commit();
            $status = true;
        } catch (\Exception  $e) {
            
            DB::rollback();
            // return  $message = $e->getMessage();
            return ['data' => '', 'status' => false, 'message' => ''];
            $status = false;
            return back()->with('danger', 'Internal Server Error....');
        }
        return ['data' => $manuscriptFigure, 'status' => true, 'message' => ''];

    }

    public function deleteJournalFigureFile($id){
        DB::beginTransaction();

        try {
            // return $id;

             $manuscriptFigure =  ManuscriptFigure::where('id',$id)->firstOrFail();
            @unlink(public_path() . '/' . $manuscriptFigure->figure);
            $manuscriptFigure->delete();
        
            DB::commit();
            $status = true;
        } catch (\Exception  $e) {

            DB::rollback();
            return  $message = $e->getMessage();
            return ['data' => '', 'status' => false, 'message' => ''];
            $status = false;
            return back()->with('danger', 'Internal Server Error....');
        }
        return ['data' => '', 'status' => true, 'message' => ''];
    }











    public function submitJournalTableFile(Request $request, $id)
    {
        // return $request->all();
        $validator =  Validator::Make($request->all(), [
            'figure' => 'required',

        ]);

        if ($validator->fails()) {
            return ['data' => '', 'status' => false, 'message' => ''];
            // Session::flash('danger', 'Please. Fill out form correctly..');

            // return back()->withErrors($validator)
            // ->withInput();
        }


        DB::beginTransaction();

        try {

            $journalSubmission =  JournalSubmission::where('id', $id)
                ->where('user_id', auth()->user()->id)
                ->firstOrFail();

            $journalVersion = JournalVersion::where('journal_submission_id', $journalSubmission->id)
                ->where('submit_status', 1)
                ->first();


            if (!$journalSubmission) {
                abort(404);
            }


            $manuscriptTable = new ManuscriptTable();
            if ($request->hasFile('figure')) {


                // @unlink(public_path() . '/' . $journalSubmission->submitted_file);
                $file = $request->file('figure');
                $fileName = auth()->user()->id . '-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $fileDrectory = 'frontend/journal/volume-abstract/user-files/tables/';
                $fileUrl = $fileDrectory . $fileName;
                $file->move(public_path() . '/' . $fileDrectory, $fileName);
                $manuscriptTable->figure = $fileUrl;
            }



            $manuscriptTable->title = $request->title;
            $manuscriptTable->journal_version_id = $journalVersion->id;
            $manuscriptTable->save();

            DB::commit();
            $status = true;
        } catch (\Exception  $e) {

            DB::rollback();
            // return  $message = $e->getMessage();
            return ['data' => '', 'status' => false, 'message' => ''];
            $status = false;
            return back()->with('danger', 'Internal Server Error....');
        }
        return ['data' => $manuscriptTable, 'status' => true, 'message' => ''];
    }

    public function deleteJournalTableFile($id)
    {
        DB::beginTransaction();

        try {
            // return $id;

            $manuscriptTable =  ManuscriptTable::where('id', $id)->firstOrFail();
            @unlink(public_path() . '/' . $manuscriptTable->figure);
            $manuscriptTable->delete();

            DB::commit();
            $status = true;
        } catch (\Exception  $e) {

            DB::rollback();
            return  $message = $e->getMessage();
            return ['data' => '', 'status' => false, 'message' => ''];
            $status = false;
            return back()->with('danger', 'Internal Server Error....');
        }
        return ['data' => '', 'status' => true, 'message' => ''];
    }







    public function submitJournalSupplementFile(Request $request, $id)
    {
        // return $request->all();
        $validator =  Validator::Make($request->all(), [
            'figure' => 'required',

        ]);

        if ($validator->fails()) {
            return ['data' => '', 'status' => false, 'message' => ''];
            // Session::flash('danger', 'Please. Fill out form correctly..');

            // return back()->withErrors($validator)
            // ->withInput();
        }


        DB::beginTransaction();

        try {

            $journalSubmission =  JournalSubmission::where('id', $id)
                ->where('user_id', auth()->user()->id)
                ->firstOrFail();

            $journalVersion = JournalVersion::where('journal_submission_id', $journalSubmission->id)
                ->where('submit_status', 1)
                ->first();


            if (!$journalSubmission) {
                abort(404);
            }


            $manuscriptSupplement = new ManuscriptSupplement();
            if ($request->hasFile('figure')) {


                // @unlink(public_path() . '/' . $journalSubmission->submitted_file);
                $file = $request->file('figure');
                $fileName = auth()->user()->id . '-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $fileDrectory = 'frontend/journal/volume-abstract/user-files/supplements/';
                $fileUrl = $fileDrectory . $fileName;
                $file->move(public_path() . '/' . $fileDrectory, $fileName);
                $manuscriptSupplement->figure = $fileUrl;
            }



            $manuscriptSupplement->title = $request->title;
            $manuscriptSupplement->journal_version_id = $journalVersion->id;
            $manuscriptSupplement->save();

            DB::commit();
            $status = true;
        } catch (\Exception  $e) {

            DB::rollback();
            // return  $message = $e->getMessage();
            return ['data' => '', 'status' => false, 'message' => ''];
            $status = false;
            return back()->with('danger', 'Internal Server Error....');
        }
        return ['data' => $manuscriptSupplement, 'status' => true, 'message' => ''];
    }

    public function deleteJournalSupplementFile($id)
    {
        DB::beginTransaction();

        try {
            // return $id;

            $manuscriptSupplement =  ManuscriptSupplement::where('id', $id)->firstOrFail();
            @unlink(public_path() . '/' . $manuscriptSupplement->figure);
            $manuscriptSupplement->delete();

            DB::commit();
            $status = true;
        } catch (\Exception  $e) {

            DB::rollback();
            return  $message = $e->getMessage();
            return ['data' => '', 'status' => false, 'message' => ''];
            $status = false;
            return back()->with('danger', 'Internal Server Error....');
        }
        return ['data' => '', 'status' => true, 'message' => ''];
    }




    public function submitJournalMainFile(Request $request, $id)
    {
        // return $request->all();
        $validator =  Validator::Make($request->all(), [
            'main_file' => 'required',

        ]);

        if ($validator->fails()) {
            return ['data' => '', 'status' => false, 'message' => ''];
            // Session::flash('danger', 'Please. Fill out form correctly..');

            return back()->withErrors($validator);
        }


        DB::beginTransaction();

        try {

            $journalSubmission =  JournalSubmission::where('id', $id)
                ->where('user_id', auth()->user()->id)
                ->firstOrFail();
            if (!$journalSubmission) {
                abort(404);
            }

            $journalVersion = JournalVersion::where('journal_submission_id', $journalSubmission->id)
                ->where('submit_status', 1)
                ->first();


            if (!$journalVersion) {
                abort(404);
            }


       
            if ($request->hasFile('main_file')) {


                @unlink(public_path() . '/' . $journalVersion->main_file);
                $file = $request->file('main_file');
                $fileName = auth()->user()->id . '-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $fileDrectory = 'frontend/journal/volume-abstract/user-files/';
                $fileUrl = $fileDrectory . $fileName;
                $file->move(public_path() . '/' . $fileDrectory, $fileName);
                $journalVersion->main_file = $fileUrl;
            }

            $journalVersion->save();

            DB::commit();
            $status = true;
        } catch (\Exception  $e) {

            DB::rollback();
              $message = $e->getMessage();
            return ['data' => '', 'status' => false, 'message' =>   $message];
            $status = false;
            return back()->with('danger', 'Internal Server Error....');
        }
        return ['data' => $journalVersion, 'status' => true, 'message' => ''];
    }




    public function submitJournalFigureFile1(Request $request, $id)
    {
        return $request->all();
        $validator =  Validator::Make($request->all(), [
            'figure' => 'required',

        ]);

        if ($validator->fails()) {
            return ['data' => '', 'status' => false, 'message' => ''];
            // Session::flash('danger', 'Please. Fill out form correctly..');

            // return back()->withErrors($validator)
            // ->withInput();
        }


        DB::beginTransaction();

        try {

            $journalSubmission =  JournalSubmission::where('id', $id)
                ->where('user_id', auth()->user()->id)
                ->firstOrFail();
            if (!$journalSubmission) {
                abort(404);
            }

            if ($request->hasFile('submitted_file')) {

                @unlink(public_path() . '/' . $journalSubmission->submitted_file);
                $file = $request->file('submitted_file');
                $fileName = auth()->user()->id . '-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $fileDrectory = 'frontend/journal/volume-abstract/user-files/';
                $fileUrl = $fileDrectory . $fileName;
                $file->move(public_path() . '/' . $fileDrectory, $fileName);

                $journalSubmission->submitted_file = $fileUrl;
            }
            $journalSubmission->submit_status = 2;
            $journalSubmission->approval_status = 0;
            $journalSubmission->save();


            DB::commit();
            $status = true;
        } catch (\Exception  $e) {
            // return  $message = $e->getLine();
            DB::rollback();
            $status = false;
            return back()->with('danger', 'Internal Server Error....');
        }


        Session::flash('success', 'Your journal info saved successfully....');
        return redirect()->route('member.my.journal');
    }
    

    public function viewJournalDetail($id)
    {
        $id = \decrypt($id);
        $journal = Journal::firstOrFail();
        $journalSubmission =  JournalSubmission::where('id', $id)
        ->where('user_id', auth()->user()->id)
        ->firstOrFail();


        return view('frontend.submit-journal.view-journal-version', \get_defined_vars());
    }

    

    public function viewJournalVersionDetail($id)
    {
        $id = \decrypt($id);
        $journal = Journal::firstOrFail();

        $journalVersion = JournalVersion::with('journalSubmission')->find($id); 
        // $journalSubmission =  JournalSubmission::where('id', $id)
        // ->where('user_id', auth()->user()->id)
        // ->firstOrFail();


        $manuscriptAuthors =  ManuscriptAuthor::where('journal_submission_id', $journalVersion->journalSubmission->id)
        ->get();

        

        $manuscriptFigures =  ManuscriptFigure::where('journal_version_id', $journalVersion->id)
        ->get();
        $manuscriptTables =  ManuscriptTable::where('journal_version_id', $journalVersion->id)
        ->get();

        $manuscriptSupplements =  ManuscriptSupplement::where('journal_version_id', $journalVersion->id)
        ->get();

        return view('frontend.submit-journal.view-journal-version-detail', \get_defined_vars());
    }

    public function viewJournal($id)
    {

        $id = \decrypt($id);
        $journal = Journal::firstOrFail();
        $journalSubmission =  JournalSubmission::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->firstOrFail();


        $journalVersion = JournalVersion::where('journal_submission_id', $journalSubmission->id)
            ->where('submit_status', 1)
            ->first();


        if (!$journalVersion->main_file) {
           
            Session::flash('danger', 'Please. Upload Manuscript Main File..');

            return back();
        }

      


        $manuscriptAuthors =  ManuscriptAuthor::where('journal_submission_id', $journalSubmission->id)
            ->get();

      

        $manuscriptFigures =  ManuscriptFigure::where('journal_version_id', $journalVersion->id)
            ->get();
        $manuscriptTables =  ManuscriptTable::where('journal_version_id', $journalVersion->id)
            ->get();

        $manuscriptSupplements =  ManuscriptSupplement::where('journal_version_id', $journalVersion->id)
            ->get();

        $progress = [
            'title' => true,
            'author' => true,
            'file' => true,
            'view' => true,
        ];
        return view('frontend.submit-journal.view-journal', \get_defined_vars());
    }


    

    public function resubmitJournalForm($id)
    {

        $id = \decrypt($id);
        $journal = Journal::firstOrFail();
        $journalSubmission =  JournalSubmission::where('id', $id)
        ->where('user_id', auth()->user()->id)
        ->firstOrFail();

     

        $progress = [
            'title' => true,
            'author' => false,
            'file' => false,
            'view' => false,
        ];
        return view('frontend.submit-journal.resubmit-journal', \get_defined_vars());
    }

    

    public function resubmitJournalVersion(Request $request, $id)
    {
        // return $request->all();
        $validator =  Validator::Make($request->all(), [
            'title' => 'required',
            'abstract' => 'required',
            // 'authors' => 'required',
            'keywords' => 'required',
            // 'contact_mail' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('danger', 'Please. Fill out form correctly..');

            return back()->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {


            $journalSubmission =  JournalSubmission::find($id);
            
            $journalSubmission->resubmite_status = 1;
            // $journalSubmission->user_id = auth()->user()->id;
            // $journalSubmission->insert_status = 1;
            // $journalSubmission->approval_status = 0;
            $journalSubmission->save();

            $journalVersion = new JournalVersion();
            $journalVersion->journal_submission_id = $journalSubmission->id;
            $journalVersion->title = $request->title;
            $journalVersion->abstract = $request->abstract;
            $journalVersion->keywords = $request->keywords;
            $journalVersion->submit_status = 1;

            $journalVersion->save();
            DB::commit();
            $status = true;
        } catch (\Exception  $e) {
            // return  $message = $e->getLine();
            DB::rollback();
            $status = false;
            return back()->with('danger', 'Internal Server Error....')->withInput();
        }


        Session::flash('success', 'Your journal info saved successfully....');
        return redirect()->route('member.submit.journal-author', ['id' => \encrypt($journalSubmission->id)]);
    }
   
    public function editJournalForm($id)
    {

        $id = \decrypt($id);
        $journal = Journal::firstOrFail();
        $journalSubmission =  JournalSubmission::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->firstOrFail();

        $journalVersion = JournalVersion::where('journal_submission_id', $journalSubmission->id)
            ->where('submit_status', 1)
            ->first();

        $progress = [
            'title' => true,
            'author' => false,
            'file' => false,
            'view' => false,
        ];
        return view('frontend.submit-journal.edit-journal', \get_defined_vars());
    }

    public function editJournal(Request $request,$id)
    {
        // return $request->all();
        $validator =  Validator::Make($request->all(), [
            'title' => 'required',
            'abstract' => 'required',
            // 'authors' => 'required',
            'keywords' => 'required',
            // 'contact_mail' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('danger', 'Please. Fill out form correctly..');

            return back()->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {


            $journalSubmission =  JournalSubmission::find($id);
            // $journalSubmission->user_id = auth()->user()->id;
            // $journalSubmission->insert_status = 1;
            // $journalSubmission->approval_status = 0;
            // $journalSubmission->save();

            $journalVersion = JournalVersion::where('journal_submission_id', $journalSubmission->id)
            ->where('submit_status', 1)
            ->first();
            $journalVersion->journal_submission_id = $journalSubmission->id;
            $journalVersion->title = $request->title;
            $journalVersion->abstract = $request->abstract;
            $journalVersion->keywords = $request->keywords;
            $journalVersion->submit_status = 1;

            $journalVersion->save();
            DB::commit();
            $status = true;
        } catch (\Exception  $e) {
            // return  $message = $e->getLine();
            DB::rollback();
            $status = false;
            return back()->with('danger', 'Internal Server Error....')->withInput();
        }


        Session::flash('success', 'Your journal info saved successfully....');
        return redirect()->route('member.submit.journal-author', ['id' => \encrypt($journalSubmission->id)]);

    }
    


    public function tan(){
        DB::beginTransaction();

        try {


            DB::commit();
            $status = true;
        } catch (\Exception  $e) {
            // return  $message = $e->getLine();
            DB::rollback();
            $status = false;
            return back()->with('danger', 'Internal Server Error....');
        }
    }








}
