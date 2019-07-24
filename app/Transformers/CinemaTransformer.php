<?php

namespace App\Transformers;

use App\Models\Cinema;

use League\Fractal\TransformerAbstract;

class CinemaTransformer extends TransformerAbstract
{

    /**
     * @param \App\Models\Cinema
     * @return array
    */
    public function transform(Cinema $user)
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
