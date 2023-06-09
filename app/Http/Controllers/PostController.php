<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

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

    public function register(Request $request){
        $email = $request->email;
        $name = $request->name;
        $dob = $request->dob;

        $code = rand(0, 90000);

        $data = [
            'name' => $name,
            'code' => $code,
            'email' => $email
        ];

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = sha1(rand(0, 90000));
        $user->dob = $dob;



        if($user->save()){
            DB::table('personal_access_tokens')->insert(['tokenable_type' => 'email verification', 'tokenable_id' => $user->id, 'name'=> 'email token', 'token' => $code, 'abilities'=>'verify email address']);
            Mail::send('mail.otp', ['data' => $data], function($message) use ($data) {
                $message->to($data['email'])->subject('Verify your email address');
                $message->from('noreply@newhorizons.com', 'New Horizons');
            });
            $request->session()->put('user', $user->id);
            return response()->json(['status' => 'success', 'status_code' => 201]);
        }
        else{
            return response()->json(['status' => 'failed', 'status_code' => 401, 'message' => 'Something went wrong, please try again']);
        }
    }
}
