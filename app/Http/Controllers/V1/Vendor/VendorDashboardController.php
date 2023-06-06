<?php

namespace App\Http\Controllers\V1\Vendor;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequests\AdminGeneralSettingRequest;
use App\Services\AdminServices\AdminService;
use Illuminate\Http\Request;

class VendorDashboardController extends Controller
{
    protected $adminService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminService $adminService)
    {
        $this->middleware('verified_by_admin');
        $this->adminService = $adminService;
    }

    public function vendorDashboard()
    {
        return view('vendor.index');
    }
   

    public function settings()
    {
        try
        {
            $this->payload = $this->adminService->adminSetting();
        }
        catch(GeneralException $e)
        {
            throw new GeneralException($e->getMessage(), $e->getCode());
        }
        return view('backend.settings.general_setting', $this->payload);
    }


    public function getStates(Request $request)
    {
        $request->validate([ 'country_id' => 'required']); 
        try
        {
            $this->states = $this->adminService->getStates($request->country_id);
        }
        catch(GeneralException $e)
        {
            throw new GeneralException($e->getMessage(), $e->getCode());
        }
        return $this->success(trans('admin.GET_COUNTRY_STATE'), ['success' => true, 'data' => ['states' => $this->states]]);
    }

    public function updateGeneralSettings(AdminGeneralSettingRequest $request)
    {
        try
        {
            $this->adminService->updateGeneralSettings($request);
        }
        catch(GeneralException $e)
        {
            throw new GeneralException($e->getMessage(), $e->getCode());
        }

        return $this->success(trans('admin.UPDATE_GENERAL_SETTING'), ['success' => true, 'data' => null]);     
    }


    public function updateBusinessSettings(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'business_type' => 'required',
        ]);
        try
        {
            $this->adminService->updateBusinessSettings($request);
        }
        catch(GeneralException $e)
        {
            throw new GeneralException($e->getMessage(), $e->getCode());
        }

        return $this->success(trans('admin.UPDATE_BUSINESS_SETTING'), ['success' => true, 'data' => null]);     
    }
}
