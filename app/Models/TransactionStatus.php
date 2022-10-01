<?php

namespace App\Models;

use App\Models\BallanceTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'is_active'
    ];

    /**
     * Get all of the ballanceTransaction for the TansactionStatus
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ballanceTransaction()
    {
        return $this->hasMany(BallanceTransaction::class, 'transaction_status_id');
    }
}