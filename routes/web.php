<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view("home", ["title" => "Home", "active" => "home"]);
})->name("home");

Route::get("/posts", [PostController::class, "index"])->name("posts");
Route::get("/posts/{post:slug}", [PostController::class, "detail"])->name('posts.detail');

Route::get("/category", [CategoryController::class, "index"])->name("category");

Route::prefix("dashboard")
    ->middleware(["auth:sanctum", "verified"])
    ->group(function () {
        Route::get("/", [DashboardController::class, "index"])->name("dashboard");
        Route::resource("posts", DashboardPostController::class);
    });
Route::prefix("dashboard")
    ->middleware('admin')
    ->group(function () {
        Route::resource("categories", AdminCategoryController::class)->except("show");
        Route::resource("all-posts", AdminPostController::class)->only([
            "index", "destroy", "show"
        ]);
    });

Route::get("/about", function () {
    return view("about");
});

// Route::middleware(["auth:sanctum", "verified"])
//     ->get("/dashboard", function () {
//         return view("dashboard");
//     })
//     ->name("dashboard");


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
