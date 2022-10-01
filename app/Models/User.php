<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Campaign;
use App\Models\Referral;
use App\Models\CreditPoint;
use App\Models\CreditPundi;
use App\Models\CampaignPriceList;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'picture',
        'ref_id',
        'is_active',
        'password',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Relationship

        public function campaign()
        {
            return $this->hasMany(Campaign::class, 'user_id');
        }

        public function priceList()
        {
            return $this->hasMany(CampaignPriceList::class, 'created_by');
        }
        
        public function creditPundi()
        {
            return $this->hasMany(CreditPundi::class, 'user_id');
        }
        
        public function creditPoint()
        {
            return $this->hasMany(CreditPoint::class, 'user_id');
        }


    // Invers Relatioship
    
        public function role()
        {
            return $this->belongsTo(Role::class, 'role_id');
        }

        public function referralId()
        {
            return $this->belongsTo(Referral::class, 'ref_id');
        }
}