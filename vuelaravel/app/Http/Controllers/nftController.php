<?php

namespace App\Http\Controllers;

use App\Models\list_category;
use App\Models\nft;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class nftController extends Controller
{
    function getAllNft(Request $request){
        $data = nft::with('user')->get();

        return response([
            "data" => $data
        ]);
    }

    function getNftById(Request $request , $id){
        $data = nft::with('category.list_category' , 'user')->where('id' , $id)->first();

        return response([
            "data" => $data
        ]);
    }

    function getNftByBuy(Request $request){
        $data = nft::with('user')->orderByDesc('buy')->get();

        return response([
            'data' => $data
        ]);
    }

    function getNewestNft(Request $request){
        $data = nft::with('user')->orderByDesc('id')->get();

        return response([
            'data' => $data
        ]);
    }

    function getNftByName(Request $request){
        $request->validate([
            'key'=> 'required'
        ]);

        $key = $request->key;

        $data = nft::with('category.list_category' , 'user')->where('name' , 'LIKE' , '%'.$key.'%')->get();

        $data2 = list_category::with('category.nft')->where('name' , 'LIKE' , '%'.$key.'%')->get();

        if (!$data){
            return response([
                'message' => 'no data'
            ]);
        }

        return response([
            'data_name' => $data,
            'data_category' => $data2
        ]);
    }

    function userNftUpload(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
        ]);

        $input = $request->only('name' , 'price' , 'description');

        $file = $request->file('image');
        $extension = ['jpg' , 'png' , 'gif' , 'jpeg'];
        $file_ext = $file->getClientOriginalExtension();

        if(!in_array($file_ext , $extension)){
            return response([
                "message" => "file extension must jpg/png/gif/jpeg"
            ]);
        }

        $input['image'] = date("Y-m-d")."-".$file->getClientOriginalName();
        $request->image->move(public_path()."/images/" , $input['image']);
        $input['user_id'] = Auth::guard('web')->id();
        $input['status'] = "pending";

        $insert = nft::create($input);

        if(!$insert){
            return response([
                "message" => "Data Cant Be Inserted"
            ]);
        }

        return response([
            "message" => "Data Inserted"
        ]);
    }

    function trade(Request $request , $id){

        $request->validate([
            'bid_value' => 'required|numeric'
        ]);

        $input = $request->only('bid_value');
        $nft_id = $id;
        $input['nft_id'] = $nft_id;
        $input['bid_at'] = date('Y-m-d H-i-s');
        $search = nft::where('id' , $nft_id)->first();

        if(!$search){
            return response([
                'message' => 'No data With Id '.$nft_id
            ]);
        }

        if($search->current_bid == NULL){
            $input['user_id'] = Auth::guard('web')->id();
            if ($search->user_id === $input['user_id']){
                return response([
                    'message' => 'You cant bid your own Nft'
                ]);
            };
            $search->current_bid = $input['bid_value'];
            $search->buy += 1;
            $search->save();
            $transaction_insert = transaction::create($input);

            if(!$transaction_insert){
                return response([
                    'message' => 'Bid cant be Inserted'
                ]);
            }

            return response([
                'message' => 'Bid Success'
            ]);
        }
        else if($search->current_bid < $input['bid_value']){
            $input['user_id'] = Auth::guard('web')->id();
            if ($search->user_id === $input['user_id']){
                return response([
                    'message' => 'You cant bid your own Nft'
                ]);
            };
            $search->current_bid = $input['bid_value'];
            $search->buy += 1;
            $search->save();
            $transaction_insert = transaction::create($input);

            if(!$transaction_insert){
                return response([
                    'message' => 'Bid cant be Inserted'
                ]);
            }

            return response([
                'message' => 'Bid Success'
            ]);
        }else{
            return response([
                'message' => 'Your Bid is lower than current bid'
            ]);
        }
    }
}
