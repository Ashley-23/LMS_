<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['content', 'question_id'])]
class Answer extends Model
{
    use HasUuids, HasFactory;
    
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
