<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;
use App\User;

class Order extends Model
{
    public function items()
    {
    	return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
