<?php

namespace App\Models;


use App\Models\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PermissionGroup extends Model
{
    use HasFactory;
    public $timestamps = false;

     public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class,'permission_group_id');
    }
}
