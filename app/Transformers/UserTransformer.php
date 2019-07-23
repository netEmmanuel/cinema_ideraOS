<?php

namespace App\Transformers;

use App\Models\User;

use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    /**
     * @param \App\Models\User
     * @return array
    */
    public function transform(User $user)
    {
        return [
            'first_name' => (string) $user->first_name,
            'last_name' => (string) $user->last_name,
            'email' => (string) $user->email,
            'phone' => (string) $user->phone,
            'token' => (string) $user->token,
        ];
    }
}
