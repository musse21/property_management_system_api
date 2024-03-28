<?php

namespace App\Http\Controllers\Users;

use App\Helpers\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequests\CreateUserRequest;
use App\Http\Services\AuthsService\AuthsService;
use App\Http\Services\UserServices\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    /**
     * @var AuthsService
     */

    private AuthsService $authsService;

    /**
     * @var UserService
     */
    private UserService $userService;

    /**
     * @param AuthsService $authsService
     * @param UserService $userService
     */
    public function __construct(AuthsService $authsService, UserService $userService)
    {
        $this->authsService = $authsService;
        $this->userService = $userService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $user = $this->userService->createUser($validatedData);
            if ($user instanceof User) {
                $response = new ResponseMessage(true, 'User registered successfully', $user);
                return response()->json($response->getMessage(), Response::HTTP_CREATED);
            }else {
                $response = new ResponseMessage(false, 'Whoops! Unable to register user', null);
                return response()->json($response->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

        } catch (\Exception $exception) {
            $response = new ResponseMessage(false, $exception->getMessage(), null);
            return response()->json($response->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
