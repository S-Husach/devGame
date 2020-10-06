<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function contract()
    {
        return $this->hasOne(Contract::class, 'contract_id', 'id');
    }
}
