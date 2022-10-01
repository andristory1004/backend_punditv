<?php

namespace App\Models;

use App\Models\User;
use App\Models\Campaign;
use App\Models\TransactionStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BallanceTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'campaign_id',
        'ballance_id',
        'prefix',
        'description',
        'transaction_status_id'
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }

    public function transactionStatus()
    {
        return $this->belongsTo(TransactionStatus::class, 'transaction_status_id');
    }

    public function ballancePundi()
    {
        return $this->belongsTo(Ballance::class, 'ballance_id');
    }
}