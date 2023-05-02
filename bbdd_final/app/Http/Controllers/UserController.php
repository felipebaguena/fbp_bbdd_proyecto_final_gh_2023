<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function getUser($id)
    {
        $user = User::with('heroes.items')->findOrFail($id);
        return response()->json($user);
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

    public function deleteUsers(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();

            return response()->json(['status' => 'success', 'message' => 'User deleted']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not found']);
        }
    }

    public function getHeroesAndItems()
    {
        $userId = auth()->id();
        $user = User::with(['heroes.items', 'heroes.heroImage'])->findOrFail($userId);

        $heroes = $user->heroes->map(function ($hero) {
            if ($hero->heroImage) {
                $hero->heroImage->image = url($hero->heroImage->image);
            }
            return $hero;
        });

        return response()->json($heroes);
    }


    public function selectHero(Request $request, $heroId)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $hero = Hero::find($heroId);

        if ($hero && $hero->user_id === $user->id) {
            $user->selected_hero_id = $hero->id;
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Hero selected successfully',
                'data' => $hero
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Hero not found or does not belong to the user'
            ]);
        }
    }

    public function changeRole($id, $roleId)
    {
        $user = User::find($id);

        if ($user) {
            $validRoleIds = Role::pluck('id')->toArray();

            if (in_array($roleId, $validRoleIds)) {
                $user->role_id = $roleId;
                $user->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'User role updated successfully',
                    'data' => $user
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid role ID provided'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ]);
        }
    }
}
