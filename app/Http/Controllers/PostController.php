<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PostController extends Controller
{
    public function get_started(Request $request){
        $email = $request->email;

        if(User::where('email', $email)->count()>0){
            return response()->json(['status' => 'failed', 'status_code' => 401, 'message' => 'Email already exists']);
        }
        else{
            return response()->json(['status' => 'success', 'status_code' => 201, 'email' => $email]);
        }
    }
}
