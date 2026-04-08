<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['content', 'quizz_id'])]
class Question extends Model
{
    use HasUuids, HasFactory;
    
    public function quizz()
    {
        return $this->belongsTo(Quizz::class);
    }

    public function answer()
    {
        return $this->hasOne(Answer::class, 'question_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
