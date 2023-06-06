<?php

namespace App\Repositories\InventoryRepositories;

use App\Exceptions\GeneralException;
use App\Models\ShippingType;

use Illuminate\Support\Str;


class ShippingTypeRepository
{

    public function store($request)
    {
        ShippingType::create([
            'name' => $request->name,
            'is_active' => $request->is_active ?? 0,
            'slug' => Str::slug($request->name, '_'),
            'shipping_cost' => $request->shipping_cost,
            'min_shipping_days' => $request->min_shipping_days,
            'max_shipping_days' => $request->max_shipping_days,
        ]);
    }

    public function update($request, $id)
    {
        $shipping_type = ShippingType::find($id);
        $shipping_type->name = $request->name;
        $shipping_type->is_active = $request->is_active ?? 0;
        $shipping_type->slug = Str::slug($request->name, '_');
        $shipping_type->shipping_cost = $request->shipping_cost;
        $shipping_type->min_shipping_days = $request->min_shipping_days;
        $shipping_type->max_shipping_days = $request->max_shipping_days;
        $shipping_type->save();
    }
}
