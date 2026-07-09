<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    //view all students
    public function index()
    {
        $students = User::where('role', 'student')->get();
        return response()->json([
            'message' => 'Students retrieved successfully',
            'data' => $students
        ], 200);
    }

    //view student
    public function show($id)
    {
        $student = User::where('id', $id)->where('role', 'student')->firstOrFail();
        return response()->json([
            'message' => 'Student retrieved successfully',
            'data' => $student
        ], 200);
    }
}
