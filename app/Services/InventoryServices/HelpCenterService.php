<?php

namespace App\Services\InventoryServices;

use App\Repositories\InventoryRepositories\HelpCenterRepository;
use App\Models\HelpCenter;

class HelpCenterService
{
    protected $helpCenterRepository;

    public function __construct(HelpCenterRepository $helpCenterRepository)
    {
        $this->helpCenterRepository = $helpCenterRepository;
    }

    public function helpCenter()
    {
        return $this->helpCenterRepository->fetchAllActiveHelpCenter();
    }

    public function store($request)
    {
        return $this->helpCenterRepository->store($request);
    }

    public function update($request, $id)
    {
        $this->helpCenterRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->helpCenterRepository->destroy($id);
    }
}
