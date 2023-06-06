<?php

namespace App\Http\Controllers\V1\Vendor;

use App\DataTables\VendorProductDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allProduct(VendorProductDataTable $dataTable)
    {
        return $dataTable->with('vendor_id', auth()->id())->render('vendor.products.index');
    }
}
