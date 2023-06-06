<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\GoogleController;
use App\Http\Controllers\Api\V1\Auth\FacebookController;
use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\Auth\ResetPasswordController;
use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\BannerController;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\ContactUsController;
use App\Http\Controllers\V1\Backend\Inventory\EventController;
use App\Http\Controllers\Api\V1\FAQsController;
use App\Http\Controllers\Api\V1\PrivacyController;
use App\Http\Controllers\Api\V1\PushNotificationController;
use App\Http\Controllers\Api\V1\UserController;
use App\Models\Product;

Route::group(['prefix' => '/customer'], function ()
{
    Route::group(['as' => 'customer.'], function ()
    {
        Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

        Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');
        Route::post('/verifyOTP', [RegisterController::class, 'verifyOTP'])->name('auth.verifyOTP');
        Route::post('/sendOTP', [RegisterController::class, 'sendOTP'])->name('auth.sendOTP');

        Route::post('/forgotPassword', [ForgotPasswordController::class, 'forgotPassword'])->name('auth.forgotPassword');

        Route::post('/resetPassword', [ResetPasswordController::class, 'resetPassword'])->name('auth.resetPassword');


        //facebook
        Route::get('/auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('auth.facebook');
        Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback'])->name('auth.facebook.callback');

        //Google
        Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
        Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');

        Route::group(['middleware' => ['auth.api:api']], function ()
        {
            Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
            Route::post('/changePassword', [ResetPasswordController::class, 'changePassword'])->name('auth.changePassword');

            // Contacts
            Route::get('contacts', [ContactController::class, 'index']);
            Route::post('contacts', [ContactController::class, 'store']);
            Route::post('contacts/import', [ContactController::class, 'importContacts']);
            Route::get('contacts/{contact}', [ContactController::class, 'show']);
            Route::post('contact_privacy', [ContactController::class, 'storeContactPrivacy'])->name('contact_privacy');
            Route::get('contact-privacy/product-category/{contact_id}', [ContactController::class, 'fetchContactCategory']);

            // Address
            Route::get('countries', [ContactController::class, 'getCountry']);
            Route::get('getState/{country_id}', [ContactController::class, 'getState']);
            Route::get('getCity/{state_id}', [ContactController::class, 'getCity']);
            Route::post('add_contact_address', [ContactController::class, 'addContactAddress']);
            Route::get('getcontact/{contact_id}/addresses', [ContactController::class, 'fetchContactAddresses']);
            Route::post('update_contact_address/{address_id}', [ContactController::class, 'updateContactAddress']);
            Route::delete('delete_contact_address/{address_id}', [ContactController::class, 'deleteContactAddress']);

            // Privacy
            Route::get('privacy', [PrivacyController::class, 'index']);
            Route::get('contact_privacy/{contact_id}', [PrivacyController::class, 'getContactPrivacy']);
            Route::post('categories-privacy', [PrivacyController::class, 'setCategoryPrivacy']);
            Route::get('contact_categories_privacy/{contact_id}', [PrivacyController::class, 'fetchContactPrivacyCategories']);
            Route::get('contact_preference/{privacy_id}', [PrivacyController::class, 'getContactPrefrence']);

            // FAQs
            Route::get('faqs', [FAQsController::class, 'index']);
            // Help Center
            Route::get('helpcenter', [FAQsController::class, 'helpCenter']);


            // Categories
            Route::get('categories', [CategoryController::class, 'index']);
            Route::get('categories/{category}', [CategoryController::class, 'show']);

            // Products
            Route::get('products', [ProductController::class, 'index']);
            Route::get('products/{productId}', [ProductController::class, 'show']);
            Route::get('products-with-category/{categoryId}', [ProductController::class, 'showProductsWithCatgeory']);
            // Favorite product
            Route::post('add_to_favorite_product', [ProductController::class, 'addToFavoriteProduct']);
            Route::post('remove_from_favorite_product', [ProductController::class, 'removeFavoriteProduct']);
            Route::get('get_favorite_products', [ProductController::class, 'getAllFavoriteProduct']);
            // Viewed & Popular Product
            Route::get('viewed_products', [ProductController::class, 'getViewedProduct']);
            Route::get('popular_products', [ProductController::class, 'getPopularProduct']);


            // Cart Product
            Route::get('cart_products', [CartController::class, 'index']);
            Route::post('add_to_cart', [CartController::class, 'store']);
            Route::get('decrease_cart_item/{product_id}', [CartController::class, 'DecreaseCartItem']);
            Route::post('remove_from_cart', [CartController::class, 'destroy']);
            Route::post('empty_cart', [CartController::class, 'emptyCart']);
            Route::post('selected_cart_contact', [CartController::class, 'selectedContactCart']);


            // Banners
            Route::get('banners', [BannerController::class, 'index']);
            Route::get('banners/{bannerId}', [BannerController::class, 'show']);

            // Events
            Route::get('events', [EventController::class, 'index']);
            Route::get('events/{eventId}', [EventController::class, 'show']);

            // Settings User Profile
            Route::post('profile_update', [UserController::class, 'profileUpdate']);
            Route::post('update_profile_picture', [UserController::class, 'updateProfilePicture']);

            // Contact us
            Route::post('contact-us', [ContactUsController::class, 'store']);

            // inser Dummy record in product-> sold_count coloumn
            Route::get('product_sold_count', function(){
                $producs = Product::get()->pluck('id');
                for($i=0 ; $i < count($producs); $i++){
                    $num = rand(10,1000);
                     Product::where('id',$producs[$i])->update([
                            'sold_count' =>$num ,
                        ]);
                    $num=null;
                }
            });

            //PUSH NOTIFICATION
            Route::post('/saveFCMToken', [PushNotificationController::class, 'saveFCMToken'])->name('user.saveFCMToken');
            Route::delete('/destroyFCMToken', [PushNotificationController::class, 'destroyFCMToken'])->name('user.destroyFCMToken');
        });
    });

});
