<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $pass = Hash::make($request['password']);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $pass
        ]);

        // dd($user);

        $objToken = $user->createToken('Laravel Password Grant Client');
        $strToken = $objToken->accessToken;
        $expiration = $objToken->token->expires_at->diffInSeconds(Carbon::now()->addMilli('1296000'));
        // $tkn = Auth::user()

        $response = ['token_type' => 'Baerer', 'expires_in' => $expiration, 'token' => $strToken];
        return response($response, 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'client_id' => 'required|string',
            'client_secret' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $validator = $request->only('email', 'password');

        $user = User::where('email', $request->email)->first();
        $att = Auth::attempt($validator);
        if (!$att) {
            return response()->json(['error' => 'Unauthorised'], 401);
        }

        // $user = Auth::user();
        // dd("success");

        // if ($validator->fails()) {
        //     return response(['errors' => $validator->errors()->all()], 422);
        // }


        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $objToken = $user->createToken('Laravel Password Grant Client');
                $strToken = $objToken->accessToken;
                $expiration = $objToken->token->expires_at->diffInSeconds(Carbon::now()->addMilli('1296000'));
                // $tkn = Auth::user()

                $response = ['token_type' => 'Baerer', 'expires_in' => $expiration, 'token' => $strToken];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" => 'User does not exist'];
            return response($response, 422);
        }
    }
}
