<?php

namespace ThreeAccents\Users\Http\Controllers;

use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Users\Http\Requests\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AdminController extends ApiController
{
    protected $auth;

    function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }


    public function authenticate(LoginRequest $request)
    {
        // grab credentials from the request
        $credentials = $request->only('username', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = $this->auth->attempt(['username' => $credentials['username'], 'password' => $credentials['password'], 'is_admin' => 1])) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }
}