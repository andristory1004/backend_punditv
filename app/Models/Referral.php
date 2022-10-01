<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'referral_code',
        'referrer',
        'referrenced_1',
        'referrenced_2',
    ];
    
    
    public function user()
    {
        return $this->hasOne(User::class, 'ref_id');
    }
}