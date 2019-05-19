<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\v1\User as UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // Validation Data
        $validData = $this->validate($request, [
           'email' => 'required|exists:users',
           'password' => 'required'
        ]);

        // Check Login User
        if(! auth()->attempt($validData)) {
            return response([
                'data' => 'اطلاعات صحیح نیست',
                'status' => 'error'
            ],403);
        }

        auth()->user()->update([
           'api_token' => Str::random(100)
        ]);

        return new UserResource(auth()->user());
    }

    public function register(Request $request)
    {
        // Validation Data
        $validData = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $validData['name'],
            'email' => $validData['email'],
            'password' => bcrypt($validData['password']),
            'api_token' => Str::random(100)
        ]);

        return new UserResource($user);
    }
}
