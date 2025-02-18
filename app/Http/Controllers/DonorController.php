<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function showDonorRegistrationpage(){
        // dd('Reached Donor Controller');
        return view('donorRegistration');
    }

    public function registerDonor(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'email' => 'required|email',
            'bloodgroup' => 'required',
            'contact' => 'required',
            'city' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            
        ]);

        $user = Auth::user();

        if(!$user){
            return redirect()->route('login')->with('error', "You must be login in to register as a donor");
        }

        DB::table('donors')->insert([
            'userid' => $user->code,
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'bloodgroup' => $request->bloodgroup,
            'contact' => $request->contact,
            'city' => $request->city,
            'date' => $request->date,
            'time' => $request->time,
            // 'code' => $user->code,
        ]);

        return redirect()->route('donorSuccess')->with(['success_name' => "Thanks {$request->name}", 
        'success_msg' => "please visit our {$request->city} branch."]);
    }

    public function donorSuccess(){
        return view('donorSuccess');
    }
}
