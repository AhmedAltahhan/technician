<?php


namespace App\Services;

use App\Models\Client;
use App\Models\Technician;
use App\Models\User;

class AuthService
{
    // to register a new client
    public function client(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' =>  $data['email'],
            'password' => bcrypt($data['password']),
            'city' =>  $data['city'],
            'bank_name' =>  $data['bank_name'],
            'number_of_statement' =>  $data['number_of_statement'],
            'location'=> $data['location'],
            'type' => 'client',
        ]);
        $user->assignRole('client');
        return $user;
    }

     // to register a new technician
     public function technician(array $data)
     {
        $user = User::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' =>  $data['email'],
            'password' => bcrypt($data['password']),
            'city' =>  $data['city'],
            'bank_name' =>  $data['bank_name'],
            'number_of_statement' =>  $data['number_of_statement'],
            'location'=> $data['location'],
            'type' => 'technician',
        ]);
        $user->publicServices()->attach($data['public_service']);
        $user->subServices()->attach($data['sub_service']);
        $user->assignRole('technician');
         return $user;
     }

}
