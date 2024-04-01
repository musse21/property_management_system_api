<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequests\Authenticate;
use App\Http\Requests\AuthRequests\Login;
use App\Http\Requests\AuthRequests\RegisterUserRequest;
use App\Http\Services\AuthService\AuthsService;
use App\Models\User;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthsController extends Controller
{

    private AuthsService $authsService;

    public function __construct()
    {
        $this->authsService = new AuthsService;
//        $this->
    }



    public function register(RegisterUserRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $user = $this->authsService->registerUser($validatedData);
            $userToken = JWTAuth::fromUser($user);
            if ($userToken) {
                $response = new ResponseMessage(true, 'User Registered Successfully', ['user' =>$validatedData, 'token'=>$userToken]);
                return response()->json($response->getMessage(), Response::HTTP_CREATED);
            }

        } catch (\Exception $exception) {
            $response = new ResponseMessage(false, $exception->getMessage(), null);

            return response()->json($response->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function login(Login $login)
    {
        try {
            $reqData = $login->validated();
            $user = $this->authsService->authenticate($reqData);

            if ($user) {
                $response = new ResponseMessage(true, 'logged in successfully', $user);

                return response()->json($response->getMessage(), Response::HTTP_OK);
            }
            $response = new ResponseMessage(false, 'invalid credentials', null);

            return response()->json($response->getMessage(), Response::HTTP_UNAUTHORIZED);
        } catch (\Exception $exception) {
            $response = new ResponseMessage(false, $exception->getMessage(), null);

            return response()->json($response->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param SignInFormRequest $request
     * @return void
     */
    public function authenticateUser(Authenticate $request)
    {
        $reqData = $request->validated();
        $user = $this->authsService->authenticateUser($reqData);

            if ($user !== null) {
                $response = new ResponseMessage(true, 'authenticated successfully', ['token' => $user]);

                return response()->json($response->getMessage(), Response::HTTP_OK);
            } else {
                // Return error message if authentication failed
                return response()->json(['error' => 'Invalid email or password'], Response::HTTP_UNAUTHORIZED);
            }


        $response = new ResponseMessage(false, 'authentication failed', null);
        return response()->json($response->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
