<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminTutorialsController extends Controller
{
    public function index(){
        return view('admin.tutorials.index');
    }
    public function create(){
        return view ('admin.tutorials.create');
    }
}