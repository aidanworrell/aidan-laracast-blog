<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    return view('posts');
});

Route::get('posts/{post}', function ($slug) {
    //FInd a post by its slug and pass it to a view called "post"
    $post = Post::find($slug);

    return view('post', [
        'post' => $post

    ]);
    //Build a path
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    //Check to see if the file exists
    if(! file_exists($path)) {
        return redirect('/');
    }
    //If it does then fetch the content of the file
    $post = file_get_contents($path);

//    Then it will pass to the view



//creating a constraints
})->where('post', '[A-z_\-]+');
