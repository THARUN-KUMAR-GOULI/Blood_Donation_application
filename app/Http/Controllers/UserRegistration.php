<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserRegistration extends Controller{

    public function showSignuppage(){
        return view('signup');
    }

    public function register(Request $request){
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $code = rand(1000, 9999);

        DB::table('users')->insert([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'code' => $code,
        ]);
        

        return redirect()->back()->with('success', 'Registration Success, please login <a href="/login">here</a>');
    }
}


?>