<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
	public function __construct()
    {
        //
    }
	public function index()
    {
        // $products= Product::take(20)->get();
        // return view('home', ['products' => $products]);
    }
}
