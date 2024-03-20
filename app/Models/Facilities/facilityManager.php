<?php

namespace App\Models\Facilities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facilityManager extends Model
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

    public function created_by() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updated_by() {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
