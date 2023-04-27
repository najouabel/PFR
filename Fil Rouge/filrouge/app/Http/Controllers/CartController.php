<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add_to_cart(Product $product, Request $request)
    {
        $user_id = Auth::id();
        $product_id = $product->id;

        $existing_cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();

        if ($existing_cart == null) {
           
    
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
            ]);
        }
        

        return Redirect::route('show_cart');
    }

    public function show_cart()
    {

        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        return view('show_cart', [
            'carts' => $carts,
        ]);
    }

    public function delete_cart(Cart $cart)
    {
        $cart->delete();
        return Redirect::route('show_cart');
    }
}
