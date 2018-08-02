<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function destroy($category_id){
        $category = Category::find($category_id);
        $category->destroy();
        Session::put('exception','Tutorial Delete successfully');
        return redirect()->route('admin.tutorial.create');
    }
}