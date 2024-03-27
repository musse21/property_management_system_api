<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    const ACCOUNT_TYPES = ['OWNER', 'STAFF'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
