<?php

namespace App\Http\Requests\Crud;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestForm;

class CompanyCrudFr extends FormRequest
{
    use RequestForm;

    public function rules()
    {
        return [
            'name'      => 'required|string|max:255',
            'email'     => 'nullable|email|max:255',
            'logo'      => 'nullable|image|dimensions:min_width=100,min_height=100',
            'website'   => 'nullable|url|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.*'    => __('form_request.name_required'),
            'email.*'   => __('form_request.email_invalid'),
            'logo.*'    => __('form_request.logo_dimensions'),
            'website.*' => __('form_request.website_valid')
        ];
    }
}
