<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("author/create", [\App\Http\Controllers\AuthorController::class, "createAuthor"]);
Route::get("author/delete/{id}", [\App\Http\Controllers\AuthorController::class, "deleteAuthor"]);
Route::post("category/create",[\App\Http\Controllers\CategoryController::class, "createCategory"]);
Route::get("category/delete/{id}", [\App\Http\Controllers\CategoryController::class, "deleteCategory"]);
Route::get("category/all", [\App\Http\Controllers\CategoryController::class, "allCategories"]);
Route::post("post/create", [\App\Http\Controllers\PostController::class, "createPost"]);
Route::get("post/get/{id}",[\App\Http\Controllers\PostController::class,"getPost"]);
Route::get("posts/category/{categoryId}",[\App\Http\Controllers\PostController::class,"categoryPosts"]);
Route::get("posts/author/{authorId}", [\App\Http\Controllers\PostController::class, "authorPosts"]);
Route::post("comment/new", [\App\Http\Controllers\CommentController::class, "newComment"]);
Route::get("post/comments/{postId}", [\App\Http\Controllers\PostController::class, "getPostComments"]);
Route::get("comment/like/{id}",[\App\Http\Controllers\CommentController::class,"likeComment"]);
Route::post("admin/create",[\App\Http\Controllers\AdminController::class, "createAdmin"]);
Route::get("admin/author/{id}",[\App\Http\Controllers\AdminController::class, "getAuthor"]);
Route::get("author/admin/{id}",[\App\Http\Controllers\AdminController::class,"getAdmin"]);
Route::post("login",[\App\Http\Controllers\AdminController::class,"login"]);


Route::middleware([\App\Http\Middleware\Test::class])->group(function () {




    Route::get("checkMiddleware",[\App\Http\Controllers\Controller::class,"checkMiddleware"]);




});
Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function(){
    Route::get("getAuthor",[\App\Http\Controllers\AdminController::class,"getAuthor"]);

});



