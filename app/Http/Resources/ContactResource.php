<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'contact_user_id' => $this->contact_user_id,
            'name' => $this->name,
            'contact_number' => $this->contact_number,
            'date_of_birth' => $this->date_of_birth,
            'day' => $this->day,
            'month' => $this->month,
            'year' => $this->year,
            'image' => $this->image ? url($this->image) : null,
            'email' => $this->email,
            'gender' => $this->gender,
            'company' => $this->company,
            'notes' => $this->notes,
            'user_id' => $this->user_id,
            'contact_user' => $this->user ? new UserResource($this->user) : null,
            'contact_privacy' =>  PrivacyResource::collection($this->privacy),
        ];
    }
}
