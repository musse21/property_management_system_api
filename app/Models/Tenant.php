<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'nullable',
        'phone_number',
        'house_number',
        'kebele',
        'wereda',
        'sub_city',
        'city'
    ];
    public function created_by() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updated_by() {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
