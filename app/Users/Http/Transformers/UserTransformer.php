<?php

namespace ThreeAccents\Users\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Users\Entities\User;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id' => (int)  $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'first_name' =>   $user->first_name,
            'last_name' =>   $user->last_name,
            'phone_number' => (int)  $user->phone_number,
            'is_admin' => (bool) $user->is_admin,
        ];
    }
}