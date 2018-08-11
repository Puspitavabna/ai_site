<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Quizanswer;
use App\Models\Category;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class AdminQuizanswerController extends Controller
{
    public function index(){
        $questions = QuizAnswer::orderBy('created_at','desc')->Paginate(10);
        return view('admin.quiz_answer.index', compact('questions'));
    }
    public function create(){
        $categories = Category::all();
        $users = User::all();
        return view ('admin.quiz_answer.create', compact('categories','users'));
    }

    public function store(Request $request){

        $question = new QuizAnswer();
        $question->title = $request->title;
        $question->question = $request->question;
        $question->category_id = $request->category_id;
        $question->user_id = Auth::user()->id;
        $question->save();
        Session::flash('success','Question added successfully!!');
        return redirect()->route('admin_quiz_answer.index');
    }
    public function destroy($slug){
        $question = QuizAnswer::where('slug', $slug)->first();
        $question->delete();
        Session::flash('success','Question delete successfully');
        return redirect()->route('admin_quiz_answer.index');
    }
}