<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestForm;

class EmailUserFr extends FormRequest
{
    use RequestForm;

    public function rules()
    {
        return [
            'email' => 'required|email|max:150|unique:users,email,'. $this->id
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email address already exists',
            'email.max'    => 'Maximum length of Email is 150 characters',
            'email.*'      => 'Invalid email address'
        ];
    }
}
