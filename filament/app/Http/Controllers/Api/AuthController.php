<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Handle user login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // If validation fails, return a standardized error response
        if ($validator->fails()) {
            return ApiResponse::validationError($validator->errors());
        }

        // Check if the user exists by email
        $user = User::where('email', $request->email)->first();

        // If the user does not exist or the password doesn't match, return an error
        if (!$user || !Hash::check($request->password, $user->password)) {
            return ApiResponse::error('Unauthorized', 401);
        }

        // Create a new token for the user
        $token = $user->createToken('CarRentalApplication')->plainTextToken;

        // Return a success response with the token
        return ApiResponse::success('Login successful', ['token' => $token]);
    }

    /**
     * Handle user change password request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // If validation fails, return a standardized error response
        if ($validator->fails()) {
            return ApiResponse::validationError($validator->errors());
        }

        // Get the authenticated user
        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return ApiResponse::error('Unauthorized: Current password is incorrect', 401);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return ApiResponse::success('Password updated successfully');
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::success('Logged out successfully');
    }
}
