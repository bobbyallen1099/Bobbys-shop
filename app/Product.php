<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductCategory;
use App\ProductImage;

class Product extends Model
{
    protected $fillable = ['title','description','start_date','end_date','live']; 


    /**
     * Define relationship with product category
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
