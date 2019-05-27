<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckAdminAuthenticated
{


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if(auth()->check()) {
        if(auth()->user()->$this->level == 'admin'){
            return response([
                'data'=>'ok',
                'status'=>200
            ],200);
        }
            return response([
                'data'=>'no',
                'status'=>404
            ],404);
        }
            return $next($request);



        //$a=$next($request);
        return response([
            'data'=>'ok',
           'status'=>'200'
      ],200);

    }


//        return response([
//            'data'=>'ok',
//            'status'=>'200'
//        ],200);






}