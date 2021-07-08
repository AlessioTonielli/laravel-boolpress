<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'posts' => Post::orderBy("created_at", "DESC")
                ->where("user_id", $request->user()->id)
                ->get(),
        ];

        return view("admin.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.create', ["categories" => $categories, "tags" => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPostData = $request->all();

        $newPost = new Post();
        $storageImage = Storage::put("postCover", $newPostData["cover_url"]);
        $newPostData["cover_url"] = $storageImage;
        $newPost->fill($newPostData);
        $newPost->user_id = $request->user()->id;
        $newPost->save();

        $newPost->tags()->sync($newPostData['tags']);

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $category = $post->category;

        $user = $post->user;
        if (is_null($post)) {
            abort(404);
        }

        return view('admin.show', [
            "post" => $post,
            "user" => $user,
            "categories" => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.edit', [
            "categories" => $categories,
            "post" => $post,
            "tags" => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $formData = $request->all();

        $request->validate([
            "title" => "max:255",

        ]);

        if(key_exists("cover_url",$formData)){
            if($post->cover_url){
                Storage::delete($post->cover_url);
            }
        $storageImage = Storage::put("postCovers", $formData["cover_url"]);

        $formData["cover_url"] = $storageImage;
        }

        $post->update($formData);

        $post->tags()->sync($formData['tags']);

        $post->update($formData);

        return redirect()->route("admin.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();
        
        return redirect()->route("admin.index");
    }
}
