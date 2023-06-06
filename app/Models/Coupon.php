<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = "promo_codes";

    protected $fillable = [
        'name',
        'code',
        'discount',
        'max_uses',
        'starts_at',
        'expires_at',
        'status',
    ];
}
