<?php

namespace App\Http\Controllers\Auth;

use App\Model\Option;

class AuthController
{
    /**
     * Initial information
     *
     * @param Option $option
     * @return array
     */
    public function init(Option $option)
    {
        return [
            'user' => auth()->user(),
            'token' => csrf_token(),
            'options' => $option->init()
        ];
    }

    /** Get current user */
    public function get()
    {
        return auth()->user();
    }

    /** Logout from system */
    public function logout()
    {
        auth()->logout();
    }
}
