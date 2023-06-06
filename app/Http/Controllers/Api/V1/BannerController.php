<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Banner;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BannerCollection;
use App\Services\InventoryServices\BannerService;
use App\Http\Resources\BannerResource;

class BannerController extends Controller
{
    use ApiResponse;
    protected $bannerService;


    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function index()
    {
        $banners = $this->bannerService->banners();
        return $this->success(
            'Banners List Response',
            new BannerCollection($banners)
        );
    }


    public function show($bannerId)
    {
        $banner = Banner::where('id', $bannerId)->first();
        return $this->success(
            "Single Banner Response",
            ['Banner' => new BannerResource($banner)]
        );
    }
}
