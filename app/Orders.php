<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $fillable = ['customer_email','product_id','total_amount','quantity','txn_id','payment_status'];
  
}
             
