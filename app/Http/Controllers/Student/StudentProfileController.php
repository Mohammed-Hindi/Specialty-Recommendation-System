<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Student\StudentProfileRequest;
use App\Models\Student;

class StudentProfileController extends Controller
{
    public function store(StudentProfileRequest $request)
    {
        $validated = $request->validated();

        $student = Student::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'branch_type' => $validated['branch_type'],
                'gpa' => $validated['gpa'],
            ]
        );

        return response()->json([
            'message' => 'Profile saved successfully',
            'student' => $student
        ]);
    }

    public function show()
    {
        return response()->json([
            'student' => auth()->user()->student
        ]);
    }
}
