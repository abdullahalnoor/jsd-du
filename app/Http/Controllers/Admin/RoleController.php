<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Models\Admin;
use App\Models\Permission;
use App\Models\PermissionGroup;



use Illuminate\Http\Request;

use DB;
use Session;
use DataTables;





class RoleController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $users  = User::where('status',1)->with('roles')->get();
      
        // return    $admins  = User::with('roles')->get()[0]->roles[0]->name;
        try
        {
            if($request->ajax()) {
                // $imagePath=$this->publicImagePath;
                $roles  = Role::orderBy('id','desc')->select('*');

                return Datatables::of($roles)
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
                            $btn .= ' <a href="'.route('admin.role.edit',$row->id).'" class="btn btn-primary btn-sm "><i class="bi bi-pencil "></i></a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true); 
            }
        }catch(Exception $e){
             \Log::error('Exception caught: ' . $e->getMessage()); 
             return false;
        }
        return view('admin.role.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $permissions = Permission::get(); 
        $permissionGroups = PermissionGroup::with('permissions')->get();
        
        return view('admin.role.create',get_defined_vars());
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
            'slug' => 'required|string|max:300|unique:roles',
        ]);
       
        $role = new Role();
        $role->user_id =  auth()->user()->id ;
	    $role->slug = $request->slug;
	    $role->name = $request->name;
	    $role->save();
        $role->permissions()->attach($request->permission_id);
        Session::flash('success','Info Saved successfully..');
        return \redirect()->route('admin.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role =  Role::with('permissions')->find($id);
        $permissions = Permission::get();
        $permissionGroups = PermissionGroup::with('permissions')->get();
        return view('admin.role.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return  $request->all();
         $role =  Role::find($id);
         $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|string|max:300|unique:roles,slug,'.$role->id, 
        ]);
       
	    $role->user_id =  auth()->user()->id ;
	    $role->slug =  $request->slug;
	    $role->name = $request->name;
	    $role->save();
        $role->permissions()->sync($request->permission_id);

        // $userRoles =  Role::with('users')->find($id);
        // $permissionsId =  $role->permissions->pluck('id');
        // foreach($userRoles->users as $userRole){
        //     $user = Admin::find($userRole->id);
        //     $user->permissions()->detach();
        //     $user->permissions()->syncWithoutDetaching($permissionsId);
        // }
        Session::flash('success','Info Saved successfully..');
        return \redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role =  Role::find($id);
	    $role->delete();
        Session::flash('success','Info Deleted successfully..');
        return back();
    }
}
