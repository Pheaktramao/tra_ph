<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|string|max:255',
            'password'  => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'User not found'
            ], 401);
        }

        $user   = User::where('email', $request->email)->firstOrFail();
        $token  = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'       => 'Login success',
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $permissions = $user->permissions;
        $roles = $user->roles;
        return response()->json([
            'message' => 'Login success',
            'data' => $user,
            'role' => $roles
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function get_users(Request $request)
    {
        $user = User::latest()->get();
        // $permissions = $user->getAllPermissions();
        // $roles = $user->getRoleNames();
        return response()->json([
            // 'message' => 'Login success',
            'data' => $user,
            // 'roles' => $roles
        ]);
    }

    public function user_register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $profilePath = null;
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public');
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'profile' => $profilePath
        ]);

        $user->assignRole('user');
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ]);
    }

    public function deliverer_register(Request $request): JsonResponse
    {
        // Update to use 'first_name' and 'last_name'
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $profilePath = null;
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public');
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'profile' => $request->$profilePath
        ]);

        $user->assignRole('deliverer');

        return response()->json([
            'message' => 'You have registered as a deliverer successfully',
            'user' => $user,
            'roles' => $user->getRoleNames(),
        ]);
    }

    public function change_password(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()->toArray(),
            ], 422); 
        }

        $user = $request->user();
        $currentHashedPassword = User::where('id', $user->id)->value('password');
        if (!password_verify($request->current_password, $currentHashedPassword)) {
            return response()->json([
                'message' => 'Current password is incorrect',
            ], 401); 
        }
        $newHashedPassword = password_hash($request->new_password, PASSWORD_BCRYPT);
        $user->update([
            'password' => $newHashedPassword,
        ]);
        unset($user->password);
        return response()->json([
            'message' => 'Password successfully changed',
            'data' => $user,
        ]);
    }
}
