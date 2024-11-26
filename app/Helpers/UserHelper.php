<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Team;

class UserHelper
{
    public static function createUser(array $data, Team $team)
    {
        $user = User::create($data);
        $user->teams()->attach($team);
        return $user;
    }
}
