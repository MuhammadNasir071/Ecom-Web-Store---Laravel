<?php

namespace App\Services\InventoryServices;

use App\Repositories\InventoryRepositories\BannerRepository;

class BannerService
{
    protected $bannerRepository;

    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    public function banners()
    {
        return $this->bannerRepository->banners();
    }

    public function store($request)
    {
        $imagePath = $this->bannerRepository->storeImage($request);
        $this->bannerRepository->store($request, $imagePath);
        return true;
    }

    public function update($request, $id)
    {
        $imagePath = $this->bannerRepository->storeImage($request);
        $this->bannerRepository->update($request, $id, $imagePath);
    }

    public function destroy($id)
    {
        return $this->bannerRepository->destroy($id);
    }
}
