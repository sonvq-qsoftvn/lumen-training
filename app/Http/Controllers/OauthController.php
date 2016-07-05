<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
class OauthController
{
    public function verify($username, $password)
    {
        $user = User::where('email', $username)->first();
        if ($user && app()['hash']->check($password, $user->password)) {
            return $user;
        }

        return false;
    }
}