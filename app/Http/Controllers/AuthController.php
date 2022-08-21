<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    // REGISTER
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'class' => ['required', 'string', 'max:255'],
            'roll_no' => ['required', 'string', 'max:255'],
            'phone_no' => ['required', 'string', 'max:255'],
            'fathers_name' => ['required', 'string', 'max:255'],
            'mothers_name' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'class' => $request->class,
            'roll_no' => $request->roll_no,
            'phone_no' => $request->phone_no,
            'fathers_name' => $request->fathers_name,
            'mothers_name' => $request->mothers_name,
        ]);
        $token = $user->createToken('token')->accessToken;
        return response(['user' => $user, 'token' => $token]);
    }

    // LOGIN
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $credentials = $request->only(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Invalid email or password'], 401);
        }
        $token = auth()->user()->createToken('token')->accessToken;
        return response(['user' => auth()->user(), 'token' => $token]);
    }
}
