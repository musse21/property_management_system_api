<?php

namespace App\Models\Owner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class owner extends Model
{
    use HasFactory; 

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'age',
        'gender',
        'image',
    ];
}
