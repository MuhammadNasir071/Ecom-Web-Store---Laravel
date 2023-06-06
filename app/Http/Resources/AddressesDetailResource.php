<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressesDetailResource extends JsonResource
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
            'contact_id' => $this->contact_id,
            'address_lable' => $this->address_lable,
            'street_address' => $this->street_address,
            'city_id' => $this->city_id,
            'state_id' => $this->state_id,
            'country_id' => $this->country_id,
            'postal_code' => $this->postal_code,
            'shipping_address' => $this->shipping_address,
            'billing_address' => $this->billing_address,
            'is_default' => $this->is_default,
            'city' => isset($this->city) ? new CityResource($this->city) : null,
            'state' => isset($this->state) ? new StateResource($this->state) : null,
            'country' => isset($this->country) ? new CountryResource($this->country) : null,
        ];
    }
}
