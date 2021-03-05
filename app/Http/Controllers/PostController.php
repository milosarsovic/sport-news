<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

    public function categoryPosts ($categoryId){
        $posts = Post::where("category_id","=",$categoryId)->get();
        return response($posts);

    }

    public function authorPosts ($authorId){
        $posts = Post::where("author_id", "=", $authorId)->get();
        return response ($posts);

    }

    public function getPostComments ($postId){
        $comments = Comment::where("post_id", "=", $postId)->orderBy("likes", "desc")->get ();
        return response ($comments);



    }
    public function getComments($id){
        $post=Post::find($id);
        if (!$post){
            return response("post not found",404);
        }
        return response($post->comments);
    }
}
