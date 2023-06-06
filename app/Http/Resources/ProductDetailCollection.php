<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductDetailCollection extends ResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource);
    }


    public function toArray($request)
    {
        return [
            'product' => ProductDetailResource::collection($this->collection),
        ];
    }
}
