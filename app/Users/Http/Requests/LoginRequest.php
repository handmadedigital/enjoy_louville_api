<?php

namespace ThreeAccents\Users\Http\Requests;

use ThreeAccents\Core\Http\Requests\Request;
use Tymon\JWTAuth\JWTAuth;

class LoginRequest extends Request
{
    /**
     * @var JWTAuth
     */
    protected  $auth;

    function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}