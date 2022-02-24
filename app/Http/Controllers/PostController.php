<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = "";
        if (request("category")) {
            $category = Category::firstWhere("slug", request("category"));
            $title = " in " . $category->name;
        }
        if (request("user")) {
            $user = User::firstWhere("username", request("user"));
            $title = " by " . $user->name;
        }
        return view("posts", [
            "title" => "All Posts" . $title,
            "active" => "posts",
            "posts" => Post::latest()
                ->filter(request(["search", "category", "user"]))
                ->paginate(7)
                ->withQueryString(),
        ]);
    }

    public function detail(Post $post)
    {
        return view("detail-post", [
            "title" => "Detail Post",
            "active" => "posts",
            "post" => $post,
        ]);
    }
}
