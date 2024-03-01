<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Base\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\auth\LoginRequest;
use App\Http\Requests\Api\auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends ApiController
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userRepository->create($request->validated());

        return $this->getResponse(200,'User created successfully',['user'=>UserResource::make($user)]);
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
          return  $this->getResponse(200,'login successfully',['user'=>UserResource::make($user),'token' => $token]);

        }
       return $this->getResponse(401,'Unauthorized');

    }
}
