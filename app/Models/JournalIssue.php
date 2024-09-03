<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JournalIssue extends Model
{
    use HasFactory;
    public function journalVolume(): BelongsTo
    {
        return $this->belongsTo(JournalVolume::class);
    }
    public function journalArticles(): HasMany
    {
        return $this->hasMany(JournalArticle::class);
    }

}
