<?php

namespace App\Http\Controllers;
use App\Post;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $post = Post::all();
        return view("Admin.index", [
            "posts" => $post
        ]);

        // $data = [
        //     'posts' => Post::all()
        // ];

        // return view("admin.home", $data);
    }
}
