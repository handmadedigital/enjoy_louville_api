<?php

namespace ThreeAccents\Users\Http\Controllers;

use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Commands\RegisterUserCommand;
use ThreeAccents\Users\Http\Requests\LoginRequest;
use ThreeAccents\Users\Http\Requests\RegisterRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends ApiController
{
    protected $auth;

    function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function postRegister(RegisterRequest $request)
    {
        $this->dispatchFrom(RegisterUserCommand::class, $request);

        return $this->respondWithArray([
            'message' => 'user was registered'
        ]);
    }

    public function authenticate(LoginRequest $request)
    {
        // grab credentials from the request
        $credentials = $request->only('username', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = $this->auth->attempt($credentials)) {
                $this->setStatusCode(401);
                return $this->respondWithError(['Incorrect username or password'], 420);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function refreshToken()
    {
        $token =  $this->auth->parseToken()->refresh();

        return response()->json(compact('token'));
    }
}