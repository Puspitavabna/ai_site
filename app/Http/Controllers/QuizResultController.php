<?php
namespace App\Http\Controllers;

use App\Models\QuizAnswer;
use App\Models\QuizResult;
use Illuminate\Http\Request;


class QuizResultController extends Controller
{
    public function stoindere(){

        $quiz_questions = QuizAnswer::all();
        return view('result.show', compact('quiz_questions'));
    }
    public function store(Request $request)
    {
        if (empty($request->answer_details)) {
            $answer_details = false;
        } else {
            $answer_details = true;
        }

        $result = new QuizResult();
        $result->user_id = $request->user_id;
        $result->quiz_topic_id = $request->quiz_topic_id;
        $result->marks = $request->marks;

        $result->save();
        Session::flash('success','Exam completed successfully!!');
        return redirect()->route('quiz_result.index');

    }

}