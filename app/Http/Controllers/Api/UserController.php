<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,            
            'code' => 200,
            'message' => 'User list retrieved successfully',
            'data' => 
                 User::all(),
            
        ]);
    }

    public function show($id){
        $user = User::find($id);

        if(!$user){
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'User not found'
            ],404);
        } else {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'User retrieved successfully',
                'data' => $user
            ], 200);
        }
    }
}
