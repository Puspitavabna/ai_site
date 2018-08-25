<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizQuestion;

class QuizQuestionController extends Controller
{
    public function index(){
        $quiz_questions = QuizQuestion::all();
        return view('quiz_question.create', compact('quiz_questions'));
    }

    public function store(Request $request){
        dd();
    }

}