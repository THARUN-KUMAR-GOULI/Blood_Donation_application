<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserDashboard extends Controller{

    // public function showDashboardpage(){
    //     return view('dashboard');
    // }

    public function showDashboardpage(){

        // $userid = Auth::id();
        // dd(Auth::check());
        // $user = DB::table('users')->where('id', $userid)->first();
        // $donors = DB::table('donors')->where('userid', $userid)->where('date', '>=', now())->get();

        // dd($user, $donors);

        // if($donors->isEmpty()){
        //     $donors = collect();
        // }

        $user = Auth::user();
        $donors = DB::table('donors')->where('userid', $user->id)->where('date', '>=', now())->get();

        return view('dashboard', compact('user','donors'));
    }

    public function getDonors(){
        $user = Auth::user();

        if(!$user){
            return response()->json([]);
        }

        $donors = DB::table('donors')
            ->where('userid', $user->code)
            ->where('date', '>=', now())
            ->get();

        return response()->json($donors);
    }
}
?>