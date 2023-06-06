<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CartSelectedContactCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'cartSelectedContact' => CartSelectedContactResource::collection($this->collection),
        ];
    }
}
