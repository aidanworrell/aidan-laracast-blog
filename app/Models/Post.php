<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }
    public static function all()
    {
        //When a new post is created the cache will clear as part of the process
        return cache()->rememberForever('posts.all', function() {
            return collect(File::allFiles(resource_path("posts")))
                //loop over or map over each item an for each one parse that file into a document
                ->map(function ($file){
                    return YamlFrontMatter::parseFile($file);
                })
                //the map function is allowing me to use the function to take only what i need from the array before putting it in the collection
                ->map(function ($document) {
//i have built up my own post object which i will then be able to pass into the view of 'posts'
                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    );

                })
                ->sortByDesc('date');
        });
    }


    /**
     * @throws \Exception
     */
    public static function find($slug){
    //this will give me all my blog posts
        $posts =static::all();
    //this will give me the first post where the slug is = to the slug we are requesting-- This will then return to the web.php and then return a view
       return $posts->firstWhere('slug', $slug);
    }
//    {
//        //if file path doesn't exist then give a 404 page
//        if (!file_exists($path = resource_path("posts/{$slug}.html"))){
//            throw new ModelNotFoundException();
//        }
//        //if the file exists then the page will show and caches the file for 1200 seconds so after this amount of time i would have to reload the file as it will be gone from memory.
//        return cache()->remember("posts.{slug}", 1200, function () use ($path) {
//            return file_get_contents($path);
//        });    }

}
