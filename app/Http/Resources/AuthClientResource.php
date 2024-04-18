<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($this->is_active == 1)
            $is_active = 'active';
        else
            $is_active = 'not active';

    // modify user data to a specified formal
    $data = [
        'name' => $this->name,
        'mobile' => $this->mobile,
        'email' => $this->email,
        'password' => $this->password,
        'city' => $this->city,
        'bank_name' => $this->bank_name,
        'number_of_statement'=> $this->number_of_statement,
        'location' => $this->location,
        'is_active' => $is_active,
        // to get a link of the image
        'avatar' => $this->getFirstMediaUrl('avatar'),
        'residence' => $this->getFirstMediaUrl('residence'),
    ];
    return $data;
    }
}
