<?php

namespace App\Models;


use App\Models\Role;


use App\Models\PermissionGroup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Permission extends Model
{
    use HasFactory;
   
	public function roles() {
		return $this->belongsToMany(Role::class,'permission_role');
    }

     public function permissionGroup(): BelongsTo
    {
        return $this->belongsTo(PermissionGroup::class);
    }
}
