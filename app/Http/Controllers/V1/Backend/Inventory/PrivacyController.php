<?php

namespace App\Http\Controllers\V1\Backend\Inventory;

use App\Http\Controllers\Controller;
use App\DataTables\PrivacyDataTable;
use App\Http\Requests\InventoryRequests\StorePrivacyRequest;
use App\Models\Privacy;
use Illuminate\Http\Request;
use App\Services\InventoryServices\PrivacyService;
use App\Traits\ApiResponse;
use Illuminate\Http\Response;

class PrivacyController extends Controller
{
    use ApiResponse;
    protected $privacyService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(PrivacyService $privacyService)
    {
        $this->middleware('auth');
        $this->privacyService = $privacyService;
    }

    public function index(PrivacyDataTable $dataTable)
    {
        return $dataTable->render('backend.privacy.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Get all active parent privacies
        $privacies = $this->privacyService->activePrivacyWithLevel(0)->get();
        return view('backend.privacy.create', compact('privacies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->privacyService->store($request);
        return $this->success(trans('admin.CREATE_PRIVACY'), ['success' => true, 'data' => null]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $privacy = $this->privacyService->getParentPrivacy($id)->with('allParentPrivacies')->get();
        return view('backend.privacy.show', compact('privacy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $privacy = $this->privacyService->edit($id);
        $privacies = $this->privacyService->allPrivacy()->get();
        $parentPrivacy = $privacy->replicate();
        return view('backend.privacy.edit', compact('privacy', 'privacies', 'parentPrivacy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->privacyService->update($request, $id);
        return $this->success(trans('admin.UPDATE_PRIVACY'), ['success' => true, 'data' => null]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $this->privacyService->destroy($id);
            return $this->success(trans('admin.DELETE_PRIVACY'), ['success' => true, 'data' => null]);
        }
        catch (\Throwable $th) {
            return $this->error('Record not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }

    // sub privacy fetch
    public function subPrivacy(Privacy $privacy)
    {
        $subPrivacy = $privacy->subPrivacy;
        return $this->success('', ['success' => true, 'data' => compact('subPrivacy')]);
    }
}
