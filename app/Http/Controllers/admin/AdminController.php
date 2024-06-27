<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class AdminController extends Controller
{
    public function show()
    {
        if (!session()->has("admin")) {
            return redirect("login");
        } else {
            $data = User::all();
            return view('admin.home', ['users' => $data]);
        }
    }
    // public function test(){
    //     return 'hello';
    // }

    public function login(){
        return view("admin.auth.login");
    }

    public function loginUser(Request $request){
        $request->validate([
            "email"=> "required|email",
            "password"=> "required",
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = User::where("email", $request->email)->first();
        if($user){
            if($user->role === 1){
                if(hash::check($password, $user->password)){
                    
                    return redirect("home1")->with("success","Login Successfully");
                }
                else{
                    return redirect("/login")->with("error","Invalid Password");
                }
            }
            else{
                return redirect("/login")->with("error","Invalid Creditals");
            }
        }
        else{
            return redirect("/login")->with("error","user not found!");
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view("admin.auth.edit", ['user' => $user]);
    }

    public function deleteData($id){
        $user = User::find($id);
        $user->delete();
        return redirect("/order")->with("success","Delete Successfully!");
    }
}
