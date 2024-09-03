<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JournalYear extends Model
{
    use HasFactory;
    public function journalVolumes(): HasMany
    {
        return $this->hasMany(JournalVolume::class);
    }
}
