<?php

namespace App\Services\InventoryServices;

use App\Repositories\InventoryRepositories\BrandRepository;

class BrandService
{
    protected $brandsRepository;

    public function __construct(BrandRepository $brandsRepository)
    {
        $this->brandsRepository = $brandsRepository;
    }

    public function store($request)
    {
        $imagePath = $this->brandsRepository->storeImage($request);
        $this->brandsRepository->store($request, $imagePath);
        return true;
    }

    public function update($request, $id)
    {   
        $imagePath = $this->brandsRepository->storeImage($request);
        $this->brandsRepository->update($request, $id, $imagePath);
    }

    public function destroy($brand_id)
    {
        return $this->brandsRepository->destroy($brand_id);
    }
}
