<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PrivacyCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'allPrivacy' => PrivacyResource::collection($this->collection),
        ];
    }
}
