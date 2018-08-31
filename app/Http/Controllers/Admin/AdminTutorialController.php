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
use DomDocument;
use Illuminate\Support\Facades\Input;

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
        $tutorial->description = null;
        $tutorial->slug = $slug;
        $tutorial->category_id = $request->category_id;
        $tutorial->user_id = Auth::user()->id;
        $tutorial->save();

        $message = $request->input('description');
        $dom = new DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML("<div>$message</div>");

        $container = $dom->getElementsByTagName('div')->item(0);
        $container = $container->parentNode->removeChild($container);

        while ($dom->firstChild) {
            $dom->removeChild($dom->firstChild);
        }

        while ($container->firstChild) {
            $dom->appendChild($container->firstChild);
        }

        $images = $dom->getElementsByTagName('img');

        $tutorial->description = $dom->saveHTML();
        $tutorial->save();

        if(!empty(Input::file('image'))){
            $this->saveThumbnail($tutorial);
        }

        foreach ($images as $img) {
            $src = $img->getAttribute('src');

            if (preg_match('/data:image/', $src)) {
                $this->mime_type_image_save($src,$img,$tutorial);
            } // <!--endif
        } // <!-

        $tutorial->description = $dom->saveHTML();

        $tutorial->update();
        
        Session::flash('success','Tutorials added successfully!!');
        return redirect()->route('admin_tutorial.index');
    }

    public function mime_type_image_save($src,$img,$tutorial){
        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
        $mimetype = $groups['mime'];
        $filename = $img->getAttribute('data-filename');
        $filename = date("d") . '_' . $filename;
        $filename = str_replace(' ', '_', $filename);
        $general_directory = '/uploads/blog_images/';
        $public_path = public_path() . $general_directory ;
        $year_folder = $public_path . date("Y");
        $month_folder = $year_folder . '/' . date("m");

        !file_exists($year_folder) && mkdir($year_folder, 0777, true);
        !file_exists($month_folder) && mkdir($month_folder, 0777, true);
        $folder_path = $general_directory . date('Y') . "/" . date('m') . "/";
        $img_md5_value = md5_file($src);
        $image_exist = Upload::where([['name', '=', $filename], ['folder_path', '=', $folder_path]])->first();

        if (!empty($image_exist)) {
            $filename =  Carbon::now()->timestamp . '_' . $filename;
        }

        $upload = new Upload();
        $upload->name = $filename;
        $upload->folder_path = $folder_path;
        $upload->md5_hash = $img_md5_value;
        $upload->article_id = $tutorial->id;
        $upload->save();
        $image = Image::make($src)
            // resize if required
            /* ->resize(300, 200) */
            ->encode($mimetype, 100)// encode file to the specified mimetype
            ->save(public_path($folder_path.$filename));

        $new_src = $folder_path.$filename;
        $img->removeAttribute('src');
        $img->setAttribute('src', $new_src);
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