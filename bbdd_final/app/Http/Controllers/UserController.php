<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers()
    {
        return "Get all users";
    }

    public function createUsers()
    {
        return " User create";
    }

    public function updateUsers()
    {
        return " User updated";
    }

    public function deleteUsers()
    {
        return " User deleted";
    }
}
