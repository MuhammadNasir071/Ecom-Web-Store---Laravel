<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequests\ImportContactsRequest;
use App\Http\Requests\ContactRequests\StoreContactRequest;
use App\Http\Resources\AddressesDetailResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\ContactCollection;
use App\Http\Resources\ContactResource;
use App\Http\Resources\ContactPrivacyAssignCategoryResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\StateResource;
use App\Models\Contact;
use App\Repositories\AdminRepositories\AdminRepository;
use App\Services\InventoryServices\PrivacyService;
use App\Services\UserServices\ContactService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use ApiResponse;
    protected $contactService;
    protected $privacyService;
    protected $adminRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ContactService $contactService, PrivacyService $privacyService, AdminRepository $adminRepository )
    {
        $this->contactService = $contactService;
        $this->privacyService = $privacyService;
        $this->adminRepository = $adminRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = contactLimitPerPage($request);
        $contacts = $this->contactService->contacts()->searchByName($request->key)->paginate($limit);
        return $this->success(
            trans('admin.CONTACT_LIST'),
            new ContactCollection($contacts)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ContactRequests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
    
        $limit = contactLimitPerPage($request);
        $this->contactService->store($request);
        $contacts = $this->contactService->contacts()->with('privacy', 'user')->searchByName($request->key)->paginate($limit);
        return $this->success(trans('admin.CONTACT_SYNC'), new ContactCollection($contacts));
    }

    public function storeContactPrivacy(Request $request)
    {
        $this->contactService->storeContactPrivacy($request);
        return $this->success(trans('admin.SET_CONTACT_PRIVACY'), ['success' => true, 'data' => null]);
    }

    /**
     * Store newly created resources in storage.
     *
     * @param  \App\Http\Requests\ContactRequests\ImportContactsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function importContacts(ImportContactsRequest $request)
    {
        $contacts = $this->contactService->storeMultipleContacts($request);
        return $this->success(trans('admin.IMPORT_CONTACT'), ['contacts' => ContactResource::collection($contacts)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $birthday
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        if ($contact->contact_user_id == auth()->id()) {
            return $this->success(
                trans('admin.SINGLE_CONTACT'),
                ['contact' => new ContactResource($contact)]
            );
        }
        return $this->error(
            trans('admin.INVALID_CONTACT'),
            401,
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ContactRequests\UpdateContactsRequest  $request
     * @param  \App\Models\Contact  $birthday
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContactRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $birthday
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }

      // get contact product category 
    public function fetchContactCategory($contact_id)
    {
        $categories = $this->contactService->fetchContactCategory($contact_id);
        return $this->success(trans('admin.PRIVACY_LIST'), ['PrivacyAssignCategory' =>ContactPrivacyAssignCategoryResource::collection($categories)]);
    }

    // Get all countries
    public function getCountry()
    {
        $countries =  $this->adminRepository->fetchCountries();
        return $this->success("All Countries", ['countries' =>CountryResource::collection($countries)]);
    }

    // Get selected country States
    public function getState($country_id)
    {
        $states = $this->adminRepository->getStates($country_id);
        return $this->success("Selected Country States", ['states' =>StateResource::collection($states)]);
    }

    // Get selected country States
    public function getCity($state_id)
    {
        $cities = $this->adminRepository->getCity($state_id);
        return $this->success("All city of Selected State", ['cities' =>CityResource::collection($cities)]);
    }

    // Store address of contact
    public function addContactAddress(Request $request)
    {
        $this->contactService->addContactAddress($request);
        return $this->success("Address of contact saved", ['success' => true, 'data' => null]);
    }

    // Update address of contact
    public function updateContactAddress(Request $request, $id)
    {
        $this->contactService->updateContactAddress($request, $id);
        return $this->success("Address of contact saved", ['success' => true, 'data' => null]);
    }

    // Delete address of contact
    public function deleteContactAddress($id)
    {
        $this->contactService->deleteContactAddress($id);
        return $this->success("Delete address of contact successfully", ['success' => true, 'data' => null]);
    }

    // fetch address of contact
    public function fetchContactAddresses($contact_id)
    {
        $address = $this->contactService->fetchContactAddresses($contact_id);
        return $this->success("All Addresses of specific contact", ['addresses' => AddressesDetailResource::collection($address)]);
    }




}
