<?php

namespace App\Http\Controllers;

use App\Models\nft;
use Illuminate\Http\Request;

class listWebController extends Controller
{
    function getNftByNewest(Request $request){
        $data = nft::all();

        return response([
            "test" => $data
        ]);
    }
}
