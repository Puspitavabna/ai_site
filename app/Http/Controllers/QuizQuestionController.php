<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizQuestion;

class QuizQuestionController extends Controller
{
    public function show(){

        $quiz_questions = QuizQuestion::all();
        return view('quiz.show', compact('quiz_questions'));
    }

}