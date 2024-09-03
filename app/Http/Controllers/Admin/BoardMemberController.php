<?php

namespace App\Http\Controllers\Admin;

use App\Models\BoardMember;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Session;
use DataTables;

class BoardMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            if($request->ajax()) {
              
                $boardMembers = BoardMember::orderBy('id','desc')->select('*');

                return Datatables::of($boardMembers)
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
                            $btn .= ' <a href="'.route('admin.board-member.edit',$row->id).'" class="btn btn-primary btn-sm "> <i class="bi bi-pencil "></i></a>';
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

        return view('admin.board-member.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.board-member.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

           
            $boardMember = new BoardMember();

            if($request->hasFile('image')){
                // @unlink(public_path().'/'.$boardMember->image);
                $file = $request->file('image');
                $fileName = 'image-'.time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $fileDrectory = 'uploads/board-member/image/';
                $fileUrl = $fileDrectory.$fileName;
                $file->move(public_path().'/'.$fileDrectory,$fileName);
                $boardMember->image = $fileUrl;
            }
           
       
            $boardMember->name = $request->name;
            $boardMember->designation = $request->designation;
            $boardMember->affiliation = $request->affiliation;
            $boardMember->order_id = $request->order_id;
            $boardMember->status = $request->status;
            $boardMember->save();



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
        return \redirect()->route('admin.board-member.index')->with( $notification);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(BoardMember $boardMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoardMember $boardMember)
    {
        return view('admin.board-member.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BoardMember $boardMember)
    {
        DB::beginTransaction();
        try {

           
            if($request->hasFile('image')){
                // return 6;
                @unlink(public_path().'/'.$boardMember->image);
                $file = $request->file('image');
                $fileName = 'image-'.time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $fileDrectory = 'uploads/board-member/image/';
                $fileUrl = $fileDrectory.$fileName;
                $file->move(public_path().'/'.$fileDrectory,$fileName);
                $boardMember->image = $fileUrl;
            }
            // return 1;
           
       
            $boardMember->name = $request->name;
            $boardMember->designation = $request->designation;
            $boardMember->affiliation = $request->affiliation;
            $boardMember->order_id = $request->order_id;
            $boardMember->status = $request->status;
            $boardMember->save();



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
        return \redirect()->route('admin.board-member.index')->with( $notification);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoardMember $boardMember)
    {
        //
    }
}
