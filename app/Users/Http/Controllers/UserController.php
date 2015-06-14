<?php namespace ThreeAccents\Users\Http\Controllers;

use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Users\Entities\User;
use ThreeAccents\Users\Http\Transformers\UserTransformer;

class UserController extends ApiController
{
    public function getUser($user_id)
    {
        $user = User::find($user_id);

        return $this->respondWithItem($user, new UserTransformer());
    }
}