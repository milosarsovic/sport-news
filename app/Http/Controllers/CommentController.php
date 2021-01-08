<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function newComment (Request $request){
        $new = new Comment();
        $new->name = $request->json("name");
        $new->text = $request->json("text");
        $new->post_id = $request->json("post_id");
        $new->save();
        return response ($new);

    }

    public function likeComment ($id){
        $comment=Comment::find($id);
        if ($comment){
            $comment->likes=$comment->likes+1;
            $comment->save();
            return response($comment);

        }else {
            return response("comment not found", 404);

        }
    }

}
