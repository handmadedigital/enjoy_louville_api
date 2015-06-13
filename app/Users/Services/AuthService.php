<?php

namespace ThreeAccents\Users\Services;


use ThreeAccents\Users\Repositories\UserRepository;

class AuthService
{
    protected $userRepo;

    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function register($data)
    {

    }
}