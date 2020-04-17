<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestForm;

class EmailFr extends FormRequest
{
    use RequestForm;

    public function rules()
    {
        return [
            'email' => 'required|email|max:250'
        ];
    }

    public function messages()
    {
        return [
            'email.max' => __('form_request.email_max'),
            'email.*'   => __('form_request.email_invalid')
        ];
    }
}
