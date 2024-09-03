<?php


namespace App\Http\Controllers\Admin;

use App\Models\JournalVolume;
use App\Models\JournalIssue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Session;
use DataTables;

class JournalIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            if($request->ajax()) {
              
                $journalIssues = JournalIssue::orderBy('id','desc')->select('*');

                return Datatables::of($journalIssues)
                        ->addIndexColumn()
                        ->addColumn('status', function($row){
                            if($row->status == 1){
                                $status = '<span class="me-1 p-2 badge badge-pill bg-primary">Active</span>';
                            }else if($row->status == 2){
                                $status = '<span class="me-1 p-2 badge badge-pill bg-danger">Inactive</span>';
                            }
                            return $status;
                          
                        })
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
                            $btn .= ' <a href="'.route('admin.journal-article.show',$row->id).'" class="btn btn-info btn-sm "><i class="bi bi-info "></i></a>';
                            $btn .= ' <a href="'.route('admin.journal-issue.edit',$row->id).'" class="btn btn-primary btn-sm "> <i class="bi bi-pencil "></i></a>';
                            $btn .=  "</div>";
                            return $btn;
                        })
                        ->rawColumns(['status','action'])
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

        return view('admin.journal-issue.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $journalVolumes = JournalVolume::where('status',1)->get();
        return view('admin.journal-issue.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'volume_no' => 'required',
        // ]);
        DB::beginTransaction();
        try {

            $journalIssue = new JournalIssue();

            if($request->hasFile('cover_image')){
                // @unlink(public_path().'/'.$journalIssue->cover_image);
                $file = $request->file('cover_image');
                $fileName = 'cover_image-'.time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $fileDrectory = 'uploads/issue/cover-image/';
                $fileUrl = $fileDrectory.$fileName;
                $file->move(public_path().'/'.$fileDrectory,$fileName);
                $journalIssue->cover_image = $fileUrl;
            }

            // $journalIssue->user_id = auth()->user()->id;
            $journalIssue->journal_volume_id = $request->journal_volume;
            $journalIssue->chief_editor = $request->chief_editor;
            $journalIssue->issue_no = $request->issue_no;
            $journalIssue->page_no = $request->page_no;
            $journalIssue->title = $request->title;
            $journalIssue->publish_date = date('Y-m-d',strtotime($request->publish_date));
            $journalIssue->order_id = $request->order_id;
            $journalIssue->status = $request->status;
            $journalIssue->save();
            DB::commit();
           
        } catch (\Exception $e) {
            return $e->getMessage();
            // Session::flash('danger', 'Please. Fill out form correctly..');
            DB::rollback();
            $notification = ['messege'=>'Internal Server Error...',
            'alert-type'=>'error'] ;
            \Log::error('Exception caught: ' . $e->getMessage()); 
            return back()->with( $notification);
        }
        
        // Session::flash('success', 'Info Saved successfully..');
        $notification = ['messege'=>'Successfully data has been added',
        'alert-type'=>'success'] ;
        return \redirect()->route('admin.journal-issue.index')->with( $notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(JournalIssue $journalIssue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JournalIssue $journalIssue)
    {
        $journalVolumes = JournalVolume::where('status',1)->get();
        return view('admin.journal-issue.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JournalIssue $journalIssue)
    {
        // $this->validate($request,[
        //     'volume_no' => 'required',
        // ]);
        DB::beginTransaction();
        try {
            if($request->hasFile('cover_image')){
                @unlink(public_path().'/'.$journalIssue->cover_image);
                $file = $request->file('cover_image');
                $fileName = 'cover_image-'.time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $fileDrectory = 'uploads/issue/cover-image/';
                $fileUrl = $fileDrectory.$fileName;
                $file->move(public_path().'/'.$fileDrectory,$fileName);
                $journalIssue->cover_image = $fileUrl;
            }
            // $journalIssue->user_id = auth()->user()->id;
            $journalIssue->journal_volume_id = $request->journal_volume;
            $journalIssue->chief_editor = $request->chief_editor;
            $journalIssue->issue_no = $request->issue_no;
            $journalIssue->page_no = $request->page_no;
            $journalIssue->title = $request->title;
            $journalIssue->publish_date = date('Y-m-d',strtotime($request->publish_date));
            $journalIssue->order_id = $request->order_id;
            $journalIssue->status = $request->status;
            $journalIssue->save();
            DB::commit();
           
        } catch (\Exception $e) {
            return $e->getMessage();
            // Session::flash('danger', 'Please. Fill out form correctly..');
            DB::rollback();
            $notification = ['messege'=>'Internal Server Error...',
            'alert-type'=>'error'] ;
            \Log::error('Exception caught: ' . $e->getMessage()); 
            return back()->with( $notification);
        }
        
        // Session::flash('success', 'Info Saved successfully..');
        $notification = ['messege'=>'Successfully data has been added',
        'alert-type'=>'success'] ;
        return \redirect()->route('admin.journal-issue.index')->with( $notification);
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JournalIssue $journalIssue)
    {
        //
    }
}
