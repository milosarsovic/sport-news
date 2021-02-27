<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\User;
use Illuminate\Http\Request;

class ActionController extends Controller
{


    public function newAction(Request $request){
        $action=new Action();
        $action->user_id=$request->json("user_id");
        $action->actions=$request->json("actions");
        $action->details=$request->json("details");
        $action->save();
        return response($action);

    }

    public function getUser ($id){
        $action=Action::find($id);
        if (!$action){
            return response("action not found",404);

        }
        return response($action->user);

    }
    public function findUser($id){
        $user = User::find($id);
        if (!$user){
            return response("usernot found",404);

        }
        return response($user->actions);
    }
}
