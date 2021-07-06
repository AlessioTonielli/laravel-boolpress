<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    function filter($array, $filter) {
        $array_filtered = [];
        if($filter == "") {
            return $array;
        }
        foreach($array as $item) {
            
            $result = strpos(strtolower($item['category']), $filter);
    
            if($result !== false) {
                $array_filtered[] = $item;
            };
            
        }
    
        return $array_filtered;
    
    }

    public function index(){
        $posts = Post::with('category')->with('tags')->get();
        $category_filter = isset($_GET['category']) ? strtolower($_GET['category']) : "";

        return response()->json([
            'result' => $this->filter($posts, $category_filter),
        ]);
    }
}
