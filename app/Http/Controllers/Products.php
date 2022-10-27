<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Products as ModelsProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Products extends Controller
{
    public function index()
    {
        $product = ModelsProducts::get();
        if(!$product){
            return response()->json([
                'status' => 400,
                'message' => 'Data is empty',
            ]);
        }

        return response()->json([
            'data' => $product
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $product = ModelsProducts::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);
        $response = [$product];
        return response($response, 200);
    }
}
