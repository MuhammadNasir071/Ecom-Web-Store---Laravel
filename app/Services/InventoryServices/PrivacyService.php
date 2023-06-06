<?php

namespace App\Services\InventoryServices;

use App\Repositories\InventoryRepositories\PrivacyRepository;
use App\Models\Privacy;

class PrivacyService
{
    protected $privacyRepository;

    public function __construct(PrivacyRepository $privacyRepository)
    {
        $this->privacyRepository = $privacyRepository;
    }

    // Get all active parent privacies
    public function activePrivacyWithLevel($level)
    {
        return $this->privacyRepository->activePrivacyWithLevel($level);
    }

    // Get parent privacy of specific child privacy
    public function getParentPrivacy($id)
    {
        return $this->privacyRepository->getParentPrivacy($id);
    }

    // For Edit show specific privacy
    public function edit($id)
    {
        return $this->privacyRepository->show($id);
    }

    // Fetch all privacies active/deactive 
    public function allPrivacy()
    {
        return $this->privacyRepository->fetchAllPrivacy();
    }

    // create privacy 
    public function store($request)
    {
        return $this->privacyRepository->store($request);
    }

     //update privacy
    public function update($request, $id)
    {
        return $this->privacyRepository->update($request, $id);
    }


    // set privacy to product category
    public function setCategoryPrivacy($request)
    {
        return $this->privacyRepository->setCategoryPrivacy($request);
    }

    
    // get contact Privacy
    public function getContactPrivacy($contact_id)
    {
        return $this->privacyRepository->getContactPrivacy($contact_id);
    }
    
    // get contact Privacy
    public function getPrivacyCategory($privacy_id)
    {
        return $this->privacyRepository->getPrivacyCategory($privacy_id);
    }

    // get contact Privacy categories
    public function fetchContactPrivacyCategories($contact_id)
    {
        return $this->privacyRepository->fetchContactPrivacyCategories($contact_id);
    }

    // delete privacy 
    public function destroy($id)
    {
        return $this->privacyRepository->destroy($id);
    }
}
