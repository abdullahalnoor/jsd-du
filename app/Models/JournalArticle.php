<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class JournalArticle extends Model
{
    use HasFactory;
    public function journalIssue(): BelongsTo
    {
        return $this->belongsTo(JournalIssue::class);
    }
}
