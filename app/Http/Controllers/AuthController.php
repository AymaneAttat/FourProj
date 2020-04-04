<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\User;
use App\Role;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        //validate request
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        //Authenticate user request 
        
        if( Auth::attempt(['email'=>$request->email, 'password'=>$request->password]) ) {

                $user = Auth::user();
                $userRole = $user->roles()->first();
        
                if ($userRole) {
                    $this->scope = $userRole->role;
                }
        
                $token = $user->createToken($user->email.'-'.now(), [$this->scope]);
        
                return response()->json([
                    'token' => $token->accessToken
                ]);
        }
    }
}
