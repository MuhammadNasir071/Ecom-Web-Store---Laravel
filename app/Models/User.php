<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use Laravel\Passport\HasApiTokens;
use App\Models\Traits\Method\UserMethod;
use Illuminate\Notifications\Notifiable;
use App\Models\Traits\Scope\UserScope;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Uuids, UserScope, UserMethod;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'profile_picture',
        'phone_number',
        'country_id', 'state_id', 'city', 'zip_code', 'fax', 'company_name', 'business_type_id', 'company_url', 'address',
        'vendor_account_type',
        'password',
        'otp_pin',
        'otp_datetime',
        'status',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'otp_pin',
        'otp_datetime',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')->withTimestamps();
    }

    public function userToken()
    {
        return $this->hasOne(UserToken::class);
    }
    public function tokens()
    {
        return $this->hasOne('App\Models\UserToken');
    }
    public function businessType()
    {
        return $this->hasMany(BusinessType::class);
    }

    public function usersContacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // get all auth()-> user() cartProducts
    public function cartProducts()
    {
        return $this->belongsToMany(Product::class, 'carts', 'user_id', 'product_id')->with('media')
            ->select('products.id', 'products.name', 'products.price', 'products.details')
            ->withPivot(['product_quantity', 'selected_contact_id']);
    }

    // get all auth()-> user() favoriteProduct
    public function favoriteProduct()
    {
        return $this->belongsToMany(Product::class, 'favorite_products', 'user_id', 'product_id')->withTimestamps();

    }

    // get all auth()-> user() Viewed Product
    public function getViewedProduct()
    {
        return $this->belongsToMany(Product::class, 'view_products', 'user_id', 'product_id')->withTimestamps()->latest('view_products.updated_at');

    }

    // get all auth()-> user() popular Product
    public function popularProduct()
    {
        return $this->belongsToMany(Product::class, 'view_products', 'user_id', 'product_id')->withTimestamps();

    }

    public function fcmTokens()
    {
        return $this->hasMany(FcmToken::class, 'user_id');
    }
}
