<?php

namespace App\Http\Eloquent;

use App\Http\Interfaces\AdminRepositoryInterface;
use App\Customer;
use App\Product;

class AdminRepository implements AdminRepositoryInterface{
    
    public function create_product($request){
        // هنا بيعمل امر للداتا بيز بحيث يخزن بيانات فيها
        Product::create([
            'name' => $request->name ,
            'price' => $request->price 
        ]);
        // بجيث الداتا واخزنها فالمتغير ده
        $products = Product::get();

        return $products;
    }
}    