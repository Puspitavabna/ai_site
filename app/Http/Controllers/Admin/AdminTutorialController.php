<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Tutorial;
use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Redirect;
use DB;
use Session;
use Auth;
class AdminTutorialController extends Controller
{
    public function index(){
        $tutorials = Tutorial::where('status', true)->orderBy('created_at','desc')->Paginate(10);
        return view('admin.tutorial.index', compact('tutorials'));
    }
    public function create(){
        $categories = Category::all();
        $users = User::all();
        return view ('admin.tutorial.create', compact('categories','users'));
    }

    public function store(Request $request){
        $slug = strtolower($request['title']);
        $slug = str_replace(' ', '-', $slug);

        $tutorial = new Tutorial();
        $tutorial->title = $request->title;
        $tutorial->description = $request->description;
        $tutorial->slug = $slug;
        $tutorial->category_id = $request->category_id;
        $tutorial->user_id = Auth::user()->id;
        $tutorial->save();
        Session::flash('success','Tutorials added successfully!!');
        return redirect()->route('admin_tutorial.index');
    }

    public function edit($slug){
        $tutorial = Tutorial::where('slug', $slug)->first();
        return view ('admin.tutorial.edit', compact('tutorial'));
    }

    public function update(Request $request, $slug){
        $tutorial = Tutorial::where('slug', $slug)->first();
        $tutorial->title = $request->title;
        $tutorial->description = $request->description;
        $tutorial->category_id = $request->category_id;
        $tutorial->user_id = Auth::user()->id;
        $tutorial->save();
        Session::flash('success','Tutorials updated successfully!!');
        return redirect()->route('admin_tutorial.index');
    }

    public function destroy($slug){
            $tutorial = Tutorial::where('slug', $slug)->first();
            $tutorial->delete();
            Session::flash('success','Tutorial Delete successfully');
            return redirect()->route('admin_tutorial.index');
        }


}