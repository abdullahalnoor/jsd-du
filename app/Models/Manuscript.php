<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Manuscript extends Model
{
    use HasFactory;
    public function manuscriptVersions(): HasMany
    {
        return $this->hasMany(ManuscriptVersion::class);
    }
    public function manuscriptVersion(): HasOne
    {
        return $this->hasOne(ManuscriptVersion::class)->orderBy('id','desc');
    }
}
