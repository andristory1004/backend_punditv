<?php

namespace App\Models;

use App\Models\User;
use App\Models\BallanceTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CreditPundi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'ballance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
    public function ballanceTransaction()
    {
        return $this->hasOne(BallanceTransaction::class, 'ballance_id');
    }
}