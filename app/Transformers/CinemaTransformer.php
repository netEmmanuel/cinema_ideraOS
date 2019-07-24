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
    public function transform(Cinema $cinema)
    {
        return [
            'first_name' => (string) $cinema->first_name,
            'last_name' => (string) $cinema->last_name,
            'email' => (string) $cinema->email,
            'phone' => (string) $cinema->phone,
            'token' => (string) $cinema->token,
        ];
    }
}
