<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Redirect;
use DB;

class AdminCategoryController extends Controller
{
    public function destroy($category_id){
        DB::table('tutorials')
            ->where('category_id',$category_id)
            ->delete();
        Session::put('exception','Tutorial Delete successfully');
        return Redirect::to('/admin.tutorials.create');
    }
}