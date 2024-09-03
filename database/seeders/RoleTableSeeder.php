<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

		$user = User::where('email','superadmin@gmail.com')->first();
        $dev_role = new Role();
	    $dev_role->slug = 'superadmin';
	    $dev_role->name = 'Super Admin ';
	    $dev_role->status = 0;
	    $dev_role->user_id = $user->id;
	    $dev_role->save();
		$manager_permission = Permission::get()->pluck('id');
		$dev_role->permissions()->detach();
		$dev_role->permissions()->syncWithoutDetaching($manager_permission);

		$role = Role::where('slug','superadmin')->first();
		$user->roles()->attach($role->id);

		$dev_role = new Role();
	    $dev_role->slug = 'admin';
	    $dev_role->name = 'Admin ';
		$dev_role->status = 1;
		$dev_role->user_id = $user->id;
	    $dev_role->save();
		$manager_permission = Permission::get()->pluck('id');
		$dev_role->permissions()->detach();
		$dev_role->permissions()->syncWithoutDetaching($manager_permission);
    }
}
