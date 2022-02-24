<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view("pages.dashboard", [
            "post" => Post::count(),
            "category" => Category::count(),
            "user" => User::where("is_admin", false)->count(),
            "admin" => User::where("is_admin", true)->count()
        ]);
    }
}
