<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserReactController extends Controller
{
    public function index()
    {
        $users = UserReact::all();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = UserReact::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = UserReact::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:6',
        ]);

        $user = UserReact::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return response()->json(['message' => 'User updated successfully']);
    }

    public function destroy($id)
    {
        $user = UserReact::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function registrarUserAPI(Request $request)
    {
        $usuario = new UserReact();
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->save();

        return response()->json(['message' => 'UserReact registered successfully'], 201);
    }
}
