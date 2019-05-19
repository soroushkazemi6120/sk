<?php

namespace App\Http\Controllers\Admin;
use App\Http\Resources\v1\User as UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        auth()->loginUsingId(1);
        $this->authorize('show-users');
        $users = User::latest()->paginate(25);
        return response([
            "data"=>$users,
            "status"=>200
        ],200);
    }

    public function destroy(User $user)
    {
        $user->delete();
    }



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
