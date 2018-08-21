<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Quizanswer;
use App\Models\Category;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class AdminQuizAnswerController extends Controller
{
    public function index(){
        $answers = QuizAnswer::orderBy('created_at','desc')->Paginate(10);
        return view('admin.quiz_answer.index', compact('answers'));
    }
    public function create(Request $request){
        $quiz_question_id = $request->quiz_question_id;
        $categories = Category::all();
        $users = User::all();
        return view ('admin.quiz_answer.create', compact('categories','users', 'quiz_question_id'));
    }

    public function store(Request $request){
        if(empty($request->is_correct)){
            $is_correct = false;
        } else {
            $is_correct = true;
        }

        if($request->is_correct == true){
            $quiz_answers = QuizAnswer::where('quiz_question_id', $request->quiz_question_id);
            $quiz_answers->update(['is_correct' => false ]);
        }

        $answer = new QuizAnswer();
        $answer->quiz_question_id = $request->quiz_question_id;
        $answer->answer_details = $request->answer_details;
        $answer->is_correct = $is_correct;
        $answer->save();
        Session::flash('success','Question added successfully!!');
        return redirect()->route('admin_quiz_question.index');
    }

    public function show($id){
        $answer = new QuizAnswer();
        return view('admin.quiz_answer.show', compact('answer'));
    }

    public function destroy($slug){
        $answer = QuizAnswer::where('slug', $slug)->first();
        $answer->delete();
        Session::flash('success','Question delete successfully');
        return redirect()->route('admin_quiz_answer.index');
    }
}