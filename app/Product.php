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
        return $this
            ->hasOne(ProductCategory::class, 'id', 'category_id');
    }

    /**
     * Define relationship with product images
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function images()
    {
        return $this
            ->hasMany(ProductImage::class, 'product_id', 'id')
            ->orderBy('product_images.order', 'asc');
    }

    /**
     * Define where it should display on the frontend
     */
    public function scopeIsLive($query)
    {
        return $query->whereLive(true)
            ->where(function ($query) {
                return $query->WhereNull(
                    ['start_date', 'end_date']
                )->orWhere([
                    ['start_date', '=', NULL],
                    ['end_date', '>=', now()]
                ])->orWhere([
                    ['start_date', '<=', now()],
                    ['end_date', '=', NULL]
                ])->orWhere([
                    ['start_date', '<=', now()],
                    ['end_date', '>=', now()]
                ]);
            });
    }
}