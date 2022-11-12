<?php


use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'title' => 'home',
        'active' => 'home',
    ]);
});
Route::get('/home ', function () {
    return view('home', [
        'title' => 'home',
        'active' => 'home',
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        'active' => 'about',
        "name" => " Zulkarnain",
        "email" => "MRZ@gmail.com",
        "image" => "freedom.jpg"
    ]);
});



Route::get('/blog', function () {

    return view('posts', [
        'title' => 'posts',
        'posts' => Post::all()

    ]);


    // $blog_posts = [
    //     [
    //         "title" => "judul posts pertama",
    //         "slug" => "judul-post-pertama",
    //         "author" => "muhammad",
    //         "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias quod, laborum vitae incidunt aliquid quaerat ipsa deserunt excepturi facere sequi quibusdam eos vero rerum culpa veritatis, voluptatibus tempora velit nam ea expedita a! Libero, doloremque tempore, harum incidunt quas consequuntur sunt labore vel esse asperiores, non error dicta repellat omnis porro hic architecto dolores sapiente quaerat iure? Dolorum blanditiis doloribus fugiat beatae, voluptates nobis aliquam fuga. Quisquam corporis, voluptates nulla iure libero aut minima velit quas voluptatibus illum fugiat expedita repellat impedit quam autem cupiditate sunt deserunt odit inventore, quia totam. Maiores, nemo! Iste ex dignissimos nulla cupiditate, iure eligendi."
    //     ],
    //     [
    //         "title" => "judul posts kedua",
    //         "slug" => "judul-post-kedua",
    //         "author" => "ricky",
    //         "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias quod, laborum vitae incidunt aliquid quaerat ipsa deserunt excepturi facere sequi quibusdam eos vero rerum culpa veritatis, voluptatibus tempora velit nam ea expedita a! Libero, doloremque tempore, harum incidunt quas consequuntur sunt labore vel esse asperiores, non error dicta repellat omnis porro hic architecto dolores sapiente quaerat iure? Dolorum blanditiis doloribus fugiat beatae, voluptates nobis aliquam fuga. Quisquam corporis, voluptates nulla iure libero aut minima velit quas voluptatibus illum fugiat expedita repellat impedit quam autem cupiditate sunt deserunt odit inventore, quia totam. Maiores, nemo! Iste ex dignissimos nulla cupiditate, iure eligendi."
    //     ],
    //     [
    //         "title" => "judul posts ketiga",
    //         "slug" => "judul-post-ketiga",
    //         "author" => "zulkarnain",
    //         "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias quod, laborum vitae incidunt aliquid quaerat ipsa deserunt excepturi facere sequi quibusdam eos vero rerum culpa veritatis, voluptatibus tempora velit nam ea expedita a! Libero, doloremque tempore, harum incidunt quas consequuntur sunt labore vel esse asperiores, non error dicta repellat omnis porro hic architecto dolores sapiente quaerat iure? Dolorum blanditiis doloribus fugiat beatae, voluptates nobis aliquam fuga. Quisquam corporis, voluptates nulla iure libero aut minima velit quas voluptatibus illum fugiat expedita repellat impedit quam autem cupiditate sunt deserunt odit inventore, quia totam. Maiores, nemo! Iste ex dignissimos nulla cupiditate, iure eligendi."
    //     ],
    // ];


});





Route::get('/posts', [PostController::class, 'index']);

//halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {

    return view('categories', [
        'title' => 'Post Categories',
        'active' => "categories",
        'categories' => Category::all()
    ]);
});

//* sudah tidak dipakai karena sudah di tangani oleh query di model Posts
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => "Post by Category :$category->name",
//         'active' => "categories",
//         'posts' => $category->posts->load('category','author'),
//     ]);
// });

// Route::get('/authors/{author:username}', function (User $author) {

//     return view('posts', [
//         'title' => "Post by Author : $author->name",
//         'active' => 'posts',
//         'posts' => $author->posts->load('category','author'),
//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)
    ->middleware('auth');
