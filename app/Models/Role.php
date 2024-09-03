<?php

namespace App\Models;

use App\Models\Permission;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false;
    
   
    public function permissions(): BelongsToMany {
    	return $this->belongsToMany(Permission::class,'permission_role');
    }

    
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_role');
    }
}
