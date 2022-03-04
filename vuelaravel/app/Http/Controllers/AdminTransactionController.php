<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    function listTransaction(Request $request){
        $data = transaction::with('user' , 'nft')->get();

        return response([
            'data' => $data
        ]);
    }

    function listTransactionByData(Request $request){
        $request->validate([
            'date' => 'required'
        ]);

        $date = $request->date;

        $data = transaction::with('user' , 'nft')->where('bid_at' , $date)->get();

        if (!$data){
            return response([
                'message' => 'no data'
            ]);
        }

        return response([
            'data' => $data
        ]);
    }
}
