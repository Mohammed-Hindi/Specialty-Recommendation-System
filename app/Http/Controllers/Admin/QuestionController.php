<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Requests\Admin\QuestionRequest;

class QuestionController extends Controller
{
    //view all questions
    public function index()
    {
        $questions = Question::all();
        return response()->json([
            'data' => $questions,
        ], 200);
    }
    //create question
    public function store(QuestionRequest $request)
    {
        $question = Question::create($request->validated());
        return response()->json([
            'message' => 'Question created successfully',
            'data' => $question,
        ], 201);
    }

    //show question
    public function show(Question $question)
    {
        return response()->json([
            'data' => $question,
        ], 200);
    }

    //update question
    public function update(QuestionRequest $request, Question $question)
    {
        $question->update($request->validated());
        return response()->json([
            'message' => 'Question updated successfully',
            'data' => $question,
        ], 200);
    }

    //delete question
    public function destroy(Question $question)
    {
        $question->delete();
        return response()->json([
            'message' => 'Question deleted successfully',
        ], 200);
    }
}
