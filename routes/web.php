<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
//so what this is doing is creating a collection from "$files" by going through each file in that array, parsing it with YamlFrontMatter, and then creating a new post with the results from parsing it with YAML
Route::get('/', function () {
    //Find all of the files in the post directory
    $files = File::files(resource_path("posts"));

    $posts = Post::all();
    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('posts/{post}', function ($id) {
    //FInd a post by its slug and pass it to a view called "post"
    $post = Post::find($id);


    return view('post', [
        'post' => $post

    ]);
    //Build a path
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    //Check to see if the file exists
    if (!file_exists($path)) {
        return redirect('/');
    }
    //If it does then fetch the content of the file
    $post = file_get_contents($path);

//    Then it will pass to the view


//creating a constraints
});
