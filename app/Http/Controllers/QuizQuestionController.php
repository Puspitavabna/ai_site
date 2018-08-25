<?php
namespace App\Http\Controllers;

use App\Models\QuizAnswer;
use Illuminate\Http\Request;
use App\Models\QuizQuestion;

class QuizQuestionController extends Controller
{
    public function index(){
        $quiz_questions = QuizQuestion::all();
        return view('quiz_question.index', compact('quiz_questions'));
    }
}