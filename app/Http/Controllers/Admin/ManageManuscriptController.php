<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Notifications\ManuscriptMail as ManuscriptMailNotification ;

use App\Models\User;
use App\Models\Manuscript;
use App\Models\ManuscriptMail;

use DB;
use Session;
use DataTables;


class ManageManuscriptController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            if($request->ajax()) {
              
                $manuscripts = Manuscript::orderBy('id','desc')->select('*');

                return Datatables::of($manuscripts)
                        ->addIndexColumn()
                        // ->addColumn('status', function($row){
                        //     if($row->status == 1){
                        //         $status = '<span class="me-1 p-2 badge badge-pill bg-primary">Active</span>';
                        //     }else if($row->status == 2){
                        //         $status = '<span class="me-1 p-2 badge badge-pill bg-danger">Inactive</span>';
                        //     }
                        //     return $status;
                          
                        // })
                        // ->addColumn('image', function($row){
                        //      $url = asset($row->image);
                        //     return '<img alt="Image" src="'.$url.'" border="0" width="60" class="img-rounded" align="center" />';
                          
                        // })
                        // ->addColumn('image', function($row){
                        //      $url = asset($row->image);
                        //     return '<img alt="Image" src="'.$url.'" border="0" width="60" class="img-rounded" align="center" />';
                          
                        // })
                        ->addColumn('action', function($row){
                            $btn = "<div class='btn-group' role='group' aria-label='Basic example'>";  ;
                            $btn .= ' <a href="'.route('admin.manage-manuscript.view',$row->id).'" class="btn btn-primary btn-sm "> <i class="bi bi-eye "></i></a>';
                            $btn .=  "</div>";
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        // ->buttons([
                        //     Button::make('add'),
                        //     Button::make('excel'),
                        //     Button::make('csv'),
                        //     Button::make('pdf'),
                        //     Button::make('print'),
                        //     Button::make('reset'),
                        //     Button::make('reload'),
                        // ])
                        ->make(true); 
            }
            // return view('categories.index'); 
        }catch(Exception $e){
            $notification = ['messege'=>'Successfully password has been added',
            'alert-type'=>'error'] ;
            \Log::error('Exception caught: ' . $e->getMessage()); 
            return back()->with( $notification);
           
        }

        return view('admin.manage-manuscript.index',get_defined_vars());
    }

    public function viewManuscript($id){
         $manuscript = Manuscript::with('manuscriptVersion')->findOrFail($id);
         $manuscriptMails = ManuscriptMail::where('manuscript_version_id',$manuscript->manuscriptVersion->id)->orderBy('id','desc')->get();
        return view('admin.manage-manuscript.view',get_defined_vars());
    }

    public function sendMail(Request $request){
        // return $request->all();
      

      DB::beginTransaction();
        try {

            $manuscript = Manuscript::with('manuscriptVersion')->findOrFail($request->manuscript_id);
       
            $user = User::find($manuscript->user_id);  

        $mail_body = " <br/> You have been submitted a manuscript in  ". date('Y-M-d',strtotime($manuscript->submitted_date)).'.';
        $mail_body .= "  <br/> <b>Manuscript Subject</b> is ". $manuscript->subject;
        $mail_body .= " <br/><br/>  <b>Message</b> : ". $request->message;

        $mailMessages = [
                  'send_to' => $user->profile->contact_email,
                  'subject' => $request->subject,
                  'name' => $user->name,
                  'action_text' => 'Mail  Verification',
                   'mail_body' =>  $mail_body,
                  'action_url' => '#',
                  'home_url' => route('frontend.index'),
                  'markdown' =>'mail.manuscript-mail',
              ];

          
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
            // return $e->getMessage();
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
    
}
