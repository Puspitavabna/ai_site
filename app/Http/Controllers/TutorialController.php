<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;

class TutorialController extends Controller
{
    public function show($slug){
        $tutorial = Tutorial::where('slug', $slug)->first();
        $category_tutorials = Tutorial::where('category_id', $tutorial->category_id)->get();
        return view('tutorial.show', compact('tutorial', 'category_tutorials'));
    }

}
