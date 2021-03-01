<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){

        $oldUser=User::where("email","=",$request->json("email"))->first();
        if ($oldUser){
            return response("emailTaken",450);

        }


        $newUser= new User();
        $newUser->name=$request->json("name");
        $newUser->email=$request->json("email");
        $newUser->password=Hash::make ($request->json("password"));
        $newUser->save();

        $newAction= new Action();
        $newAction->user_id=$newUser->id;
        $newAction->actions="register";
        $newAction->save();


        return response($newUser);

    }

    public function login (Request $request){
        $user= User::where("email","=",$request->json("email"))->first();
        if (!$user){
            return response("user does not exist",404);

        }

        $passwordCheck=Hash::check($request->json("password"),$user->password);

        if (!$passwordCheck){

            $action=new Action();
            $action->user_id=$user->id;
            $action->actions="wrongpassword";
            $action->save();


            return response("wrongpassword",450);

        }

        Auth::login($user);

        $action=new Action();
        $action->user_id=$user->id;
        $action->actions="login";
        $action->save();


        return response($user);



    }



}

