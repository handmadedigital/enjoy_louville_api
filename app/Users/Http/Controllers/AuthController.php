<?php

namespace ThreeAccents\Users\Http\Controllers;

use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Commands\RegisterUserCommand;
use ThreeAccents\Users\Http\Requests\RegisterRequest;

class AuthController extends ApiController
{
    public function postRegister(RegisterRequest $request)
    {
        $this->dispatchFrom(RegisterUserCommand::class, $request);

        return $this->respondWithArray([
            'message' => 'user was registered'
        ]);
    }
}