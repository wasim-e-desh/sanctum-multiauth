<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){

        $validated = $request->validate([
            'email'=>'required|exists:admins,email',
            'password'=>'required'
        ]);
        // $user && !Hash::check($request->password, $user->password )
        // $user = Admin::where('email',$request->email)->first();
        // dd($user);
        if(Auth::guard('admins')->attempt(['email'=> $request->email, 'password'=>$request->password])){
            $token = $user->createToken($request->email, [Auth::guard('admins')])->plainTextToken;
            // $token = $user->

            return response()->json([
                'message'=>'Uaser login successfully!',
                'token'=>$token,
            ]);

        }else{
            return response()->json([
                'error'=>'Credentials not matched '
            ]);
        }

        // if(Auth::guard('admins')->attempt(['email'=> $request->email, 'password'=>$request->password])){
        //     $user = Auth::guard('admins')->user();
        //     dd($user);
        //     $token = $user->createToken('admin')->plainTextToken;

        //     return response()->json([
        //         'message'=>'Uaser login successfully!',
        //         'token'=>$token,
        // ]);
        // }



    }



    // public function user_login(Request $request){

    //     $validated = $request->validate([
    //         'email'=>'required|exists:admins,email',
    //         'password'=>'required'
    //     ]);

    //     $user = User::where('email',$request->email)->first();
    //     // dd($user);
    //     if($user && !Hash::check($request->password, $user->password )){
    //         $token = $user->createToken($request->email, [Auth::guard('admins')])->plainTextToken;
    //         // $token = $user->

    //         return response()->json([
    //             'message'=>'Uaser login successfully!',
    //             'token'=>$token,
    //         ]);

    //     }
    // }


    public function admins_get()
    {
        return response()->json([
            'message'=>'hello world'
        ]);
    }
}
