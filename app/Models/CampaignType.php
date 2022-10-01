<?php

namespace App\Models;

use App\Models\Campaign;
use App\Models\CampaignPriceList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CampaignType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'is_active'
    ];

    // Relationship
    public function campaign()
    {
        return $this->hasMany(Campaign::class, 'campaign_type_id');
    }

    /**
     * Get the CampaignPriceList associated with the CampaignType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function campaignPriceList()
    {
        return $this->hasOne(CampaignPriceList::class, 'price_type_id');
    }
    // End Relationship
}