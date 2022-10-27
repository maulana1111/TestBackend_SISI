<?php

namespace App\Http\Controllers;

use App\Models\Distributors as ModelDistributors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Distributor extends Controller
{
    public function index()
    {
        $dist = ModelDistributors::get();
        if (!$dist) {
            return response()->json([
                'status' => 400,
                'message' => 'Data is empty',
            ]);
        }

        return response()->json([
            'data' => $dist
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'name' => 'required|string',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $dist = ModelDistributors::create([
            'code' => $request->code,
            'name' => $request->name,
            'address' => $request->address,
        ]);
        $response = [$dist];
        return response($response, 200);
    }
}
