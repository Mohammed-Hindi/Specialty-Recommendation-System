<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Specialty;
use App\Models\Question;
use App\Models\Choice;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        //count students
        $students = User::where('role', 'student')->count();
        //count specialties
        $specialties = Specialty::count();
        //count questions
        $questions = Question::count();
        //count choices
        $choices = Choice::count();
        
        return response()->json([
            'students' => $students,
            'specialties' => $specialties,
            'questions' => $questions,
            'choices' => $choices,
        ]);
    }

    
}
