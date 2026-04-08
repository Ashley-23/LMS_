<?php

namespace App\Models;

use App\Enums\FormationLevelEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['name', 'description', 'level', 'duration', 'user_id'])]
class Formation extends Model
{
    use HasUuids, HasFactory; 
    
    protected function casts()
    {
        return [
            'level' => FormationLevelEnum::class,
            'description' => AsStringable::class,
            'name' => AsStringable::class,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class)->orderBy('order_number');
    }
}
