<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Models\LogEvent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

use DB;
use Session;

class ProfileController extends Controller
{

    private $imagePath = 'uploads/images/user';


    public function editProfile(){
        return view('admin.profile.edit-profile',get_defined_vars());
    }

    public function updateProfile(Request $request){
        $user =  User::find($id);

        $this->validate($request,[
            'name' => 'required|string|max:255', 
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,webp,svg',           
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
        // $user->email = $request->email;

        $user->save();
        return view('admin.profile.edit-profile',get_defined_vars());
    }

    public function editPassword(){
        return view('admin.profile.edit-password',get_defined_vars());
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
       
        $user = auth()->user();
        $user->password =  Hash::make($request->password);
        $user->save();
       

        // return back()->with('status', 'password-updated');
        return view('admin.profile.edit-password',get_defined_vars());
    }
}
