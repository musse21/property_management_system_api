<?php

namespace App\Models\Owner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class owner extends Model
{
    use HasFactory;

    protected $fillable = [
        //general info
        'first_name',
        'last_name',
        'email',
        'phone_number',

        //personal info
        'marital_status',
        'childrens',
        'age',
        'gender',


        //identification
        'image',

        //address
        'house_number',
        'city',
        'sub_city',
        'wereda',
        'kebele'
    ];
}
