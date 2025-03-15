<?php

namespace App\Http\Responses;

class ApiResponse
{

    public static function success(string $message, $data = null, int $status = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public static function created(string $message, $data = null, int $status = 201)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $status);
    }


    public static function error(string $message, int $status = 400)
    {
        return response()->json([
            'message' => $message
        ], $status);
    }

    public static function validationError($errors, int $status = 422)
    {
        return response()->json([
            'success' => false,
            'message' => 'Validation errors occurred.',
            'errors' => $errors,
        ], $status);
    }
}
