<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
        'specialty_name',
        'required_branch',
        'min_gpa',
    ];

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function examrResults()
    {
        return $this->hasMany(ExamResult::class , 'suggested_specialty_id');
    }
}
