<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class UserLogin extends Controller{

    public function showLoginpage(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|',
        ]);

        if(Auth::attempt($credentials)){

            $user = Auth::user();
            session(['userid' => $user->id, 'code' => $user->code]);

            // dd($user);

            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', "Welcome back, " . Auth::user()->firstname . "your code : " . Auth::user()->code);
        }

        return back()->with('error', 'Invalid credentials');

        // $user = DB::table('users')->where('email', $request->email)->first();

        // if($user && Hash::check($request->password, $user->password)){
        //     Session::put('userid', $user->id);
        //     Session::put('firstname', $user->firstname);
        //     Session::put('email', $user->email);
        //     // return redirect()->route('dashboard');
        //     return redirect()->route('dashboard')->with('success', "Login Successful - {$user->firstname}");
        // }

        // return back()->with('error', 'Credentials not matched');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Loggedout succesfully');
        // Session::flush();
        // return redirect()->route('login')->with('success', 'logged out successfully.');
    }
}


?>