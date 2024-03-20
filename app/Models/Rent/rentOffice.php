<?php

namespace App\Models\Rent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rentOffice extends Model
{
    use HasFactory;

    protected $filalble = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'price',
        'floor_number',
        'room_number',
        'deposited_money',
        'contact_plan'
    ];

    public function created_by() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updated_by() {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

}
