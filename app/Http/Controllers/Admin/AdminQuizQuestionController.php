<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Category;
use App\User;

class AdminQuizQuestionController extends Controller
{
    public function index(){
        $questions = Quiz::where('status', true)->orderBy('created_at','desc')->Paginate(10);
        return view('admin.quiz.index', compact('questions'));
    }
    public function create(){
        $categories = Category::all();
        $users = User::all();
        return view ('admin.quiz.quiz_question', compact('categories','users'));
    }

    public function store(Request $request){
        $slug = strtolower($request['title']);
        $slug = str_replace(' ', '-', $slug);

        $question = new Quiz();
        $question->title = $request->title;
        $question->quiz_question = $request->quiz_question;
        $question->slug = $slug;
        $question->category_id = $request->category_id;
        $question->user_id = Auth::user()->id;
        $question->save();
        Session::flash('success','Question added successfully!!');
        return redirect()->route('admin_quiz_question.index');
    }
    public function destroy($slug){
        $question = Quiz::where('slug', $slug)->first();
        $question->delete();
        Session::flash('success','Question delete successfully');
        return redirect()->route('admin_quiz_question.index');
    }
}