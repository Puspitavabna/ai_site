<?php
namespace App\Http\Controllers;

use App\Models\QuizAnswer;
use Illuminate\Http\Request;
use App\Models\QuizQuestion;

class QuizQuestionController extends Controller
{
    public function index(Request $request){
        $quiz_topic_id = $request->quiz_topic_id;

        if(empty($quiz_topic_id)){
            $quiz_questions = QuizQuestion::orderBy('created_at','desc')->Paginate(10);
        } else {
            $quiz_questions = QuizQuestion::where('quiz_topic_id', $quiz_topic_id)->orderBy('created_at','desc')->Paginate(10);
        }
        return view('quiz_question.index', compact('quiz_questions'));
    }
}