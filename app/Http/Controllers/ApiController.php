<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Notification;
use App\Models\Slider;
use App\Models\FCMToken;
use File;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ApiController extends Controller
{
   
    function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
    }
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        //  $user = User::where('email', $fields['email'])->where('status', 1)->first();
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // Check password
        if (auth()->attempt($data)) {
            $user = auth()->user();

            $authtoken = $user->createToken('auth-token')->plainTextToken;
            $token = explode('|', $authtoken);

            $response = [
                'message' => 'Login successful',
                'user' => $user,
                'token' => $authtoken,
                'status' => true
            ];

            return response($response, 201);
        } else {

            //user not authorized
            return response()->json([
                'message' => 'User not found!',
                'status' => false
            ], 400);
        }
    }

    public function register(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:100',
            // 'role_id' => 'required',
            'email' => 'required|min:5|unique:users',
            'password' => 'required|min:5',
            // 'city' => '',
            // 'mobile' => '',
            // 'defence_force' => '',
            // 'defence_type' => '',
            // 'serving_retired' => '',
        ]);

        $validated['password'] = Hash::make($request['password']);
        $user = User::create($validated);
        $response = [
            'message' => 'Register successful',
            'user' => $user,
            'status' => true
        ];

        return response($response, 201);
    }


}
