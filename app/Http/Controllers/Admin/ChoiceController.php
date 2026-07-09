<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ChoiceRequest;
use App\Models\Choice;

class ChoiceController extends Controller
{
    //view all choices
    public function index()
    {
        $choices = Choice::all();
        return response()->json([
            'message' => 'Choices retrieved successfully',
            'data' => $choices
        ], 200);
    }

    //create choice
    public function store(ChoiceRequest $request)
    {
        $choice = Choice::create($request->validated());
        return response()->json([
            'message' => 'Choice created successfully',
            'data' => $choice
        ], 201);
    }
    
    //update choice
    public function update(ChoiceRequest $request, Choice $choice)
    {
        $choice->update($request->validated());
        return response()->json([
            'message' => 'Choice updated successfully',
            'data' => $choice
        ], 200);
    }

    //delete choice
    public function destroy(Choice $choice)
    {
        $choice->delete();
        return response()->json([
            'message' => 'Choice deleted successfully',
        ], 200);
    }
}
