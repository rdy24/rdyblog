<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("categories", [
            "title" => "Category",
            "active" => "categories",
            "categories" => Category::all(),
        ]);
    }
}
