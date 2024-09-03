<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AuthorProfile;

use DB;
use Session;
use DataTables;

class ManageAuthorController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try
        {
            if($request->ajax()) {
              
                $authorProfiles = AuthorProfile::orderBy('id','desc')->select('*');

                return Datatables::of($authorProfiles)
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
                            $btn .= ' <a href="'.route('admin.board-member.edit',$row->id).'" class="btn btn-primary btn-sm "> <i class="bi bi-pencil "></i></a>';
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

        return view('admin.manage-author.index',get_defined_vars());
    }
}
