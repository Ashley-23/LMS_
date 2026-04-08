<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['score', 'user_id', 'quizz_id'])]
class Score extends Model
{
    use HasUuids;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function quizz()
    {
        return $this->belongsTo(Quizz::class);
    }
}
