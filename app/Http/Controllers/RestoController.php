<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use App\Order;

class RestoController extends Controller
{
     
    public function storeCustomers(Request $request){
        Customer::create([
            'name' => $request->name ,
            'password' => $request->pass ,
            'email' => $request->email , 
            'phone' => $request->phone ,
            'adress' => $request->adress
        ]);
        $customer = Customer::where('name',$request->name)
                            ->where('password', $request->pass)->get();
        if($customer->count()>0){                    
        foreach($customer as $c){
        $request->session()->put('user_name',$c->name);
        $request->session()->put('user_id',$c->id);
        $request->session()->put('user_email',$c->email);
        $request->session()->put('user_phone',$c->phone);
        $request->session()->put('user_adress',$c->adress);
        }
        $cust = Customer::find($c->id);
        $order = $cust->orders;
        $number = $cust->products()->count();
        $request->session()->put('numOfOrders',$number);
        return redirect('/mas');
        }
    }
    
    public function checkSignin(Request $request){
        $user = $request->name2 ;
        $pass = $request->pass2 ;
        
        $customer = Customer::where('name',$user)
                            ->where('password',$pass)->get();
        if($customer->count()>0){
            foreach($customer as $c){
            $request->session()->put('user_name',$c->name);
            $request->session()->put('user_id',$c->id);
            $request->session()->put('user_email',$c->email);
            $request->session()->put('user_phone',$c->phone);
            $request->session()->put('user_adress',$c->adress);
            
            $cust = Customer::find($c->id);
            $order = $cust->orders;
            $number = $cust->products()->count();
            $request->session()->put('numOfOrders',$number);
            
            return redirect('/mas');
            }
        }
        else {return "<script>
                    alert('Wrong username or password ');
                    window.location.href = '/mas';
                    </script>";}
    }
    
    public function save_order(Request $request){
        if(isset($request ->nc)){
         $customer = Customer::find($request ->nc);

         $product =  Product::select('name','price')->find($request->np);   

         $customer->products()->attach( $request ->np
         ,['quantity' =>$request->num ,'sub_price' =>($product->price) * ($request->num) ]);
         
        $cust = Customer::find($request ->nc);
        $order = $cust->products();
        $number = $cust->products()->count();

        $request->session()->put('numOfOrders',$number); 
        }
        
         return redirect('/mas');
    }
    
    public function count(Request $request){
    
     if(isset($request->nc)){
     $customer = Customer::find($request->nc);
     $products = $customer->products;

     $cust = Customer::find($request->nc);
     $order = $cust->products();
    
     
    return view('user.result',compact('products','order','esraa'));
    
     }
     
     else {return "<script>
                    alert('Please sign in first ');
                    window.location.href = '/mas';
                    </script>";}
    }

    public function showMenu(Request $request){
    
        $products = Product::get();
        
       return view('user.menu',compact('products') );
       
        }

        public function storeProducts(Request $request){
            Product::create([
                'name' => $request->name ,
                'price' => $request->price 
            ]);
            
            $products = Product::get();
        
            return view('user.menu',compact('products') );
            }

        public function signOut(Request $request){
            $request->session()->forget('request->customer_id');
            $request->session()->forget('request->customer_name');
            $request->session()->flush();
            return redirect('/mas');
            }   
        
        public function deleteOrder(Request $request){
            Customer::find($request->nc)->products()->detach(); 
            
            $cust = Customer::find($request ->nc);
            $number = $cust->products()->count();
            $request->session()->put('numOfOrders',$number); 
            return redirect('/mas');
        }    
    
    
}
