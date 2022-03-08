<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\list_category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    function getCategory(Request $request){
        $data = list_category::all();

        return response([
            'data' => $data
        ]);
    }

    function create(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $input = $request->only('name' , 'description');

        $insert = list_category::create($input);

        if (!$insert){
            return response([
                'message' => 'Data Cannot Be Processed'
            ]);
        }

        return response([
            'message' => 'data Inserted'
        ]);
    }

    function delete(Request $request , $id){
        $find = list_category::where('id' , $id)->first();

        if (!$find){
            return response([
                'message' => 'no data with ID '.$id
            ]);
        }

        $find->delete();

        return response([
            'message' => 'data deleted'
        ]);
    }

    function update(Request $request , $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $find = list_category::where('id' , $id)->first();

        $input = $request->only('name' , 'description');

        $find->name = $input['name'];
        $find->description = $input['description'];

        if ($find->save()){
            return response([
                'message' => 'data updated'
            ]);
        }

        return response([
            'message' => 'data Cant be Updated'
        ]);
    }
}
