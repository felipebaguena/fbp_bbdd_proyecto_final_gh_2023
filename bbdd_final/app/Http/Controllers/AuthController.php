<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            // 'role_id' => self::ROLE_USER,
            'password' => bcrypt($request['password'])
        ]);

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            "success" => true,
            "message" => "User registered successfully",
            'data' => $user,
            "token" => $token
        ];

        // Mail::to($user->email)->send(new ExampleMail($request['name']));

        return response()->json(
            $res,
            Response::HTTP_CREATED
        );
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::query()->where('email', $request['email'])->first();

        if (!$user) {
            return response(
                ["success" => false, "message" => "Email or password are invalid",],
                Response::HTTP_NOT_FOUND
            );
        }

        if (!Hash::check($request['password'], $user->password)) {
            return response(["success" => true, "message" => "Email or password are invalid"], Response::HTTP_NOT_FOUND);
        }

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            "success" => true,
            "message" => "User logged successfully",
            "token" => $token
        ];

        return response($res, Response::HTTP_ACCEPTED);
    }

    public function logout(Request $request)
    {
        $accessToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($accessToken);
        $token->delete();
        return response(
            [
                "success" => true,
                "message" => "Logout successfully"
            ],
            Response::HTTP_OK
        );
    }

    public function profile()
    {
        $userId = auth()->id();
        $user = User::with('heroes.items')->findOrFail($userId);
    
        return response(
            [
                "success" => true,
                "message" => "User profile get successfully",
                "data" => $user
            ],
            Response::HTTP_OK
        );
    }
    

    public function updateProfile(Request $request)
    {
        $authenticatedUser = Auth::user();
    
        $user = User::find($authenticatedUser->id);
    
        if ($user) {
            $updatedData = $request->only(['name', 'email', 'password']);
            $user->update($updatedData);
    
            return response()->json(['status' => 'success', 'message' => 'User updated', 'data' => $user]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not found']);
        }
    }
    
}
