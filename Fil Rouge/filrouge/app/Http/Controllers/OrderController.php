<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function checkout()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        if ($carts == null)
        {
            return Redirect::back();
        }

        $order = Order::create([
            'user_id' => $user_id
        ]);

        foreach ($carts as $cart) {
           

            Transaction::create([
                'product_id' => $cart->product_id,
                'order_id' => $order->id,
            ]);

            $cart->delete();
        }

        return Redirect::route('show_order', $order);
    }

    public function index_order()
    {
        $user = Auth::user();
        $admin = $user->is_admin;

        if ($admin) {
            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', $user->id)->get();
        }

        return view('index_order', compact('orders'));
    }

    public function show_order(Order $order)
    {
        $user = Auth::user();
        $admin = $user->is_admin;

        if ($admin || $order->user_id == $user->id) {
            return view('show_order', compact('order'));
        }
        
        return Redirect::route('index_order');
    }

    public function submit_carte(Order $order, Request $request)
    {
        $file = $request->file('payment_carte');
        $destinationPath = 'images/';
        $profileImage = date('YmdHis').".".$file->getClientOriginalExtension();
        $file->move($destinationPath, $profileImage);

        $order->update([
            'payment_carte' => $profileImage,
            'place'=>$request->place,
            'date'=>$request->date,
            'time'=>$request->time,
        ]);

        return Redirect::back();
    }

    public function confirm_payment(Order $order)
    {
        $order->update([
            'is_confirm' => true,
        ]);

        return Redirect::route('index_order');
    }
}
