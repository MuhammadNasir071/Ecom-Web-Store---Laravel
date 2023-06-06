<?php

namespace App\Services\InventoryServices;

use App\Repositories\InventoryRepositories\CouponRepository;

class CouponService
{
    protected $couponRepository;

    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    public function store($request)
    {
        return $this->couponRepository->store($request);
    }

    public function update($request, $id)
    {
        $this->couponRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->couponRepository->destroy($id);
    }
}
