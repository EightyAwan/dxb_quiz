<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request){

        try{
            $user = User::where('username', $request->username)->first();

            if($user){

                $request->session()->put('user', $user['id']); 
                return response()->json([
                    'message' => 'login successfully',
                    'data' => $user
                ], 200);
            }

            return response()->json([
                'message' => 'Wrong Username',
                'data' => null
            ], 401);
        
        }catch(Exception $e){
            return response()->json([
                'message' => 'Something Went Wrong',
                'data' => $e->getMessage()
            ], 422);  
        }

    } 
}
