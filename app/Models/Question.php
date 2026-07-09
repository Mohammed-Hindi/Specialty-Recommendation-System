<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question_text',
    ];

    public function answers()
    {
        return $this->hasMany(StudentAnswer::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }


}
