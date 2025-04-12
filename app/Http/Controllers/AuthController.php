<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'users' => User::all(),
        ])->header('Content-Type', 'application/json');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register(Request $request)
    {
        // Validasi input request
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // pastikan ada field password_confirmation
        ]);

        // Membuat user baru dan menyimpannya di database
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']), // mengenkripsi password
        ]);

        // Membuat token untuk user
        $token = $user->createToken('auth_token')->plainTextToken;

        // Menyusun response yang akan dikirim
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
            'token' => $token,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
