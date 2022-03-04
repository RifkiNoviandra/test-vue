<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\nft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminNftController extends Controller
{
    function login(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $input = $request->only('username' , 'password');

        $login = User::where('username' , $input['username'])->where('password' , $input['password'])->first();

        if (!$login){
            return response([
                'message' => 'Username / Password Doesnt Match'
            ]);
        }
        $token = Str::random(6);
        $login->token = $token;
        $login->save();

        return response([
            'token' => $token
        ]);
    }

    function getNft(Request $request){
        return response([
            'data' => category::with('nft' , 'list_category')->get(),
        ]);
    }

    function grtNftByName(Request $request){
        $request->validate([
            'key'=> 'required'
        ]);

        $key = $request->key;

        $data = category::with('nft' , 'list_category')->where('name' , 'LIKE' , '%'.$key.'%')->get();

        if (!$data){
            return response([
                'message' => 'no data'
            ]);
        }

        return response([
            'data' => $data
        ]);
    }

    function getNftByCategory(Request $request){
        $request->validate([
            'filter' => 'required'
        ]);

        $filter = $request->filter;

        $data = category::with('nft' , 'list_category')->where('category' , $filter);

        if (!$data){
            return response([
                'message' => 'no data'
            ]);
        }

        return response([
            'data' => $data
        ]);
    }

    function getNftByStatus(Request $request){
        $request->validate([
            'filter' => 'required'
        ]);

        $status = $request->status;

        $data = category::with('nft' , 'list_category')->where('status' , $status);

        if (!$data){
            return response([
                'message' => 'no data'
            ]);
        }

        return response([
            'data' => $data
        ]);
    }

    function approval(Request $request){
        $request->validate([
            'nft_id' => 'required',
        ]);

        $nft_id = $request->nft_id;

        $find = nft::where('status' , 'pending')->where('id' , $nft_id)->first();

        if (!$find){
            return response([
                'message' => 'No Data With Id '.$nft_id.' Can Be Approved'
            ]);
        }

        $find->status = 'active';
        $find->save();

        return response([
            'message' => 'Nft Approved'
        ]);
    }
    function blockNft(Request $request){
        $request->validate([
            'nft_id' => 'required',
        ]);

        $nft_id = $request->nft_id;

        $find = nft::where('status' , 'pending')->where('status' , 'active')->where('id' , $nft_id)->first();

        if (!$find){
            return response([
                'message' => 'No Data With Id '.$nft_id.' Can Be BLocked'
            ]);
        }

        $find->status = 'blocked';
        $find->save();

        return response([
            'message' => 'Nft Blocked'
        ]);
    }
}
