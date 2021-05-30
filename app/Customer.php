<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $fillable = ['id','name','password','adress','email','phone','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    
    public function products(){
        return $this->belongsToMany('App\Product','customers_products','customer_id','product_id'
       ,'id','id')->withPivot('quantity','sub_price','id');
    }
    
}
