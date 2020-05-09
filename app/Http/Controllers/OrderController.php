<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->shipping_fullname);

        $request->validate([
            'shipping_fullname' => 'required',
            'shipping_state' => 'required',
            'shipping_city' => 'required',
            'shipping_address' => 'required',
            'shipping_pincode' => 'required',
            'shipping_phone' => 'required',
        ]);

        $order = new Order();

        $order->order_number = uniqid('ORDNUM-');
        $order->user_id = auth()->id();
        
        $order->shipping_fullname = $request->shipping_fullname;
        $order->shipping_state = $request->shipping_state;
        $order->shipping_city = $request->shipping_city;
        $order->shipping_address = $request->shipping_address;
        $order->shipping_pincode = $request->shipping_pincode;
        $order->shipping_phone = $request->shipping_phone;

        if(! $request->has('billing_fullname'))
        {
            $order->billing_fullname = $request->shipping_fullname;
            $order->billing_state = $request->shipping_state;
            $order->billing_city = $request->shipping_city;
            $order->billing_address = $request->shipping_address;
            $order->billing_pincode = $request->shipping_pincode;
            $order->billing_phone = $request->shipping_phone;
        }else
        {
            $order->billing_fullname = $request->billing_fullname;
            $order->billing_state = $request->billing_state;
            $order->billing_city = $request->billing_city;
            $order->billing_address = $request->billing_address;
            $order->billing_pincode = $request->billing_pincode;
            $order->billing_phone = $request->billing_phone;
        }

        

        $order->grand_total = \Cart::session(auth()->id())->getTotal();
        $order->item_count = \Cart::session(auth()->id())->getContent()->count();

        $order->save();

        // save order items 
        $cartitems=\Cart::session(auth()->id())->getContent();

        foreach ($cartitems as $item) {
            $order->items()->attach($item->id,['price' => $item->price, 'quantity' => $item->quantity]);
        }

        //check payment method and process payment

        if($request->payment_method == 'paypal')
        {
            // return redirect()->route('create-payment');
            return redirect('/payment/create');       

        }elseif ($request->payment_method == 'cash_on_delivery') {
            echo 'cash_on_delivery';
            $susorder = Order::findOrFail($order->id);
            $susorder->is_paid=1;
            $susorder->save();
        }

        //empty cart
        \Cart::session(auth()->id())->clear();
        //send email to ordered user

        //take user to thank you page
        return "Order completed and thank you for order";

        // dd('order created', $order);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
