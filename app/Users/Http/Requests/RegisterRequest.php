<?php

namespace ThreeAccents\Users\Http\Requests;


use Illuminate\Contracts\Auth\Guard;
use ThreeAccents\Core\Http\Requests\Request;

class RegisterRequest extends Request
{
    protected $auth;

    function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function rules()
    {
        return [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required'
        ];
    }

    public function authorize()
    {
        if($this->auth->check()) return false;

        return true;
    }
}