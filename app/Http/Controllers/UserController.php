<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{

    //GET users
    public function index(Request $request){

        return User::all();
    }

    public function show($id){

        return User::findOrFail($id);
    }

    //POST Signup
    public function signup(Request $request){
        $newUser = $request->all();
        $user = User::where('email','like','%' . $newUser['email'] . '%')->first();
        if (!is_null($user)){
            return response()->json([
                'res' =>false,
                'message'=>'invalid email'
            ], 200);
        }
        $newUser['password'] = password_hash($newUser['password'], PASSWORD_BCRYPT);
        $newUser['creationUser'] = Carbon::now();
        User::create($newUser);

        return response()->json([
           'res'=> true,
            'message'=> 'Success Signup'
        ], 200);
    }

    //POST Login
    public function login(Request $request){
        $input= $request->all();
        $user = User::where('email','like','%' . $input['email'] . '%')->first();
        if (!is_null($user)&&!password_verify($input['password'], $user['password'])){
            return response()->json([
                'res' =>false,
                'message'=>'Email or password are incorrect'
            ], 200);
        }
        return response()->json([
            'res' =>true,
            'message'=>'Success login.'
        ], 200);
    }
}
