<?php

namespace App\Http\Controllers\V1\Backend\Inventory;

Use App\DataTables\CouponDataTable;
use App\Models\Coupon;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\InventoryServices\CouponService;
use App\Http\Requests\InventoryRequests\StoreCouponRequest;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CouponService $couponService)
    {
        $this->middleware('auth');
        $this->couponService = $couponService;
    }

    public function index(CouponDataTable $dataTable)
    {
        return $dataTable->render('backend.coupons.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponRequest $request)
    {
        // dd($request);
        $this->couponService->store($request);
        return $this->success(trans('admin.CREATE_COUPON'), ['success' => true, 'data' => null]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('backend.faqs.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCouponRequest $request, $id)
    {
        $this->couponService->update($request, $id);
        return $this->success(trans('admin.UPDATE_COUPON'), ['success' => true, 'data' => null]);
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
            $this->couponService->destroy($id);
            return $this->success(trans('admin.DELETE_COUPON'), ['success' => true, 'data' => null]);
        }
        catch (\Throwable $th) {
            return $this->error('Record not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }
}
