<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuthorProfile;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Notifications\ForgotPasswordNotification;
use App\Notifications\GeneralMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Auth;


class AuthorizationController extends Controller
{
  
    public function  forgetPassword(){
       
        return view('frontend.authorization.forget-password',\get_defined_vars());
    }

    public function sendResetPasswordMail(Request $request){
         $user = User::where('email',$request->email)->first();
        
        // test
        //   $user->notify((new ForgotPasswordNotification()));
        //         Session::flash('success',' Check your Email  ..');
        //           return back()->withInput();
        // end test
        
        if($user && $user->role_id == 2){
            // return 5;
            if($user->sent_time < date('Y-m-d H:i:s') ){
           
                $user->random_url = Str::random(120);
                $time = date('Y-m-d H:i:s');
                $newtime = strtotime($time.'+ 2 minute');
                $user->sent_time = date('Y-m-d H:i:s', $newtime);
                $user->save();
              
                $user->notify((new ForgotPasswordNotification()));
                Session::flash('success',' Check your Email  ..');
                
                //   $mail_body = " <br/> Test Mail - Manuscript Submission  ";
                //  $mailMessages = [
                //     'subject' => 'Test Mail - Manuscript Submission..',
                //     'action_text' => 'Test Mail -Manuscript Submission',
                //     'mail_body' =>  $mail_body,
                //     'action_url' => '#',
                //     'home_url' => route('frontend.index'),
                //     'markdown' => 'mail.general-mail',
                // ];


                // $gsbsm2020 = User::where('email','gsbsm2020@gmail.com')->first();
                // if($gsbsm2020){
                //     $gsbsm2020->notify((new GeneralMail($mailMessages)));
                // }
                // $bjmeditor19 = User::where('email','bjmeditor19@gmail.com')->first();
                // if($gsbsm2020){
                //     $bjmeditor19->notify((new GeneralMail($mailMessages)));
                // }
                // return 1;
               
                
            }else {
                $message = ' An Email already send '.$user->updated_at->diffforhumans().' .. Please Wait  2 minutes..';
                Session::flash('danger',$message);
                // return 2;


                
            }
     
        }else {
            Session::flash('danger', 'Email does not exist in our records..');
            
        }
        return back()->withInput();
        
    }
    


    
  public function resetPasswordForm($url){
     $user = User::where('random_url',$url)->firstOrFail();
    
     if($user && \strlen($user->random_url) == 120){

        $reset_key = \encrypt($user->id).'.'.Crypt::encryptString($user->email);
        Session::flash('success','Hi '.$user->profile->name.' Reset Your Password..');
        return view('frontend.authorization.reset-password',\get_defined_vars());
     }
     return redirect()->route('frontend.index'); 
  }

  public function resetPassword(Request $request){

   
    $this->validate($request,[
        'password' => 'required|string|min:8|confirmed',
    ]);

    $reset_key =  \explode('.',$request->reset_key);
    $id =  \decrypt($reset_key[0]);
    $email =  Crypt::decryptString($reset_key[1]);
    $user = User::where('id',$id)
                ->where('email',$email)
                ->first();
    if($user){
       
        $user->password = \bcrypt($request->password);
        $user->random_url = null;
        $user->sent_time = null;
        $user->save();
       
    }
   
    Session::flash('success','Hi ! '.$user->profile->name.', Your Password Chnaged Successfully..');
    return \redirect()->route('member.login.form');
    
  }

  public function memberLoginForm(){
    
    return view('frontend.authorization.login',\get_defined_vars());
  }

    public function memberRegisterForm()
    {

        return view('frontend.authorization.register', \get_defined_vars());
    }


    public function memberRegister(Request $request){
        $this->validate($request, [
            'password' => 'required|string|min:8|confirmed',
            // 'terms_and_conditions' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {

            
        $user = new  User();
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->on_editorial_board = 1;
        $user->role_id = 2;
        // $user->user_type = 3;
        $user->account_status = 1;
        $user->is_email_verified = 1;
        
        $user->verification_code = rand(0000000, 9999999);
        $time = date('Y-m-d H:i:s');
        $newtime = strtotime($time . '+ 2 minute');
        $user->sent_time = date('Y-m-d H:i:s', $newtime);
        
        $user->password = \bcrypt($request->password);
        $user->save();

        $profile =  new AuthorProfile();

        // if ($request->hasFile('image')) {


        //     $this->globalImageUnlink($profile->image);

        //     $originalImage = $request->file('image');
        //     $imageName = uniqid() . time() . '.' . $originalImage->getClientOriginalExtension();
        //     $imagePath = 'frontend/images/profile-images/';
        //     $image = Image::make($originalImage);
        //     $image->resize(350, 450);

        //     $imageFullPath = $imagePath . $imageName;
        //     $this->globalImageSave($image, $imageFullPath);

        //     $profile->image =  $imagePath . $imageName;
        // }

        $profile->user_id = $user->id;

        // $profile->email = $request->email;
        $profile->name = $request->name;
        // $profile->profile_order = $request->profile_order;
        // $profile->spouse_name = $request->spouse_name;
        // $profile->blood_group = $request->blood_group;
        // $profile->dob = $request->dob;
        // $profile->dom = $request->dom;
        // $profile->no_children = $request->no_children;
        // $profile->designation = $request->designation;
        // $profile->organization = $request->organization;
        // $profile->address = $request->address;
        // $profile->office_number = $request->office_number;
        // $profile->res_number = $request->res_number;
        // $profile->affiliation = $request->affiliation;
        // $profile->specialization = $request->specialization;
        // $profile->mobile_number = $request->mobile_number;
        $profile->save();

        $mail_body = " <br/> Verification Code : ". $user->verification_code;
          $mailMessages = [
                    'subject' => 'Mail  Verification..',
                    'action_text' => 'Mail  Verification',
                     'mail_body' =>  $mail_body,
                    'action_url' => '#',
                    'home_url' => route('frontend.index'),
                    'markdown' =>'mail.general-mail',
                ];

        $user->notify((new GeneralMail($mailMessages)));

          Auth::login($user, true);
          $message = 'A message with a verification code has been sent to your mail. 
          Enter the code to continue. Didn\'t get a verification code? Click "Resend Verification Code" button .';
          Session::flash('success',  $message);
            DB::commit();
           
        } catch (\Exception $e) {
            // return $e->getMessage();
            Session::flash('danger', 'Please. Fill out form correctly..');

            DB::rollback();
            // $notification = ['messege'=>'Successfully password has been added',
            // 'alert-type'=>'error'] ;
            \Log::error($this->errorTrace().'@store & Exception caught : ' . $e->getMessage());
            return back();
        }
        
        return redirect()->route('member.verify.mail');
       
    }

    
}
