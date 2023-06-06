<?php

namespace App\Repositories\UserRepositories;

use App\Exceptions\GeneralException;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartRepository
{
    // Get all cart products 
    public function getCartAllProduct()
    {
        $cartProduct = [];
        if(Cart::where('user_id', auth()->id())->exists())
        {
            $cartProduct =  Auth::user()->cartProducts()->get();
            $contact = Contact::where('id', $cartProduct[0]['pivot']['selected_contact_id'])->get();
    
            $cartProduct[0]['contact']= $contact;
            $cartProduct[0]['cart_product_count']= $cartProduct->count();
            return $cartProduct;
        }
        else
        {
            return $cartProduct;
        }
    }

    // Store products into cart 
    public function addToCart($request)
    {
        if(Cart::where('user_id', auth()->id())->where('product_id', $request->product_id)->exists())
        {
            $cart = Cart::where('user_id', auth()->id())->where('product_id', $request->product_id)->first();
            Cart::where('user_id', auth()->id())->where('product_id', $request->product_id)->update([
                'product_quantity' => $cart->product_quantity + $request->product_quantity,
            ]);
        }
        else
        {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'product_quantity' => $request->product_quantity,
                'selected_contact_id' => $request->selected_contact_id,
            ]);
        }  
    }

    // Get all cart product quantity 
    public function getCartProductQuantity($id)
    {
        return Cart::where('user_id', auth()->id())->where('product_id', $id)->first();
    }

    // Decrease cart product items by 1 
    public function DecreaseCartItem($product_id)
    {
        try
        {
            if(Cart::where('user_id', auth()->id())->where('product_id', $product_id)->exists())
            {
                $cart = Cart::where('user_id', auth()->id())->where('product_id', $product_id)->first();
                Cart::where('user_id', auth()->id())->where('product_id', $product_id)->update([
                    'product_quantity' => ($cart->product_quantity - 1),
                ]);
            }      
        }
        catch (\Throwable $th) {
            throw new GeneralException('Unable to edit cart product.');
        }
    }

    // set contact for cart product 
    public function selectedContactCart($contact_id)
    {
        try
        {
            Cart::where('user_id', auth()->id())->update([
                'selected_contact_id' => $contact_id,
            ]);
        }
        catch (\Throwable $th) {
            throw new GeneralException('Unable to update cart product.');
        }
    }

    // Remove products from Cart 
    public function destroy($request)
    {
        try
        {
            return Cart::where('user_id', auth()->id())->whereIn('product_id', $request->product_id)->delete(); 
        }
        catch (\Throwable $th) {
            throw new GeneralException('Unable to delete cart product.');
        } 
    }

    //Empty Cart
    public function emptyCart()
    {
        try
        {
            return Cart::where('user_id', auth()->id())->delete(); 
        }
        catch (\Throwable $th) {
            throw new GeneralException('Unable to delete cart product.');
        } 
    }
}
