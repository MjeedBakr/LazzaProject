<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }


    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required',
              'phone' => 'required'
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        $user->save();
    
        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }


    public function delete(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'message' => 'deleted successfully',
        ], 200);
    }
}
