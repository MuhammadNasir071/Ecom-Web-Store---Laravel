<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Count;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['contact_id', 'address_lable', 'street_address', 'city',
        'state', 'country', 'postal_code', 'shipping_address', 'billing_address', 'is_default'];


    // get city 
    public function city()
    {
        return $this->belongsTo(City::class)->select('id', 'name');
    }

    // get state
    public function state()
    {
        return $this->belongsTo(State::class)->select('id', 'name');
    }

    // get country 
    public function country()
    {
        return $this->belongsTo(Country::class)->select('id', 'name');
    }
}
