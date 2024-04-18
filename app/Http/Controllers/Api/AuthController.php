<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupClientRequest;
use App\Http\Requests\SignupTechnicianRequest;
use App\Http\Resources\AuthAdminResource;
use App\Http\Resources\AuthClientResource;
use App\Http\Resources\AuthTechnicianResource;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete;
        return response()->json(['message' => "logged Out"],200);
    }

    public function login(LoginRequest $request)
    {

        $user = User::with('publicServices')->with('subServices')->whereEmail($request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            if($user->is_active == 0)
                return response()->json(['message' => "This user is not active"],200);
            else
            {
                $token = $user->createToken('Auth-Token')->plainTextToken;
                if($user -> type =='admin')
                {
                    return response()->json(['data' => AuthAdminResource::make($user),'token' => $token],200);
                }
                else if($user -> type =='technician')
                {
                    return response()->json(['data' => AuthTechnicianResource::make($user),'token' => $token],200);
                }
                else
                {
                    return AuthClientResource::make($user);
                }
            }
        }
        return response()->json(['message' => "Username or password is incorrect"],200);
    }

    public function registerTechnician(SignupTechnicianRequest $request)
    {
        $user = $this->authService->technician($request->validated());
        if ($request->hasFile('icon'))
            $user->addMediaFromRequest('icon')->toMediaCollection('avatar');
        if ($request->hasFile('image'))
            $user->addMediaFromRequest('image')->toMediaCollection('residence');
            return response()->json(['message' => "done"],200);
    }

    public function registerClient(SignupClientRequest $request)
    {
        $user = $this->authService->client($request->validated());
        if ($request->hasFile('icon'))
            $user->addMediaFromRequest('icon')->toMediaCollection('avatar');
        if ($request->hasFile('image'))
            $user->addMediaFromRequest('image')->toMediaCollection('residence');
        return AuthClientResource::make($user);
    }
}
