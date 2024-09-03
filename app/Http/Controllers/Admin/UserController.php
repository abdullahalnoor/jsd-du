<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

use DB;
use Session;
use DataTables;


class UserController extends Controller
{

    private $imagePath = 'uploads/images/user';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return $users  = User::with('roles')->get();
      
        // return    $admins  = User::with('roles')->get()[0]->roles[0]->name;
        try
        {
            if($request->ajax()) {
                // $imagePath=$this->publicImagePath;
                $admins  = User::with('roles')->get();

                return Datatables::of($admins)
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
                         ->addColumn('role', function($row){
                             
                            return isset($row->roles[0]) ? $row->roles[0]->name : null;
                          
                        })
                        ->addColumn('action', function($row){
                            $btn = "";
                            $btn .= '&nbsp;';
                            $btn .= ' <a href="'.route('admin.user.edit',$row->id).'" class="btn btn-primary btn-sm "><i class="bi bi-pencil "></i></a>';
                            return $btn;
                        })
                        ->rawColumns(['role','action'])
                        ->make(true); 
            }
        }catch(Exception $e){
             \Log::error('Exception caught: ' . $e->getMessage()); 
             return false;
        }
        return view('admin.user.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       
        // $roles  = Role::where('status',1)->get();
        $roles  = Role::get();
        return view('admin.user.create',\get_defined_vars());
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
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User();

        if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
                if (! file_exists(public_path($this->imagePath))) {
                    mkdir(public_path($this->imagePath), 0777, true);
                }  
                $image->move(public_path().'/'.$this->imagePath,$imageName);
                $user->image = $this->imagePath.'/'.$imageName;
            }else{
                $user->image = \AppHelper::$defaultProfileImage;
            }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  Hash::make( $request->password);
        // $user->status = $request->status;
        $user->save();
    
        $user->roles()->attach($request->role);
 
        // $userRoles =  Admin::with('roles')->find($user->id);
        // foreach($userRoles->roles as $userRole){
        //     // return $userRole->permissions;
        //     $user->permissions()->syncWithoutDetaching($userRole->permissions);
        // }
     
        Session::flash('success','Info Saved successfully..');
        return \redirect()->route('admin.user.index');
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
        $user =  User::with('roles')->find($id);
        // $roles  = Role::where('status',1)->get();
        $roles  = Role::get();
        return view('admin.user.edit',\get_defined_vars());
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


         $user =  User::find($id);

        $this->validate($request,[
            'name' => 'required|string|max:255',            
            'role' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id, 
        ]);
       
        if($request->hasFile('image')){
            @unlink(public_path().'/'.$user->image);
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalExtension();
            if (! file_exists(public_path($this->imagePath))) {
                mkdir(public_path($this->imagePath), 0777, true);
            }  
            $image->move(public_path().'/'.$this->imagePath,$imageName);
            $user->image = $this->imagePath.'/'.$imageName;
        }
       
        $user->name = $request->name;
        $user->email = $request->email;

        // if(isset($request->password)){
        //     $user->password = Hash::make( $request->password);
        // }
        // $user->status = $request->status;
        $user->save();
        $user->roles()->sync($request->role);
 
        // $userRoles =  Admin::with('roles')->find($user->id);
        // foreach($userRoles->roles as $userRole){
        //     // return $userRole->permissions;
        //     $user->permissions()->detach();
        // }
        // foreach($userRoles->roles as $userRole){
        //     // return $userRole->permissions;
        //     $user->permissions()->syncWithoutDetaching($userRole->permissions);
        // }
     
        Session::flash('success','Info Saved successfully..');
        return \redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function resetPassword(Request $request,$id)
    {
        // return $request->all();
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
       
        $user = User::findOrFail($id);
        $user->password =  Hash::make($request->password);
        $user->save();
       

        return back()->with('status', 'password-updated');
    }

    public function deactivateAccount(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->account_status = 2;
        $user->save();
        return back()->with('status', 'password-updated');
    }

    public function activateAccount(Request $request,$id)
    {
        

        $user = User::findOrFail($id);
        $user->account_status = 1;
        $user->save();

        return back()->with('status', 'password-updated');
    }
}
