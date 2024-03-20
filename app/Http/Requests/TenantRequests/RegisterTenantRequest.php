<?php

namespace App\Http\Requests\TenantRequests;
use Illuminate\Contracts\Validation\Validator;
class RegisterTenantRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name',
            'last_name',
            'email',
            'phone',
            'house_number',
            'wereda',
            'sub_city',
            'city'
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(["messages" => $validator->errors()], 400));
    }
}
