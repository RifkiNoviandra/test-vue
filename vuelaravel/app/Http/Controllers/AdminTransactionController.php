<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminTransactionController extends Controller
{
    function listTransaction(Request $request){
        $data = transaction::with('user' , 'nft')->get();

        return response([
            'data' => $data
        ]);
    }

    function listTransactionByDate(Request $request){
        $request->validate([
            'date_first' => 'required',
            'date_end' => 'required',
        ]);

        $date_first = $request->date_first;
        $date_end = $request->date_end;

        $data = transaction::with('user' , 'nft')->whereBetween('bid_at' , [$date_first , $date_end])->get();

//        return response([$data]);

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
