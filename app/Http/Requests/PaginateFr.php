<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestForm;

class PaginateFr extends FormRequest
{
    use RequestForm;

    public function rules()
    {
        return [
            'orderBy' => 'nullable|string',
            'orderDir' => 'nullable|string|in:asc,desc',
            'perPage' => 'nullable|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
            'orderBy.*' => __('form_request.orderBy'),
            'orderDir.*' => __('form_request.orderDir'),
            'perPage.*' => __('form_request.perPage')
        ];
    }
}
