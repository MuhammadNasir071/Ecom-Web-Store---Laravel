<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CartProductCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'cartProduct' => CartProductResource::collection($this->collection),
        ];
    }
}
