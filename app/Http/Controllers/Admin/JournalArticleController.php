<?php
namespace App\Http\Controllers\Admin;

use App\Models\JournalArticle;
use App\Models\JournalIssue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Session;
use DataTables;

class JournalArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$id)
    {
        try
        {
            if($request->ajax()) {
              
                $journalArticles = JournalArticle::where('journal_issue_id',$id)->orderBy('id','desc')->select('*');

                return Datatables::of($journalArticles)
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
                            // $btn .= ' <a href="'.route('admin.journal-article.edit',$row->id).'" class="btn btn-info btn-sm "><i class="bi bi-info "></i></a>';
                            $btn .= ' <a href="'.route('admin.journal-article.edit',$row->id).'" class="btn btn-primary btn-sm "> <i class="bi bi-pencil "></i></a>';
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

        return view('admin.journal-article.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $journalIssue = JournalIssue::findOrFail($id);
        return view('admin.journal-article.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        // $this->validate($request,[
        //     'volume_no' => 'required',
        // ]);
        DB::beginTransaction();
        try {

            // $journalIssue = JournalIssue::findOrFail($id);
            $journalArticle = new JournalArticle();

            if($request->hasFile('pdf_file')){
                // @unlink(public_path().'/'.$journalArticle->pdf_file);
                $file = $request->file('pdf_file');
                $fileName = 'pdf_file-'.time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $fileDrectory = 'uploads/journal/article/pdf/';
                $fileUrl = $fileDrectory.$fileName;
                $file->move(public_path().'/'.$fileDrectory,$fileName);
                $journalArticle->pdf_file = $fileUrl;
            }
            // $journalArticle->user_id = auth()->user()->id;
            $journalArticle->journal_issue_id = $id;
       
            $journalArticle->page_no = $request->page_no;
            $journalArticle->title = $request->title;
            $journalArticle->doi_url = $request->doi_url;
            $journalArticle->abstract = $request->abstract;
            $journalArticle->authors = $request->authors;
            $journalArticle->keywords = $request->keywords;
            $journalArticle->order_id = $request->order_id;
            $journalArticle->status = $request->status;
            $journalArticle->save();



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
        // return view('admin.journal-article.create',get_defined_vars())->with( $notification);
        return \redirect()->route('admin.journal-article.show',$id)->with( $notification);
    
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $route = route('admin.journal-article.index',$id);
         $journalIssue = JournalIssue::findOrFail($id);
        return view('admin.journal-article.index',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $journalArticle = JournalArticle::findOrFail($id);
        return view('admin.journal-article.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
          // $this->validate($request,[
        //     'volume_no' => 'required',
        // ]);
        DB::beginTransaction();
        try {

            // $journalIssue = JournalIssue::findOrFail($id);
            $journalArticle =  JournalArticle::find($id);

            if($request->hasFile('pdf_file')){
                @unlink(public_path().'/'.$journalArticle->pdf_file);
                $file = $request->file('pdf_file');
                $fileName = 'pdf_file-'.time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $fileDrectory = 'uploads/journal/article/pdf/';
                $fileUrl = $fileDrectory.$fileName;
                $file->move(public_path().'/'.$fileDrectory,$fileName);
                $journalArticle->pdf_file = $fileUrl;
            }
            // $journalArticle->user_id = auth()->user()->id;
            // $journalArticle->journal_issue_id = $id;
       
            $journalArticle->page_no = $request->page_no;
            $journalArticle->title = $request->title;
            $journalArticle->doi_url = $request->doi_url;
            $journalArticle->abstract = $request->abstract;
            $journalArticle->authors = $request->authors;
            $journalArticle->keywords = $request->keywords;
            $journalArticle->order_id = $request->order_id;
            $journalArticle->status = $request->status;
            $journalArticle->save();



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
        // return $journalArticle->journal_issue_id;
        // Session::flash('success', 'Info Saved successfully..');
        $notification = ['messege'=>'Successfully data has been added',
        'alert-type'=>'success'] ;
        // return view('admin.journal-article.create',get_defined_vars())->with( $notification);
        return \redirect()->route('admin.journal-article.show',$journalArticle->journal_issue_id)->with( $notification);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JournalArticles $journalArticles)
    {
        //
    }
}
