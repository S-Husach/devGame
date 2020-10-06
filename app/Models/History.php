<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function profiles()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }

    public function contracts()
    {
        return $this->belongsTo(Contract::class, 'contract_id', 'id');
    }
}
