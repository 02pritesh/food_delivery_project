<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    
    public function addRegister(Request $request)
    {
        $rules = [
            "email" => "required|email|unique:users,email",
            "password" => "required|min:5",
            "name" => "required|string|max:255",
            "mobile_no" => "required|numeric",
        ];
    
        // Validate the request
        $validator = Validator::make($request->all(), $rules);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation failed',
                'errors' => $validator->errors(),
            ]);
        }
            $data =  new User();
            $data->email = $request->email;
            $data->name = $request->name;
            $data->password = Hash::make($request->password);
            $data->mobile_no = $request->mobile_no;

            $data->save();
            return response()->json([
                "status"=> "success",
                "result" => "Registration has been Successfully!",
                "data" => $data,
            ],200);
        
    }

    public function login()
    {
        return view("admin.auth.login");
    }
    public function loginUser(Request $request)
    {
        $rules = [
            "email" => "required|email",
            "password" => "required|min:5",
         
        ];
    
        // Validate the request
        $validator = Validator::make($request->all(), $rules);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation failed',
                'errors' => $validator->errors(),
            ]);
        }
        
            $email = $request->email;
            $password = $request->password;

            $user = User::where("email", $email)->first();

            if($user)
            {
                if($user->role === 0)
                {
                    if(hash::check($password,$user->password))
                    {
                        return response([
                        "status"=> "success",
                        "result"=> "login succesfully",
                         "data"=> $user,
                        ],200);
                    }
                    else
                    {
                        return response([
                        "status"=> "failed",
                        "result"=> "Password is Incorrect!",   
                        ],404);                    
                    }
                }else{
                    return response([
                        "status" => "failed",
                        "result" => "Invalid Credential!",

                    ],404);
                }
            }
            else
            {
                return response([
                "status"=> "failed",
                "result"=> "Invalid Creditals",
                ],404);                   
            }
        
    }

    public function logout(Request $request){
        if(session()->has("admin"))
        {
            session()->flush();
            
            return redirect('/')->with("success","Logout Successfully!");
        }

    }
}
