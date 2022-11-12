<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.posts.index',[
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // *cara menyimpan file upload
        // ddd($request);
        // $request->file('image')->store('post-images');


        $validatedData = $request->validate([
            'title'=>'required|max:255',
            'slug'=> 'required|unique:posts',
            'category_id'=> 'required',
            'image'=> 'image|file|max:1024',
            'body'=> 'required'
        ]);
    // pengkondisian jika user mengupload file 
    if ($request->file('image') ) {
        $images = $request->file('image');
        $path = $images->store('post-images'); 
        $location = "";
        $location_real = $location.$path;
        $validatedData['image'] = $location_real;
        // echo $path;
        // print_r($path);
        // dd($path);
        // dd($validatedData['image']->hashName());

    }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body),100 );

        Post::create($validatedData);
        
        return redirect('/dashboard/posts')->with('succes','new Post has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show',[
            'post'=> $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit',[
            'post'=> $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules =  [
            'title'=>'required|max:255',
            'category_id'=> 'required',
            'image'=> 'image|file|max:1024',
            'body'=> 'required'
        ];

       

        if ( $request->slug != $post->slug) {
            $rules['slug'] ='required|unique:posts';

        }

        $validatedData = $request->validate($rules);

        if ($request->file('image') ) {
            $images = $request->file('image');
            $path = $images->store('post-images'); 
            $location = "";
            $location_real = $location.$path;
            $validatedData['image'] = $location_real;
        }
        
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body),100 );

        Post::where('id', $post->id)->update($validatedData);
        return redirect('/dashboard/posts')->with('succes','new Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('succes','Post has been delete');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
}


// *cara menyimpan file,
// $request 
// ->file('nama filenya') untuk mengambil isi filenya
// ->store('nama foldernya') untuk menyimpan file function ini mengembalikan path, mengupload filenya akan tersimpan di folder \storage

// *cara mengatur file yang disimpan agar bisa diakses pubik misalnya
// di folder /config/filesystem.php

//* folder public di storage harus dihubungkan folder public di app yang mana bisa diakses oleh user dengan cara kita gunakan yang namanya symbolic link 
// cara nya tulis di terminal php artisan storage:link 
// maka di folder public ada folder storage symbolic link apapun yang ada di storage public akan muncul disini 

