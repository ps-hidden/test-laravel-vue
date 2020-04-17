<?php

namespace App\Http\Requests\Crud;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestForm;

class OptionCrudFr extends FormRequest
{
    use RequestForm;

    public function rules()
    {
        return [
            'id'     => 'required|string|max:250',
            'value'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id.*'    => __('form_request.id_required'),
            'value.*' => __('form_request.value_required')
        ];
    }
}
