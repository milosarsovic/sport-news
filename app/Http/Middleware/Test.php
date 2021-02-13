<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Test
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $id= $request->header("id");

        $admin=Admin::find($id);

        if (!$admin){
            return response("admin does not exist", 404);

        }

        Auth::login($admin);



        return $next($request);
    }
}
