<?php
namespace App\Http\Controllers;

use App\Models\QuizAnswer;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Auth;
use Session;


class QuizResultController extends Controller
{
    public function index(){

        $quiz_results = QuizResult::all();
        return view('quiz_result.index', compact('quiz_results'));
    }

    public function store(Request $request){
        $selected_answers = $request->selected_answers;
        $marks = 0;
        $quiz_answer = null;
        foreach($selected_answers as $selected_answer){
            $quiz_answer_id = (int) filter_var($selected_answer, FILTER_SANITIZE_NUMBER_INT);
            $quiz_answer = QuizAnswer::find($quiz_answer_id);

            if($quiz_answer->is_correct){
                $marks++;
            }
        }

        $quiz_result = new QuizResult();
        $quiz_result->user_id = Auth::user()->id;
        $quiz_result->marks = $marks;
        $quiz_result->quiz_topic_id = $quiz_answer->quiz_question->quiz_topic->id;
        $quiz_result->save();
        Session::flash('success','Question added successfully!!');
        return redirect()->route('quiz_result.index');
    }

}