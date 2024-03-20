<?php

namespace App\Http\Requests\LeasingTeamRequests;

class RegisterLeasingAgentsRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //general info
            'first_name' => 'required',
            'last_name' => 'required',
            'email',
            'phone' => 'required',

            //personal info
            'marital_status' => 'required',
            'childrens' => 'required',
            'age' => 'required',
            'gender' => 'required',

            //identification
            'image' => 'required',

            //address
            'house_number' => 'required',
            'city' => 'required',
            'sub_city' => 'required',
            'wereda' => 'required',
            'kebele' => 'required'

        ];
    }
}
