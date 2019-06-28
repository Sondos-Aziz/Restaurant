<?php

namespace App\Http\Controllers;

use App\cart;
use App\checkout;
use App\Detail;
use App\Item;
use App\Order;
use App\OrderDetail;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Charge;


class ProductController extends Controller
{
    public function getAddToCart(Request $request, $id)
    {


        $product = Item::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');
    }


    public function getCart()
    {

        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new cart($oldCart);


//
//        $order = new Order();
//
//        $order->address = Auth::user()->address;
//        $order->phone = Auth::user()->phone;
//        $order->user_id = Auth::user()->id;
//        $order->status = false;
//        $order->save();
//
//        $orderProducts = [];
//        foreach ($cart->items as $productId => $item) {
//            $orderProducts[] = [
//                'order_id'  => $order->id,
//                'item_id' => $item ['item']['id'],
//                'qty' => $item ['qty'],
//                'total'  => $item['price']
//
//            ];
//        }
//        Detail::insert($orderProducts);
//
//        $order_id= $order->id;

        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }


    public function status(){
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new cart($oldCart);



        $order = new Order();

        $order->address = Auth::user()->address;
        $order->phone = Auth::user()->phone;
        $order->user_id = Auth::user()->id;
        $order->status = true;
        $order->save();

        $orderProducts = [];
        foreach ($cart->items as $productId => $item) {
            $orderProducts[] = [
                'order_id'  => $order->id,
                'item_id' => $item ['item']['id'],
                'qty' => $item ['qty'],
                'total'  => $item['price']

            ];
        }
        Detail::insert($orderProducts);

        $order_id= $order->id;
//        $order = DB::table('orders')->where('id','=',$id)->update(['status'=>1]);
//        $order = Order::find($id);
//        $order->status = 1;
        Session::forget('cart');
        Toastr::success('Reservation successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->route('product.index');
    }


    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);

        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);

        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

}

