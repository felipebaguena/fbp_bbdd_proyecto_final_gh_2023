<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }
    
    public function updateUsers(Request $request, $id)
    {
        $user = User::find($id);
    
        if ($user) {
            $updatedData = $request->only(['name', 'email', 'password']);
            $user->update($updatedData);
    
            return response()->json(['status' => 'success', 'message' => 'User updated', 'data' => $user]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not found']);
        }
    }    

    public function deleteUsers()
    {
        return " User deleted";
    }
}
