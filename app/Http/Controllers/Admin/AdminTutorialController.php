<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Redirect;
use DB;
use Session;
use Auth;
class AdminTutorialController extends Controller
{
    public function index(){
        $tutorials = Tutorial::all();
        return view('admin.tutorials.index', compact('tutorials'));
    }
    public function create(){
        return view ('admin.tutorials.create');
    }

    public function store(Request $request){
        $tutorial = new Tutorial();
        $tutorial->title = $request->title;
        $tutorial->description = $request->description;
        $tutorial->category_id = $request->category_id;
        $tutorial->user_id = Auth::user()->id;
        $tutorial->save();
        Session::flash('success','Tutorials added successfully!!');
        return redirect()->route('admin_tutorial.index');
    }
}