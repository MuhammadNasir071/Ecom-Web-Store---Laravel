<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Backend\Admin\DashboardController;
use App\Http\Controllers\V1\Vendor\VendorDashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\V1\Backend\Admin\AdminController;
use App\Http\Controllers\V1\Backend\Inventory\CategoryController;
use App\Http\Controllers\V1\Backend\Inventory\UnitController;
use App\Http\Controllers\V1\Backend\Inventory\BrandController;
use App\Http\Controllers\V1\Backend\Inventory\ProductController;
use App\Http\Controllers\V1\Backend\Inventory\ShippingTypeController;
use App\Http\Controllers\V1\Backend\Inventory\VendorController;
use App\Http\Controllers\V1\Backend\Inventory\BannerController;
use App\Http\Controllers\V1\Backend\Inventory\CouponController;
use App\Http\Controllers\V1\Backend\Inventory\EventController;
use App\Http\Controllers\V1\Backend\Inventory\FAQController;
use App\Http\Controllers\V1\Backend\Inventory\HelpCenterController;
use App\Http\Controllers\V1\Backend\Inventory\PrivacyController;
use App\Http\Controllers\V1\Vendor\VendorProductController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if(auth()->user())
    {
        return redirect()->route('home');
    }
    else
    {
        return redirect()->route('login');
    }

});

Auth::routes();

Route::get('/verify_otp', [RegisterController::class, 'verifyOTP'])->name('verifyOTP');
Route::get('/verify/email', [RegisterController::class, 'verifyEmail'])->name('verifyEmail');
Route::post('/check_otp', [RegisterController::class, 'check_otp'])->name('checkOTP');
Route::post('/save_resend_otp', [RegisterController::class, 'save_resend_otp'])->name('saveOTP');
Route::post('/forgot_password', [RegisterController::class, 'forgot_password'])->name('forgotPassword');
Route::get('/reset_password', [RegisterController::class, 'reset_password'])->name('resetPassword');
Route::Post('/save_reset_password', [RegisterController::class, 'save_reset_password'])->name('saveResetPassword');

Route::get('/home', [HomeController::class, 'index'])->name('home');


/*
 * Backend Routes
 * Namespaces indicate folder structure
 */

Route::group([ 'prefix' => 'admin', 'as' => 'admin.'], function ()
{
    Route::group(['middleware' => 'auth'], function ()
    {
        Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('/general/settings', [AdminController::class, 'updateGeneralSettings'])->name('update.general.setting');
        Route::post('/business/setting', [AdminController::class, 'updateBusinessSettings'])->name('update.business.setting');

        Route::resource('/categories', CategoryController::class);
        Route::get('/categories/{category}/sub-categories', [CategoryController::class, 'subCategories'])->name('categories.subcategory');
        Route::resource('/units', UnitController::class);
        Route::resource('/brands', BrandController::class);
        Route::resource('/products', ProductController::class);
        Route::resource('/shippingtype', ShippingTypeController::class);
        Route::resource('/vendor', VendorController::class);
        Route::resource('/banner', BannerController::class);
        Route::resource('/events', EventController::class);
        Route::resource('/coupons', CouponController::class);
        Route::resource('/privacy', PrivacyController::class);
        Route::get('/privacy/{privacy}/sub-privacy', [PrivacyController::class, 'subPrivacy'])->name('privacy.subprivacy');
        Route::resource('/faq', FAQController::class);
        Route::resource('/helpcenter', HelpCenterController::class);

        Route::post('/shipping/types/{id}', [ProductController::class, 'getShippingType'])->name('shipping.type');
    });
});


Route::group(['as' => 'user.'], function ()
{
    Route::group(['middleware' => 'auth'], function () {
        Route::post('getStates', [AdminController::class, 'getStates'])->name('getStates');
    });
});





/*
 * Vendor Routes
 * Namespaces indicate folder structure
 */

Route::group(['prefix' => 'vendor', 'as' => 'vendor.'], function ()
{
    Route::group(['middleware' => 'auth'], function ()
    {
        Route::group(['middleware' => 'verified_by_admin'], function ()
        {
            Route::get('/dashboard', [VendorDashboardController::class,'vendorDashboard'])->name('dashboard');
            Route::get('/settings', [VendorDashboardController::class, 'settings'])->name('account.settings');
            Route::post('/general/settings', [VendorDashboardController::class, 'updateGeneralSettings'])->name('update.general.setting');
            Route::post('/business/setting', [VendorDashboardController::class, 'updateBusinessSettings'])->name('update.business.setting');
            Route::get('/products', [VendorProductController::class, 'allProduct'])->name('products.index');

        });
        Route::get('profile', [VendorDashboardController::class,'vendorProfile'])->name('profile');
    });
});

Route::get('test/push/notification', [HomeController::class, 'testPushNotification']);
