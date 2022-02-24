<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::where("user_id", auth()->user()->id)->get();
        return view("pages.dashboard.posts.index", [
            "posts" => $post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.dashboard.posts.create",[
            "categories" => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'unique:posts',
            'image' => 'required|image|max:5048',
            'category_id' => 'required',
            'body' => 'required',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData["slug"] = Str::slug($request->title);
        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["excerpt"] = Str::limit(strip_tags($request->body), 100);

        Post::create($validatedData);

        return redirect()->route("posts.index")->with("success", "Post created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
         dd($post);
         return view("pages.dashboard.posts.show", [
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("pages.dashboard.posts.edit",[
            "post" => $post,
            "categories" => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'unique:posts',
            'image' => 'required|image|max:5048',
            'category_id' => 'required',
            'body' => 'required',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        if($post->image) {
            Storage::delete($post->image);
        }

        $validatedData["slug"] = Str::slug($request->title);
        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["excerpt"] = Str::limit(strip_tags($request->body), 100);

        $post->update($validatedData);

        return redirect()->route("posts.index")->with("success", "Post updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        if($post->image) {
            Storage::delete($post->image);
        }
        $post->delete();

        return redirect()->route("posts.index")->with("success", "Post deleted successfully");
    }
}
