<?php

namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\CategoryInterface;

use DB;
use Auth;
use Session;
use DataTables;

class CategoryRepository implements CategoryInterface
{
    public function fetch($request){
        try
        {
            // if($request->ajax()) {
                $imagePath= "images/";
                $categories = Category::all();

                return Datatables::of($categories)
                        ->addIndexColumn()
                        ->addColumn('status', function($row){
                            if($row->status == 1){
                                $status = '<span class="me-1 p-2 badge badge-pill bg-primary">Active</span>';
                            }else if($row->status == 2){
                                $status = '<span class="me-1 p-2 badge badge-pill bg-danger">Inactive</span>';
                            }
                            return $status;
                          
                        })
                        ->addColumn('image', function($row)  use ($imagePath){
                             $url = asset($imagePath.$row->image);
                            return '<img alt="Image" src="'.$url.'" border="0" width="60" class="img-rounded" align="center" />';
                          
                        })

                        ->addColumn('action', function($row){
                            $url = route('admin.category.destroy',$row->id);
                            $bsElement = "<p>This action cannot be undo. The record will be delete permanently
                            from the database.</p>
                            <a class='btn btn-danger po-delete'
                            href='".$url."'>I am sure</a> 
                            <a class='btn btn-info   custom-popover-close'>No</a>";


                            // $bsForm = "<p>This action cannot be undo. The record will be delete permanently
                            // from the database.</p>
                            // <form action='".$url."' method='POST'>
                            // @csrf
                            // @method('DELETE')
                            // <button class='btn btn-danger po-delete'
                            // type='submit'>I am sure</button> 
                            // <a class='btn btn-info   custom-popover-close'>No</a>
                            // </form>";
                            
                            $btn = "";
                            $btn .= '<div class="btn-group" role="group">&nbsp;';
                            $btn .= ' <a href="'.route('admin.category.edit',$row->id).'" class="btn btn-primary btn-sm tooltips " data-bs-toggle="tooltip" data-bs-title="Edit Record"><i class="bi bi-pencil "></i></a>';
                            $btn .= '&nbsp;';
                            // $btn .= ' <a href="'.$row->id.'" class="btn btn-danger btn-sm m-1"><i class="bi bi-trash "></i></a>'; 
                            $btn .= ' <div  class="btn btn-danger btn-sm tooltips  custom-popover" 
                             data-bs-container="body" 
                             data-bs-toggle="tooltip"
                             data-bs-toggle="popover" 
                             data-bs-placement="left"
                             data-bs-title="Delete Record"
                             data-bs-content="'.$bsElement.'" > <i class="bi bi-trash "></i></div></div>';
                            
                            return $btn;
                            // $btn .= '<a href="#" class="'."btn btn-danger po-delete".'" >
                            // I am sure</a>
                            // <a  class="'."btn btn-info  popover-dismiss po-close".'"  >No</a>"';
                        })
                        ->rawColumns(['status','image','action'])
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
            // }
            // return view('categories.index'); 
        }catch(Exception $e){
             \Log::error('Exception caught: ' . $e->getMessage()); 
             return false;
        }
    }
}