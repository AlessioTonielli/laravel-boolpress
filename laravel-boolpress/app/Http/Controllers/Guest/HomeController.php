<?php

namespace App\Http\Controllers\Guest;
use App\Post;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::all();
        return view("guest.index", [
            "posts" => $post
        ]);

    }

    public function home()
    {
        return view("guest.home");

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
