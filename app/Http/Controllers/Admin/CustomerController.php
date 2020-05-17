<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class CustomerController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('checkrole');
    }
    public function index()
    {
    	$customers=User::orderBy('created_at', 'asc')->paginate(10);
    	return view('admin.customer.index')->with('customers', $customers);
    }
}
