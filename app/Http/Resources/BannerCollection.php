<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BannerCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'banners' => BannerResource::collection($this->collection),
        ];
    }
}
