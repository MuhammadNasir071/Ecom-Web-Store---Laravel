<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Scope\ShippingTypeScope;


class ShippingType extends Model
{
    use HasFactory, ShippingTypeScope;

    protected $table = 'shipping_types';
    
    protected $fillable = ['name', 'slug', 'is_active', 'shipping_cost', 'min_shipping_days', 'max_shipping_days' ];


    public function products()
    {
        return $this->hasMany(Products::class);
    }
}

