<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function all()
    {
        $files = File::files(resource_path("posts"));

        return array_map(function ($file){
            return $file->getContents();
        }, $files);
    }

    /**
     * @throws \Exception
     */
    public static function find($slug)
    {
        //if file path doesn't exist then give a 404 page
        if (!file_exists($path = resource_path("posts/{$slug}.html"))){
            throw new ModelNotFoundException();
        }
        //if the file exists then the page will show and caches the file for 1200 seconds so after this amount of time i would have to reload the file as it will be gone from memory.
        return cache()->remember("posts.{slug}", 1200, function () use ($path) {
            return file_get_contents($path);
        });    }

}
