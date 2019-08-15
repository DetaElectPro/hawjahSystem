<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['balance', 'wallet_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
