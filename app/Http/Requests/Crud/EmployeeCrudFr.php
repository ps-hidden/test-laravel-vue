<?php

namespace App\Http\Requests\Crud;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestForm;

class EmployeeCrudFr extends FormRequest
{
    use RequestForm;

    public function rules()
    {
        return [
            'f_name'        => 'required|string|max:255',
            'l_name'        => 'required|string|max:255',
            'company_id'    => 'required|integer|exists:companies,id',
            'email'         => 'nullable|email|max:255',
            'phone'         => 'nullable|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'f_name.*'      => __('form_request.first_name_required'),
            'l_name.*'      => __('form_request.last_name_required'),
            'company_id.*'  => __('form_request.company_id_invalid'),
            'email.*'       => __('form_request.email_invalid'),
            'phone.*'       => __('form_request.phone_required')
        ];
    }
}
