<?php

namespace App\Http\Controllers\Admin;

use App\Models\SitePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Session;
use DataTables;

class SitePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            if($request->ajax()) {
              
                $sitePages = SitePage::orderBy('id','desc')->select('*');

                return Datatables::of($sitePages)
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
                            $btn .= ' <a href="'.route('admin.site-page.edit',$row->id).'" class="btn btn-primary btn-sm "> <i class="bi bi-pencil "></i></a>';
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

        return view('admin.site-page.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SitePage $sitePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SitePage $sitePage)
    {
        return view('admin.site-page.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SitePage $sitePage)
    {
        DB::beginTransaction();
        try {

            // $journalIssue = JournalIssue::findOrFail($id);
            // $journalArticle =  JournalArticle::find($id);

            if($request->hasFile('pdf_file')){
                @unlink(public_path().'/'.$sitePage->pdf_file);
                $file = $request->file('pdf_file');
                $fileName = 'pdf_file-'.time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $fileDrectory = 'uploads/site-page/pdf/';
                $fileUrl = $fileDrectory.$fileName;
                $file->move(public_path().'/'.$fileDrectory,$fileName);
                $sitePage->pdf_file = $fileUrl;
            }
         
            $sitePage->name = $request->name;
            $sitePage->title = $request->title;
            $sitePage->description = $request->description;
            $sitePage->status = $request->status;
            $sitePage->save();



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
        $notification = ['messege'=>'Successfully data has been updated',
        'alert-type'=>'success'] ;
        // return view('admin.journal-article.create',get_defined_vars())->with( $notification);
        return \redirect()->route('admin.site-page.index')->with( $notification);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SitePage $sitePage)
    {
        //
    }
}
