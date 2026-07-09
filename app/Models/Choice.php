<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = [
        'question_id',
        'specialty_id',
        'choice_text',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialtie::class);
    }

    public function studentAnswers()
    {
        return $this->hasMany(StudentAnswer::class);
    }
}
