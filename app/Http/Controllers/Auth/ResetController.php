<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\PasswordFr;
use App\Http\Requests\EmailFr;
use App\Model\User;

class ResetController
{
    /**
     * Create request for reset user password
     *
     * @param EmailFr $fr
     *
     * @return array|void
     */
    public function forgot(EmailFr $fr)
    {
        $reset = \Password::broker()->sendResetLink([ 'email' => request('email') ]);

        if (\Password::RESET_LINK_SENT === $reset) {
            return ['message' => __('message.reset_emailed')];
        }

        abort(422, __('message.reset_failed'));
    }

    /**
     * Confirm reset user password.
     *
     * @param EmailFr $fr1
     * @param PasswordFr $fr2
     *
     * @return User|void
     */
    public function reset(EmailFr $fr1, PasswordFr $fr2)
    {
        \Password::broker()->reset(request()->input(), function ($user, $password) {
            $user->password       = $password;
            $user->remember_token = null;
            $user->save();

            auth()->loginUsingId($user->id, true);
            return auth()->user();
        });

        abort(422, __('message.reset_token_invalid'));
    }

}
