<?php

namespace App\Models\Facilities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facilityManager extends Model
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

    public function created_by() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updated_by() {
        return $this->belongsTo(User::class, 'updated_by', 'id');   
    }
}
