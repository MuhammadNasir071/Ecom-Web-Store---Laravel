<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartSelectedContactResource extends JsonResource
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
            'id' => $this->selected_contact_id,
            'product_quantity' => $this->product_quantity,
            'contact_user_id' => $this->contact_user_id,
            'name' => $this->name,
            'contact_number' => $this->contact_number,
            'email' => $this->email,
            'nick_name' => $this->nick_name,
            'date_of_birth' => $this->date_of_birth,
            'day' => $this->day,
            'month' => $this->month,
            'year' => $this->year,
            'image' => $this->image,
            'gender' => $this->gender,
            'company' => $this->company,
            'notes' => $this->notes,
            'user_id' => $this->user_id,
        ];
    }
}
