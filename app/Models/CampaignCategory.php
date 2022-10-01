<?php

namespace App\Models;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CampaignCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category', 'is-active'
    ];

    // Relationship
    
    public function campaign()
    {
        return $this->hasMany(Campaign::class, 'campaign_category_id');
    }
    // End Relationship
}