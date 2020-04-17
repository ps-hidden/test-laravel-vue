<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestForm;

class LogoFr extends FormRequest
{
    use RequestForm;

    public function rules()
    {
        return [
            'logo' => 'file|mimes:jpeg,jpg,png,svg,gif|max:200',
        ];
    }

    public function messages()
    {
        return [
            'logo.*' => 'Logo must be jpg|png|svg|gif and no more 200kb'
        ];
    }
}
