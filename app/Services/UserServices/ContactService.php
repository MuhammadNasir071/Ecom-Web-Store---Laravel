<?php

namespace App\Services\UserServices;

use App\Repositories\UserRepositories\ContactRepository;
use Illuminate\Http\Request;

class ContactService
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function contacts()
    {
        return $this->contactRepository->contacts();
    }

    public function store($request)
    {
        return $this->contactRepository->store($request);
    }

    //PRIVACY SET TO ALL CONTACTS
    public function storeContactPrivacy($request)
    {
        return $this->contactRepository->storeContactPrivacy($request);
    }

    public function storeMultipleContacts($request)
    {
        // $createdContacts = collect();
        // foreach ($request->contacts as $contactRequest) {
        //     $contactRequest = new Request($contactRequest);
        //     $contacts = $this->contactRepository->store($contactRequest, );
        //     $createdContacts->push($contacts);
        // }
        // return $createdContacts;
        return $this->contactRepository->store($request);
    }

    public function edit($contactId)
    {
        return $this->contactRepository->show($contactId);
    }

    public function update($request, $id)
    {
        $this->contactRepository->update($request, $id);
    }

    public function fetchContactCategory($contact_id)
    {
        return $this->contactRepository->fetchContactCategory($contact_id);
    }

    // Store address of contact 
    public function addContactAddress($request)
    {
        return $this->contactRepository->addContactAddress($request);
    }

    // Update address of contact 
    public function updateContactAddress($request, $id)
    {
        return $this->contactRepository->updateContactAddress($request, $id);
    }

    // Delete address of contact 
    public function deleteContactAddress($id)
    {
        return $this->contactRepository->deleteContactAddress($id);
    }

    // fetch address of contact 
    public function fetchContactAddresses($contact_id)
    {
        return $this->contactRepository->fetchContactAddresses($contact_id);
    }



}
