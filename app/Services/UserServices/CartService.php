<?php

namespace App\Services\UserServices;

use App\Repositories\UserRepositories\CartRepository;

class CartService
{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getCartProduct()
    {
        return $this->cartRepository->getCartAllProduct();
    }

    //STORE PRODUCT IN CART WITH PRODUCT_QUANTITY
    public function storeCart($request)
    {
        return $this->cartRepository->addToCart($request);
    }

    //GET AUTH CART PRODUCT
    public function getCartProductQuantity($id)
    {
        return $this->cartRepository->getCartProductQuantity($id);
    }

    // EDIT CART PRODUCT 
    public function DecreaseCartItem($product_id)
    {
        return $this->cartRepository->DecreaseCartItem($product_id);
    }

    public function selectedContactCart($contact_id)
    {
        return $this->cartRepository->selectedContactCart($contact_id);
    }

    //REMOVE PRODYCT FROM CART
    public function removeProductfromCart($request)
    {
        return $this->cartRepository->destroy($request);
    }
    
    //EMPTY CART
    public function emptyCart()
    {
        return $this->cartRepository->emptyCart();
    }

    

}
