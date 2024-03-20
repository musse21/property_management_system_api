<?php

namespace App\Http\Requests\RentOfficeRequests;

class RentOfficeRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email',
            'phone_number' => 'required',
            'price' => 'required',
            'floor_number' => 'required',
            'room_number' => 'required',
            'deposited_money' => 'required',
            'contract_plan' => 'required'

        ];
    }
}
