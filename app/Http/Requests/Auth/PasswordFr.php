<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestForm;

class PasswordFr extends FormRequest
{
    use RequestForm;

    public function rules()
    {
        return [
            'password' => 'required|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'password.confirmed' => "Passwords don't match",
            'password.*'         => 'Password must be at least 8 characters'
        ];
    }
}
