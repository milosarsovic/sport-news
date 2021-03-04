<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class AdminController extends Controller
{
    public function createAdmin(Request $request){
        $newAdmin = new Admin();
        $newAdmin-> email=$request->json("email");
        $password=$request->json("password");
        $password=Hash::make($password);
        $newAdmin->password=$password;
        $newAdmin->author_id=$request->json("author_id");
        $newAdmin->save();
        return response($newAdmin);


    }
    public function getAuthor(){
        $admin= Auth::user();
        return response($admin->author);

    }
    public function getAdmin($id){
        $author=Author::find($id);
        return response($author->admin);

    }
    public function login(Request $request){
        $admin= Admin::where("email","=",$request->json("email"))->first();

        if (!$admin){
            return response("admin does not exist", 404);

        }

        $passwordCheck= Hash::check($request->json("password"),$admin->password);


        if (!$passwordCheck){
            return response ("password wrong",410);
        }

        Auth::login($admin);
        return response($admin);




    }

    public function createPost (Request $request){

        $admin=Auth::user();

        $post=new Post();
        $post->title=$request->json("title");
        $post->text=$request->json("text");
        $post->picture=$request->json("picture");
        $post->category_id=$request->json("category_id");
        $post->author_id= $admin->author_id;
        $post->save();
        return response($post);


    }
}
