<?php

namespace OGame\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use OGame\Http\Controllers\Controller;
use OGame\Http\Requests\Api\V1\CreateTokenRequest;
use OGame\Models\User;

class AuthTokenController extends Controller
{
    /**
     * Exchange credentials for a Sanctum personal access token.
     */
    public function store(CreateTokenRequest $request): JsonResponse
    {
        $user = User::where('email', $request->string('email')->toString())->first();

        if ($user === null || !Hash::check($request->string('password')->toString(), $user->password)) {
            return response()->json(['message' => 'Invalid credentials.'], 422);
        }

        if ($user->isBanned()) {
            return response()->json(['message' => 'This account is banned.'], 403);
        }

        $token = $user->createToken($request->string('device_name')->toString());

        return response()->json(['token' => $token->plainTextToken], 201);
    }

    /**
     * Revoke the token used for the current request.
     */
    public function destroy(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json(null, 204);
    }
}
