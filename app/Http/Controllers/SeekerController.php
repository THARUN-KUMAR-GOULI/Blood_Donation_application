<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class SeekerController extends Controller{

    public function showSeekerpage(){
        return view('seekerRegistration');
    }

    public function searchDonors(Request $request){
        $validate = $request->validate([
            'city' => 'required',
        ]);

        $donors = DB::table('donors')->where('city', $request->city)->get();

        return response()->json($donors);
    }
}


?>