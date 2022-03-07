<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\list_category;
use App\Models\nft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminNftController extends Controller
{

    function getNft(Request $request){
        return response([
            'data' => nft::with('category.list_category')->get(),
        ]);
    }

    function getNftByName(Request $request){
        $request->validate([
            'key'=> 'required'
        ]);

        $key = $request->key;

        $data = nft::with('category.list_category')->where('name' , 'LIKE' , '%'.$key.'%')->get();


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

        $data = list_category::with( 'category.nft')->where('name' , $filter)->get();

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
            'status' => 'required'
        ]);

        $status = $request->status;

        $data = nft::with('category.list_category')->where('status' , $status)->get();

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

        $find = nft::whereIn('status' , ['pending' , 'active'])->where('id' , $nft_id)->first();

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
