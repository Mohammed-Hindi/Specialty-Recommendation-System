<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $fillable = [
        'user_id',
        'suggested_specialty_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function suggestedSpecialty()
    {
        return $this->belongsTo(Specialtie::class , 'suggested_specialty_id');
    }
}
