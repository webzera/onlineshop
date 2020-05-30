<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ProductMedia;

class Product extends Model
{
    protected $table = 'products';
    public function medias()
    {
      return $this->hasMany(ProductMedia::class);
    }
    public function productimages()
    {
      return $this->hasMany(ProductMedia::class)->orderBy('cover_image', 'ASC');
    }
    public function coverimage()
    {
      return $this->hasMany(ProductMedia::class)->where('cover_image', 1);
    }
    public function categories(){
      return $this->belongsToMany(Category::class, 'product_categories');
    }
    
    // public function categories()
    // {
    //   return $this->belongsTo(Category::class, 'prodcate_id');
    // }
}
