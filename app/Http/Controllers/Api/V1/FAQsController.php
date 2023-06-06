<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FAQsCollection;
use App\Http\Resources\FAQsResource;
use App\Http\Resources\HelpCenterCollection;
use App\Services\InventoryServices\FaqService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Models\Faq;

class FAQsController extends Controller
{
    use ApiResponse;

    protected $faqsService;

    public function __construct(FaqService $faqsService)
    {
        $this->faqsService = $faqsService;
    }

    public function index(Request $request)
    {
        $limit = limitPerPage($request);
        $faqs = $this->faqsService->fetchAllActiveFAQs()
                            ->searchByQuestion($request->key)
                            ->paginate($limit);

        return $this->success(trans('All active FAQs record'), new FAQsCollection($faqs));
    }

    public function helpCenter(Request $request)
    {
        $limit = limitPerPage($request);
        $helpcenter = $this->faqsService->fetchAllHelpCenterQueries()
                            ->searchByName($request->key)
                            ->paginate($limit);

        return $this->success(trans('All help center queries '), new HelpCenterCollection($helpcenter));
    }
}
