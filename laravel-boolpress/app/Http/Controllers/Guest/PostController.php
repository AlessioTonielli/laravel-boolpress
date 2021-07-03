<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view("guest.index", [
            "posts" => $post
        ]);

    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        if(is_null($post)){
            abort(404);
        }

        return view('guest.show' , [
            "post" => $post
        ]);
    }
}
