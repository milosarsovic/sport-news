<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(Request $request){
        $new = new Category();
        $new -> name = $request->json("name");
        $new -> save();
        return response ($new);

    }

    public function deleteCategory ($id){
        $category = Category::find($id);
        if ($category){
            $category -> delete();

        }else {
            return response ("category not found", 404);

        }
    }

    public function allCategories(){
        $categories = Category::all();
        return response ($categories);

    }
}
