<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Redirect;
use DB;
use Session;

class AdminTutorialController extends Controller
{
    public function index(){
        return view('admin.tutorials.index');
    }
    public function create(){
        return view ('admin.tutorials.create');
    }
    public function store(Request $request){
      $data=array();
          	$data['title']=$request->title;
          	$data['description']=$request->description;
            $data['category_id']=$request->category_id;
            $id = Auth::user()->id;
            $currentuser = User::find($id);
             $data['user_id']=$request->user_id;
          	DB::table('tutorials')->insert($data);
                	Session::put('exception','Tutorials added successfully!!');
                	return Redirect::to('/admin.tutorials.index');
    }
}