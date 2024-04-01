<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequests\RegisterUserRequest;
use App\Http\Services\AuthService\AuthsService;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthsController extends Controller
{

    private AuthsService $authsService;

    public function __construct()
    {
        $this->authsService = new AuthsService;
    }

    public function register(RegisterUserRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $user = $this->authsService->registerUser($validatedData);
            $userToken = JWTAuth::fromUser($user);
            if ($userToken) {
                $response = new ResponseMessage('true', 'User Registered Successfully', ['user' =>$validatedData, 'token'=>$userToken]);
                return response()->json($response->getMessage(), Response::HTTP_CREATED);
            }

        } catch (\Exception $exception) {
            $response = new ResponseMessage(false, $exception->getMessage(), null);

            return response()->json($response->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
