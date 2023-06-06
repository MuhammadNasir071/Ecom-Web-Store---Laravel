<?php

namespace App\Services\InventoryServices;

use App\Repositories\InventoryRepositories\FaqRepository;

class FaqService
{
    protected $faqRepository;

    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    public function store($request)
    {
        return $this->faqRepository->store($request);
    }

    public function update($request, $id)
    {
        $this->faqRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->faqRepository->destroy($id);
    }

    public function fetchAllActiveFAQs()
    {
        return $this->faqRepository->fetchAllActiveFAQs();
    }
    public function fetchAllHelpCenterQueries()
    {
        return $this->faqRepository->fetchAllHelpCenterQueries();
    }
}
