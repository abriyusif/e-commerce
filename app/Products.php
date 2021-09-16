<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $fillable = ['product_code','product_category','product_brand','product_sub_category',
    'product_name','product_description','purchase_price','selling_price','product_quantity','product_image'];
}
