<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JournalVolume extends Model
{
    use HasFactory;
    public function journalYear(): BelongsTo
    {
        return $this->belongsTo(JournalYear::class);
    }
    public function journalIssues(): HasMany
    {
        return $this->hasMany(JournalIssue::class);
    }
}
