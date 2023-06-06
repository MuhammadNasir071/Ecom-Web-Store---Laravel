<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\StoreContactUsRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Services\UserServices\ContactUsService;

class ContactUsController extends Controller
{
    use ApiResponse;

    protected $contactUsService;

    public function __construct(ContactUsService $contactUsService)
    {
        $this->contactUsService = $contactUsService;
    }

    public function store(StoreContactUsRequest $request)
    {
        $this->contactUsService->store($request);
        return $this->success(trans('Your message submitted successfully'),  ['data' => null]);
    }
}
