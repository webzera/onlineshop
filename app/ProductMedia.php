<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

class ProductMedia extends Model
{
  protected $table = 'product_medias';
    public function product()
    {
    	return $this->belongsTo(Product::class);
  	}
    
  	// public static function coverimage($product)
  	// {
  	// 	$mediaurl=ProductMedia::where(['product_id' => $product->id, 'cover_image' => 1])->first();
  	// 	if($mediaurl)
  	// 	{
  	// 		return $mediaurl->media_url;
  	// 	}
  	// 	return null;
  		
  	// }
}
