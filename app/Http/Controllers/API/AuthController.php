<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Auth\GetTokenRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

final class AuthController extends BaseApiController
{
    /**
     * @var AuthService
     */
    private AuthService $authService;

    /**
     * AuthController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $token = $this->authService->register($request);

        return $this->successResponse($token);
    }

    /**
     * @param GetTokenRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function token(GetTokenRequest $request)
    {
        $token = $this->authService->getToken($request);

        return $this->successResponse($token, 'Добро пожаловать!');
    }
}
