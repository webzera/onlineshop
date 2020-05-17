<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
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

    public function index()
    {
    	return view('checkout.index');
    }

    // public function closure()
    // {
    //     $message = 'world';
    //     //test 1

    //     // $example = function ($arg) use ($message) {
    //     //     var_dump($arg . ' ' . $message);
    //     // };
    //     //$example("hello"); //return hellp world

    //     //test 2

    //     // $example = fn($arg) => $arg . ' ' . $message;
    //     // echo $example("hello"); //return hellp world

    //     //test 3
    //     // $n = "Mike";
    //     // $calc = fn() => "Hello ". $n;
    //     // echo $calc(); //returns Hello Mike
    // }
}
