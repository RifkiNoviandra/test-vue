<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    function register(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);

        $input = $request->only('username' , 'password' , 'email');
        $input['role'] = "user";
        $input['status'] = "aktif";

        $insert = User::create($input);
        if(!$insert){
            return response([
                "message" => "Insert Failed"
            ]);
        }

        return response([
            "message" => "Insert Complete"
        ]);
    }

    function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $input = $request->only('username' , 'password');

        $check = User::where('username' , $input['username'])->where('password' , $input['password'])->where('status' , 'aktif')->first();

        if(!$check){
            return response([
                "message" => "Username & Password Not Match",
            ] , 400);
        }

        $token = Str::random(7);
        $check->token = $token ;
        $check->save();

        return response([
            "message" => $token,
            "role" => $check->role
        ]);
    }

    function bidHistory(Request $request , $id){
        $data = transaction::with('user')->where('nft_id' , $id)->orderByDesc('bid_value')->get();

        return response([
            "data" => $data
        ]);
    }

}
