<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestForm;

class DataFr extends FormRequest
{
    use RequestForm;

    public function rules()
    {
        return [
            'name'     => 'required|string|max:150',
            'password' => 'nullable|string|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.*'             => 'Name is required',
            'password.confirmed' => "Passwords don't match",
            'password.*'         => 'Password must be at least 8 characters'
        ];
    }
}
