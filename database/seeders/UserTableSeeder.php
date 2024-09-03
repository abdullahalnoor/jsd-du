<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
	    $admin->name = 'LD Noor';
	    $admin->email = 'superadmin@gmail.com';
	    // $admin->status = 0;
        $admin->image = \AppHelper::$defaultProfileImage;
	    $admin->password =  Hash::make('12345678');
	    $admin->save();
		// $role = Role::where('slug','superadmin')->first();
		// $admin->roles()->attach($role->id);
        
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'image' => \AppHelper::$defaultProfileImage,
            'password' =>Hash::make('12345678'),
        ]);
    }
}
