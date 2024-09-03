<?php


namespace App\Http\Controllers\Admin;



use App\Models\Permission;
use App\Models\Admin;
use App\Models\Role;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Session;
use DataTables;

class PermissionController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        try
        {
            if($request->ajax()) {
              
                $permissions  = Permission::all();

                return Datatables::of($permissions)
                        ->addIndexColumn()
                        // ->addColumn('status', function($row){
                        //     if($row->status == 1){
                        //         $status = '<span class="me-1 p-2 badge badge-pill bg-primary">Active</span>';
                        //     }else if($row->status == 2){
                        //         $status = '<span class="me-1 p-2 badge badge-pill bg-danger">Inactive</span>';
                        //     }
                        //     return $status;
                          
                        // })
                        // ->addColumn('image', function($row)  use ($imagePath){
                        //      $url = asset($imagePath.$row->image);
                        //     return '<img alt="Image" src="'.$url.'" border="0" width="60" class="img-rounded" align="center" />';
                          
                        // })
                        ->addColumn('action', function($row){
                            $btn = "";
                            $btn .= '&nbsp;';
                            $btn .= ' <a href="'.route('admin.permission.edit',$row->id).'" class="btn btn-primary btn-sm "><i class="bi bi-pencil "></i></a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true); 
            }
        }catch(Exception $e){
             \Log::error('Exception caught: ' . $e->getMessage()); 
             return false;
        }
        return view('admin.permission.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'route' => 'required|string|max:300|unique:permissions',
        ]);
        $permission = new Permission();
	    $permission->route = $request->route;
	    $permission->name = $request->name;
	    $permission->save();
        Session::flash('success','Info Saved successfully..');
        return \redirect()->route('admin.permission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        // $permission =  Permission::find($id);
        return view('admin.permission.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|max:255',
            'route' => 'required|string|max:300|unique:permissions,route,'.$permission->id, 
        ]);
        
	    $permission->route =$request->route;
	    $permission->name = $request->name;
	    $permission->save();
        Session::flash('success','Info Saved successfully..');
        return \redirect()->route('admin.permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        // $permission =  Permission::find($id);
	    $permission->delete();
        Session::flash('success','Info Deleted successfully..');
        return back();
    }
}
