<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function createAuthor(Request $request){
        $author = new Author();
        $author -> name = $request ->json("name");
        $author->save();
        return response ($author);

    }

    public function deleteAuthor($id){
        $author = Author::find($id);
        if ($author){
            $author -> delete ();
            return response ($author);

        }else {
            return response ("author not found", 404);

        }
    }

}
