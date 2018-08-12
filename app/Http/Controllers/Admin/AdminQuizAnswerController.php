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
    public function create(){
        $categories = Category::all();
        $users = User::all();
        return view ('admin.quiz_answer.create', compact('categories','users'));
    }

    public function store(Request $request){

        $answer = new QuizAnswer();
//        $question->title = $request->title;
//        $question->question = $request->question;
        $answer->correct_answer = $request->correct_answer;
        $answer->save();
        Session::flash('success','Question added successfully!!');
        return redirect()->route('admin_quiz_answer.index');
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