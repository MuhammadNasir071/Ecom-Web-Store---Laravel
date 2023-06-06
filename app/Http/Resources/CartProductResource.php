<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartProductResource extends JsonResource
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
            'name' => $this->name,
            'price' => $this->price,
            'cart_product_quantity' => $this->pivot->product_quantity,
            'selected_contact_id' => $this->pivot->selected_contact_id,
            'details' => $this->details,
            'media' => $this->media ? new ProductMediaResource($this->media->first()) : null,
        ];
    }
}
