<?php
namespace App\Permissions;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Permission;
use App\Models\Role;

trait HasPermissionsTrait {




	public function hasPermissionTo($permission) {

		return $this->hasPermissionThroughRole($permission) ;
	}

	public function hasPermissionThroughRole($permission) {
		foreach ($permission->roles as $role){
			if($this->roles->contains($role)) {
				return true;
			}
		}
		return false;
	}


	public function userRoles() {
		$rolesArray = [];
		if(auth()->user()->roles){
			foreach (auth()->user()->roles as $rol) {
				$rolesArray[] = $rol->slug;
			}
		}
       
		if ($rolesArray) {
			return $this->hasRole($rolesArray[0]);
		}else{
			return false;
		}
		
	}
	public function hasRole( ... $roles ) {
		foreach ($roles as $role) {
			if ($this->roles->contains('slug', $role)) {
				return true;
			}
		}
		return false;
	}

	public function roles(): BelongsToMany {
		return $this->belongsToMany(Role::class,'user_role');

	}


}