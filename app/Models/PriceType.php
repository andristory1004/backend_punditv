<?php

namespace App\Models;

use App\Models\EarnPriceList;
use App\Models\CampaignPriceList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PriceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type'
    ];
    
    // Relationship
        public function campaignPriceList()
        {
            return $this->hasMany(CampaignPriceList::class, 'price_type_id');
        }

        public function earnPriceList()
        {
            return $this->hasMany(EarnPriceList::class, 'price_type_id');
        }
}