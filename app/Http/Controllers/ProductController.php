<?php

namespace App\Http\Controllers;

use App\cart;
use App\Item;
use App\Order;
use App\OrderDetail;
use App\Product;
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
//     dd($request->session()->get('cart'));
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

//        Session::put('cart',$cart);
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
//        Session::put('cart',$cart);
        return redirect()->route('product.shoppingCart');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }


    public function getcheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request)
    {

        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        Stripe::setApiKey('sk_test_l9dAGZHU0dsyBLrcZBisejhG009tj7xbIR');
        try {
            $charge = Charge::create([
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge "
            ]);
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;
            Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased products');
    }


    public function getOrder()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new cart($oldCart);
        $total = $cart->totalPrice;
        $order = new Order();
        $order->address = Auth::user()->address;
        $order->phone = Auth::user()->phone;
        $order->user_id = Auth::user()->id;
        $order->save();

        $order_Detail = new OrderDetail();
        $orderID = DB::table('orders')->select('id')
            ->where('phone', '=', $order->phone)->get();
        $i = 1;
        $r = $orderID->first();
//       dd( $r->id);
        foreach ($cart as $item) {
//            foreach($item as $k=> $ie ) {
//                    dd($cart);
//                echo $k;
            $order_Detail->order_id = $r->id;
            $order_Detail->item_id = $item [$i]['item']['id'];
            $order_Detail->qty = $item [$i]['qty'];
            $order_Detail->total = $item[$i]['price'];
//                dd($order_Detail->item_id = $item [1]['item']['id'],
//                    $order_Detail->qty = $item [1]['qty'],
//                    $order_Detail->total = $item[1]['price'],
//                    $order_Detail->item_id = $item [2]['item']['id'],
//                    $order_Detail->qty = $item [2]['qty'],
//                    $order_Detail->total = $item[2]['price']);

//                dd($order_Detail->item_id = $item [$k]['item']['id'],
//                    $order_Detail->qty = $item [$k]['qty'],
//                    $order_Detail->total = $item[$k]['price']);

//                $order_Detail->item_id = $item [$k]['item']['id'];
//                    $order_Detail->qty = $item [$k]['qty'];
//                    $order_Detail->total = $item[$k]['price'];
            $order_Detail->save();

            $i += 1;


//            }


        }
        Session::forget('cart');

        return redirect()->route('product.index')->with('success', 'Successfully purchased products');
    }
}