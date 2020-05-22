<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $table = 'categories';    

    public function products()
    {
      return $this->belongsToMany(Product::class, 'product_categories');
    }
    public function parentCategory()
    {
    	return $this->belongsTo(Category::class, 'parent_id');
    }
    public function childCategories()
    {
    	return $this->hasMany(Category::class, 'parent_id');
    }

    // public function products()
    // {
    //   return $this->hasMany(Product::class);
    // }
}
