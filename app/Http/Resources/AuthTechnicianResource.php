<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthTechnicianResource extends JsonResource
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
            'message' => 'welcome Technician',
            'name' => $this->name,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'city' => $this->city,
            'bank_name' => $this->bank_name,
            'public_service' => PublicServiceResource::collection($this->whenLoaded('publicServices')),
            'sub_service' => SubServiceResource::collection($this->whenLoaded('subServices')),
            'location' => $this->location,
            'number_of_statement'=> $this->number_of_statement,
            'is_active' => $is_active,
            // to get a link of the image
            'avatar' => $this->getFirstMediaUrl('avatar'),
            'residence' => $this->getFirstMediaUrl('residence'),
        ];
        return $data;

    }
}
