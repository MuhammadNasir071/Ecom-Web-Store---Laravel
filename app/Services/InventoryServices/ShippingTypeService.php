<?php

namespace App\Services\InventoryServices;

use App\Repositories\InventoryRepositories\ShippingTypeRepository;

class ShippingTypeService
{
    protected $shippingTypeRepository;

    public function __construct(ShippingTypeRepository $shippingTypeRepository)
    {
        $this->shippingTypeRepository = $shippingTypeRepository;
    }

    public function store($request)
    {
        return $this->shippingTypeRepository->store($request);  
    }

    public function update($request, $id)
    {   
        $this->shippingTypeRepository->update($request, $id);
    }
}
