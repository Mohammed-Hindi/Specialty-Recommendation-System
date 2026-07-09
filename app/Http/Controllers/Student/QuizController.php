<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\StudentAnswer;

class QuizController extends Controller
{
    public function getQuiz(Request $request)
    {
        //return all questions with choices
        $questions = Question::with('choices')->get();
        return response()->json($questions);
    }
    
    public function submitAnswers(Request $request)
    {
        //loop answers
        foreach ($request->answers as $answer) {
            //store in student_answers table
            $studentAnswer = new StudentAnswer();
            $studentAnswer->student_id = auth()->user()->id;
            $studentAnswer->question_id = $answer['question_id'];
            $studentAnswer->choice_id = $answer['choice_id'];
            $studentAnswer->save();
        }
        //call RecommendationService
        //return result


    }
}
