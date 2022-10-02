<?php

namespace App\Models;

use App\Models\User;
use App\Models\CampaignType;
use App\Models\CampaignCategory;
use App\Models\CampaignPriceList;
use App\Models\BallanceTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
            'user_id', 
            'campaign_type_id', 
            'campaign_category_id',
            'link', 
            'current_views',
            'current_subscribes',
            'watch_time',
            'number_of_subscribes',
            'method_payment',
            'price',
            'total'
    ];


    // Relationship
    public function ballanceTransaction()
    {
        return $this->hasMany(BallanceTransaction::class, 'transaction_status_id');
    }

    
    // Invers Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campaignType()
    {
        return $this->belongsTo(CampaignType::class, 'campaign_type_id');
    }
    
    public function campaignCategory()
    {
        return $this->belongsTo(CampaignCategory::class, 'campaign_category_id');
    }
}