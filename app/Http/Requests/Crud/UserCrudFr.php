<?php

namespace App\Http\Requests\Crud;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestForm;

class UserCrudFr extends FormRequest
{
    use RequestForm;

    public function rules()
    {
        return [
            'email'     => 'required|email|max:150|unique:users,email,'. $this->id,
            'name'      => 'required|string',
            'password'  => 'nullable|string|min:8',
            'role'      => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => __('form_request.email_exists'),
            'email.max'    => __('form_request.email_max'),
            'email.*'      => __('form_request.email_invalid'),
            'name.*'       => __('form_request.name_required'),
            'password.*'   => __('form_request.password_invalid'),
            'role.*'       => __('form_request.role_required')
        ];
    }
}
