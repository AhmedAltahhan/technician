<?php

namespace App\Services;

use App\Models\User;

class TechnicanService
{

    public function all()
    {
        $users = User::with('media')->with('publicServices')->with('subServices')->whereType('technician')->get();
        return $users;
    }

    public function active(string $id)
    {
        $user = User::whereId($id)->update([
            'is_active' => 1,
        ]);
        return $user;
    }
}
