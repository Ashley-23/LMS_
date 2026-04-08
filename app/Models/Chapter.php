<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'formation_id'])]
class Chapter extends Model
{
    use HasUuids, HasFactory;
    
    public function formation():BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }

    public function subsections():HasMany
    {
        return $this->hasMany(Subsection::class);
    }
}
