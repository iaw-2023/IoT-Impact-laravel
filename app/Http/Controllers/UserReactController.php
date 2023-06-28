<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserReact;
use Illuminate\Support\Facades\Bcrypt;

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
        $usuario->password = bcrypt($request->input('password'));
        $usuario->save();

        return response()->json(['message' => 'UserReact registered successfully'], 201);
    }

    public function loginUserAPI(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = UserReact::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            // Password matches, handle successful login
            return response()->json(['message' => 'Login successful'], 200);
        } else {
            // Password does not match or user not found
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }


    public function mostrar()
    {
        $usersReact = UserReact::all();
        return view('usersReact.index', compact('usersReact'));
    }
}
