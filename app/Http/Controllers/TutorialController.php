<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;

class TutorialController extends Controller
{
    public function show($slug){
        $tutorial = Tutorial::where('slug', $slug)->first();
        return view('tutorials.show', compact('tutorial'));
    }

}
