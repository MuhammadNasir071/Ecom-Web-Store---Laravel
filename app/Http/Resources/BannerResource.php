<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            'banner_name' => $this->banner_name,
            'order' => $this->order,
            'is_active' => $this->is_active,
            'file_type' => $this->file_type,
            'path' => $this->path,
        ];
    }
}
