<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartProductCollection;
use App\Http\Resources\CartProductResource;
use App\Http\Resources\CartSelectedContactCollection;
use App\Http\Resources\CartSelectedContactResource;
use App\Services\UserServices\CartService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use ApiResponse;
    protected $cartService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    // Get all Cart products
    public function index()
    {
        $cartProduct = $this->cartService->getCartProduct(); 
        if(isset($cartProduct) && count($cartProduct) > 0) {
            return $this->success('All cart products details',
                [
                    'allCartProductDetail' => CartProductResource::collection($cartProduct),
                    'cart_contact' => CartSelectedContactResource::collection($cartProduct[0]['contact']),
                    'cart_product_count' => $cartProduct[0]['cart_product_count'],
                ]
            );
        }
        else{
            return $this->success('All cart products details', ['allCartProductDetail' => [ ]]);
        }
    }
    /** 
    * Store product in Cart with product quantity 
    * get auth user Cart product
    */
    public function store(Request $request)
    {
        $this->cartService->storeCart($request);                                             
        $cart_product = $this->cartService->getCartProductQuantity($request->product_id);  
        return $this->success(trans('Added to cart'), [
            'data'=> 
            [
                'action' => "Product added to cart successfully",
                'cart_product_count' => $cart_product->product_quantity,
            ]
        ]);
    }

    //Edit cart product 
    public function DecreaseCartItem($product_id)
    {
        $this->cartService->DecreaseCartItem($product_id);                                             
        $cart_product = $this->cartService->getCartProductQuantity($product_id);                    
        return $this->success(trans('Update cart product'), [
            'data'=> 
            [
                'action' => "Cart product updated successfully",
                'cart_product_count' => $cart_product->product_quantity,
            ]
        ]);
    }

    //cart selected contact info
    public function selectedContactCart(Request $request)
    {
        $this->cartService->selectedContactCart($request->contact_id);
        return $this->success('Set contact for cart product', ['action' => "Contact for cart stored"] );
    }

    //Remove product from cart
    public function destroy(Request $request)
    {
        $this->cartService->removeProductfromCart($request);
        return $this->success(trans('Remove from cart'),  ['action'=>  "Product removed from cart successfully"]);
    }

    //Remove product from cart
    public function emptyCart(Request $request)
    {
        $this->cartService->emptyCart();
        return $this->success(trans('Empty cart'),  ['action'=> true]);
    }
}
