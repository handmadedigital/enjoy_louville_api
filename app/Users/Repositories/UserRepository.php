<?php

namespace ThreeAccents\Users\Repositories;


use ThreeAccents\Users\Entities\User;

class UserRepository
{
    protected $model;

    function __construct(User $model)
    {
        $this->model = $model;
    }

    public function persist($user)
    {
        $this->model->username = $user->username;
        $this->model->email = $user->email;
        $this->model->slug = sluggify($user->username);
        $this->model->first_name = $user->first_name;
        $this->model->last_name = $user->last_name;
        $this->model->phone_number = $user->phone_number;
        $this->model->password = bcrypt($user->password);

        $this->model->save();
    }
}