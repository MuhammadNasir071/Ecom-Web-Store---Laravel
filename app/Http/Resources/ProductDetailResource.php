<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user' => $this->user ? new UserResource($this->user) : null,
            'name' => $this->name,
            'vendor_id' => $this->vendor_id,
            'categories' => $this->categories ? CategoryResource::collection($this->categories) : null,
            'brand' => new BrandResource($this->brand),
            'shipping_type' => $this->shippingType ? new ShippingTypeResource($this->shippingType) : null,
            'quantity' => $this->quantity,
            'product_box' => $this->product_box,
            'sku' => $this->sku,
            'run_continuously' => $this->run_continuously,
            'price' => $this->price, //price is in cents. so, divide by 100 to get actual value
            'details' => $this->details,
            'media' => $this->media ? ProductMediaResource::collection($this->media) : null,
            'is_promotion' => $this->is_promotion,
            'promotion_price' => $this->promotion_price,
            'promotion_start_date' => $this->promotion_start_date,
            'promotion_end_date' => $this->promotion_end_date,
            'product_stock_owner' => $this->product_stock_owner,
            'stock_limit' => $this->stock_limit,
            'shipping_cost' => $this->shipping_cost,
            'is_active' => $this->is_active,
            'sold_count' => $this->sold_count,
            'favoriteProduct' => $this->favoriteProduct ? true :false,
            'cart_product_count' => isset($this->inCart->product_quantity) ? $this->inCart->product_quantity : null,
        ];
    }
}
