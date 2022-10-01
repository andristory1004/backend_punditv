<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'link',
        'total',
        'from_date',
        'to_date',
        'is_active',
        'media',
        'created_by',
        'updated_by',
    ];
}