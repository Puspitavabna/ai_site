<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;

class TutorialController extends Controller
{
    public function show($slug){
        $tutorial = Tutorial::where('slug', $slug)->first();
        return view('tutorial.show', compact('tutorial'));
    }
    public function delete($slug){
        $tutorial = Tutorial::where('slug', $slug)->delete();
        return view('tutorial.index', compact('tutorial'));

    }
    public function edit($slug){
        $tutorial = Tutorial::where('slug', $slug)->first();
        return view('tutoriala.edit', compact('tutorial'));
    }

}
