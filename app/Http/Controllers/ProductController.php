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
	public function productview()
    {        
        $products= Product::take(20)->get();
        return view('product.productview', ['products' => $products]);
    }
    public function productdetail(Product $product)
    {
    	$relatedproducts= Product::take(20)->get();
        return view('product.details', [
        	'product' => $product,
        	'products' => $relatedproducts,
        ]);
    }
}
