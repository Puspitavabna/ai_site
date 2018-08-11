<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\QuizQuestion;
use App\Models\Category;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class AdminQuizQuestionController extends Controller
{
    public function index(){
        $questions = QuizQuestion::orderBy('created_at','desc')->Paginate(10);
        return view('admin.quiz_question.index', compact('questions'));
    }
    public function create(){
        $categories = Category::all();
        $users = User::all();
        return view ('admin.quiz_question.create', compact('categories','users'));
    }

    public function store(Request $request){

        $question = new QuizQuestion();
        $question->title = $request->title;
        $question->question = $request->question;
        $question->answer_description = $request->answer_description;
        $question->category_id = $request->category_id;
        $question->user_id = Auth::user()->id;
        $question->save();
        Session::flash('success','Question added successfully!!');
        return redirect()->route('admin_quiz_question.index');
    }
    public function destroy($slug){
        $question = QuizQuestion::where('slug', $slug)->first();
        $question->delete();
        Session::flash('success','Question delete successfully');
        return redirect()->route('admin_quiz_question.index');
    }
}