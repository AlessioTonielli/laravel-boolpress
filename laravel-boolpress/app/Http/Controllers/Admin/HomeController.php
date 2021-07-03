<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function home()
    {
        return view('admin.home');
    }

    public function private(Request $request)
    {
        $data = [
            'posts' => Post::orderBy("created_at", "DESC")
                ->where("user_id", $request->user()->id)
                ->get(),
        ];
        return view('admin.private', $data);
    }
}
