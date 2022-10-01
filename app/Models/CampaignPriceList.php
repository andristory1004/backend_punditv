<?php

namespace App\Models;

use App\Models\User;
use App\Models\Campaign;
use App\Models\PriceType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CampaignPriceList extends Model
{
    use HasFactory;

    protected $fillable = [
        'price_type_id',
        'price',
        'sale',
        'is_active',
        'created_by',
    ];

    
    // Invers Relationship
    
        public function priceType()
        {
            return $this->belongsTo(PriceType::class,);
        }

        public function createdBy()
        {
            return $this->belongsTo(User::class, 'created_by');
        }
}