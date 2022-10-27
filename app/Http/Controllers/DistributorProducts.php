<?php

namespace App\Http\Controllers;

use App\Models\DistributorProducts as ModelsDistributorProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DistributorProducts extends Controller
{
    public function index()
    {
        $data = ModelsDistributorProducts::select('id', 'price')->with(['product', 'distributor'])->get();
        if (!$data) {
            return response()->json([
                'status' => 400,
                'message' => 'Data is empty',
            ]);
        }

        return response()->json([
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'distributor_id' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        ModelsDistributorProducts::create([
            'product_id' => (int)$request->product_id,
            'distributor_id' => (int)$request->distributor_id,
            'price' => (int)$request->price,
        ]);
        $dt = ModelsDistributorProducts::select('id', 'price')->with(['product', 'distributor'])->get();
        $response = [$dt];
        return response($response, 200);
    }
}
