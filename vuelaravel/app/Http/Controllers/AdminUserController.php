<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    function getMember(Request $request){
        return response([
            'data' => User::where('role' , 'user')->get(),
        ]);
    }

    function getMemberBySearch(Request $request){
        $request->validate([
            'key' => 'required'
        ]);

        $key = $request->key;

        $data = User::where('role' , 'user')->where('username' , 'LIKE' , '%'.$key.'%' , 'OR' , 'email' , '%'.$key.'%')->get();

        if (!$data){
            return response([
                'message' => 'no data'
            ]);
        }

        return response([
            'data' => $data
        ]);
    }

    function getMemberByStatus(Request $request){
        $request->validate([
            'status' => 'required'
        ]);

        $status = $request->status;

        $data = User::where('role' , 'user')->where('status' , $status)->get();

        if (!$data){
            return response([
                'message' => 'no data'
            ]);
        }

        return response([
            'data' => $data
        ]);
    }

    function blockMember(Request $request){
        $request->validate([
            'user_id' => 'required'
        ]);

        $user_id = $request->user_id;

        $find = User::where('id' , $user_id)->first();

        if (!$find){
            return response([
                'message' => 'no user with ID '.$user_id
            ]);
        }

        $find->status = 'blocked' ;
        $find->save();

        return response([
            'message' => 'user blocked'
        ]);
    }

    function UnblockMember(Request $request){
        $request->validate([
            'user_id' => 'required'
        ]);

        $user_id = $request->user_id;

        $find = User::where('id' , $user_id)->first();

        if (!$find){
            return response([
                'message' => 'no user with ID '.$user_id
            ]);
        }

        $find->status = 'aktif' ;
        $find->save();

        return response([
            'message' => 'user Unblocked'
        ]);
    }
}
