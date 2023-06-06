<?php

namespace App\Services\InventoryServices;

use App\Repositories\InventoryRepositories\VendorRepository;

class VendorService
{
    protected $vendorRepository;

    public function __construct(VendorRepository $vendorRepository)
    {
        $this->vendorRepository = $vendorRepository;
    }

    public function store($request)
    {
        $imagePath = $this->vendorRepository->storeImage($request);
        $this->vendorRepository->store($request, $imagePath);
    }

    public function updateVendor($request)
    {
        $imagePath = $this->vendorRepository->storeImage($request);
        $this->vendorRepository->update($request, $imagePath);
    }

    

}
