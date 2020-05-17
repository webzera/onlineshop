<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Order;

class AdminorderController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('checkrole');
    }
    public function index()
    {
    	$orders=Order::orderBy('created_at', 'asc')->paginate(10);
    	return view('admin.order.index')->with('orders', $orders);
    }
}
