<?php

namespace App\Http\Controllers\CustomerAuth;
USE App\Product;

use App\Courier;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Payment;
use Cart;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $couriers = Courier::all();
            $payments = Payment::all();
            return view('customer.cart')->with(['couriers' => $couriers, 'payments' => $payments]);
        }
        
        return redirect()->route('customer/login');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $couriers = Courier::all();
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if (!$duplicates->isEmpty()) {
            return redirect('customer/cart')->withSuccessMessage('Item is already in your cart!');
        }
        Cart::add($request->id, $request->name, $request->quantity, $request->price)->associate('App\Product');
        return redirect('customer/cart')->with(['couriers' => $couriers]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($id);
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,100'
        ]);
        if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
        }
        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('customer/cart')->withSuccessMessage('Item has been removed!');
    }

    public function emptyCart()
    {
        Cart::destroy();
        return redirect('/customer/cart')->withSuccessMessage('Your cart has been cleared!');
    }

    public function select_courier($id)
    {
        if ($id == 0) {
            $couriers = Courier::all();
        } else {
            $couriers = Courier::where('id', '=', $id);
        }

        return $couriers;
    }

    public function checkout(Request $request)
    {
        $order = new Order;
        $order->customer_id = Auth::user()->id;
        $order->payment_id = $request->input('payment_id');
        $order->courier_id = $request->input('courier_id');
        $order->delivery = $request->input('delivery');
        $order->total = $request->input('total');

        $order->save();

        $cart = Cart::content();

        foreach ($cart as $item) {
            $od = new OrderDetail;
            $od->order_id = $order->id;
            $od->product_id = $item->id;
            $od->quantity = $item->qty;

            $od->save();
            $this->subtract_stock($od->product_id, $item->qty);

        }

        
        $this->emptyCart();
        $payment = Payment::find($request->input('payment_id'));
        return view('customer.payment')->with(['payment' => $payment]);
    }

    public function subtract_stock($id, $qty)
    {
        $product = Product::find($id);
        $product->quantity = $product->quantity - $qty;
        $product->save();
    }

}
