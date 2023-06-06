<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ParentPrivacyCollection;
use App\Http\Resources\ParentPrivacyResource;
use App\Http\Resources\PrivacyCollection;
use App\Services\InventoryServices\PrivacyService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    use ApiResponse;

    protected $privacyService;

    public function __construct(PrivacyService $privacyService)
    {
        $this->privacyService = $privacyService;
    }

    public function index()
    {
        $privacy = $this->privacyService->activePrivacyWithLevel(0)->with('subPrivacy')->get();
        return $this->success(trans('admin.PRIVACY_LIST'), new PrivacyCollection($privacy));
    }
    // get contact privacy 
    public function getContactPrivacy($contact_id)
    {
        $privacy = $this->privacyService->getContactPrivacy($contact_id)->with('allParentPrivacies')->get();
        return $this->success('Contact Privacy', ['contactPrivacy' => ParentPrivacyResource::collection($privacy)]);
    }

    // set privacy to product category
    public function setCategoryPrivacy(Request $request)
    {
        $this->privacyService->setCategoryPrivacy($request);
        return $this->success('Contact Privacy set Product Categories', ['action' => true]);
    }

    // set privacy to product category
    public function getContactPrefrence($privacy_id)
    {
        $privacyCategory = $this->privacyService->getPrivacyCategory($privacy_id)->get();
        return $this->success('Get Contact Privacy Category',
            [
                'categories' => CategoryResource::collection($privacyCategory)
            ]);
    }

    
    // set privacy to product category
    public function fetchContactPrivacyCategories($contact_id)
    {
        $contactPrivacyCategory = $this->privacyService->fetchContactPrivacyCategories($contact_id)->get();
    
        return $this->success('Get Contact Privacy Category',
            [
                'categories' => CategoryResource::collection($contactPrivacyCategory)
            ]);
    }
}
