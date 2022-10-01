<?php

namespace App\Models;

use App\Models\User;
use App\Models\PriceType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EarnPriceList extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'price_type_id',
        'price',
        'price_lv_1',
        'price_lv_2',
        'is_active',
        'created_by',
        'updated_by',
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