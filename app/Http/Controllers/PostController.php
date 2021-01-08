<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request){
        $new = new Post();
        $new -> title=$request->json("title");
        $new -> text=$request->json("text");
        $new -> picture=$request->json("picture");
        $new -> category_id=$request->json("category_id");
        $new -> author_id=$request->json("author_id");
        $new -> save();
        return response($new);


    }

    public function getPost ($id){
        $post = Post::find($id);
        return response($post->author);

    }
}
