<?php

namespace App\Services\InventoryServices;

use App\Repositories\InventoryRepositories\UnitRepository;

class UnitService
{
    protected $unitRepository;

    public function __construct(UnitRepository $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    public function units()
    {
        return $this->unitRepository->units();
    }

    public function store($request)
    {
        $this->unitRepository->store($request);
    }

    public function edit($unitId)
    {
        return $this->unitRepository->show($unitId);
    }

    public function update($unit, $request)
    {
        $this->unitRepository->update($unit, $request);
    }

    public function destroy($unitId)
    {
        $this->unitRepository->destroy($unitId);
    }

}
