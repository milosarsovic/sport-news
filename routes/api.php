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


