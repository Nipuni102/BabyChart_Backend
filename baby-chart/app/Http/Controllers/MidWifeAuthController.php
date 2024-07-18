<?php
namespace App\Http\Controllers;


use App\Models\MidWife;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MidWifeAuthController extends Controller
{
    /**
     * Register a new midwife.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string|max:250',
                'email' => 'required|string|email:rfc,dns|max:250|unique:midwives,email',
                'password' => 'required|string|min:8|confirmed'
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Validation Error!',
                    'data' => $validate->errors(),
                ], 403);
            }

            $midwife = MidWife::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $data['token'] = $midwife->createToken($request->email)->plainTextToken;
            $data['midwife'] = $midwife;

            $response = [
                'status' => 'success',
                'message' => 'Midwife is created successfully.',
                'data' => $data,
            ];

            return response()->json($response, 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Server Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Authenticate the midwife.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'email' => 'required|string|email',
                'password' => 'required|string'
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Validation Error!',
                    'data' => $validate->errors(),
                ], 403);
            }

            // Check email exist
            $midwife = MidWife::where('email', $request->email)->first();

            // Check password
            if (!$midwife || !Hash::check($request->password, $midwife->password)) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Invalid credentials'
                ], 401);
            }

            $data['token'] = $midwife->createToken($request->email)->plainTextToken;
            $data['midwife'] = $midwife;

            $response = [
                'status' => 'success',
                'message' => 'Midwife is logged in successfully.',
                'data' => $data,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Server Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Log out the midwife from the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        try {
            auth()->user()->tokens()->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Midwife is logged out successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Server Error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
