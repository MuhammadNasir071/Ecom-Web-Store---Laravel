<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthUserResource extends JsonResource
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
            'email' => $this->email,
            'username' => $this->username,
            'email_verified_at' => $this->email_verified_at,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'profile_picture' => $this->profile_picture,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'vendor_account_type' => $this->vendor_account_type,
            'company_name' => $this->company_name,
            'job_title' => $this->job_title,
            'company_url' => $this->company_url,
            'phone_number' => $this->phone_number,
            'phone_extention' => $this->phone_extention,
            'fax' => $this->fax,
            'business_type_id' => $this->business_type_id,
            'facebook_id' => $this->facebook_id,
            'google_id' => $this->google_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
