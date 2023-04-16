<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getAllRoles()
    {
        $roles = Role::all();
    
        return response()->json([
            'status' => 'success',
            'message' => 'All roles retrieved successfully',
            'data' => $roles
        ]);
    }    
}
