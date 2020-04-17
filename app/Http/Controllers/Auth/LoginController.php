<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use App\Http\Requests\Auth\EmailUserFr;
use App\Http\Requests\Auth\PasswordFr;
use App\Http\Requests\EmailFr;
use App\Model\User;

class LoginController
{
    /**
     * Attempt auth user
     *
     * @param EmailFr $fr
     * @return Authenticatable|void
     */
    public function signIn(EmailFr $fr)
    {
        $attempt = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ], true);

        if ($attempt) {
            return auth()->user();
        }

        abort(422, __('message.credentials_failed'));
    }

    /**
     * Sign Up user and auto login
     *
     * @param EmailUserFr $fr1
     * @param PasswordFr  $fr2
     * @param User        $user
     * @return Authenticatable|void
     */
    public function signUp(EmailUserFr $fr1, PasswordFr $fr2, User $user)
    {
        $user = $user->fill(request()->input());
        if (! request('name')) {
            $user->name = explode('@', request('email'))[0];
        }
        $user->save();

        if ($user->id) {
            auth()->loginUsingId($user->id, true);

            return auth()->user();
        }

        abort(422, __('message.registration_failed'));
    }
}
