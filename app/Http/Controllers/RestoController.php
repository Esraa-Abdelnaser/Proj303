<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;

class RestoController extends Controller
{
     
    public function storeCustomers(Request $request){
        // بيشوف الاول هل فيه حد عنده نفس الايميل او التلفون ساعتها مش هيرضى يخليه يعمل اكاونت
        if(Customer::where('email',$request->email)->where('phone', $request->phone)->get()->count()>0 ){
            return "<script>
                    alert('There is account by this email or phone ');
                    window.location.href = '/mas';
                    </script>";
        }
        // غير كده لا هيخليه يعمل اكاونت
        else{
            // هنا بيسجل الداتا فالداتا بيز
        Customer::create([
            'name' => $request->name ,
            'password' => $request->pass ,
            'email' => $request->email , 
            'phone' => $request->phone ,
            'adress' => $request->adress
        ]);
        // هنا بيجيب الداتا من الداتا بيز ويخزنهم في متغير اسمه زبون
        $customer = Customer::where('name',$request->name)
                            ->where('password', $request->pass)->get();
        //هنا بقوله شرط لو الاراي فيها ريكورد يبقى كده هو لقى اليوزر 
        if($customer->count()>0){ 
        //هنا ب لوب على الاراي وبجيب اللي جواها    
        foreach($customer as $c){
        //خزنلي البيانات دي وحطهملي في سيشن بحيث ان كل الفايلات تقراه فاي مكان مجرد انده عليه ب ريكويست 
        $request->session()->put('user_name',$c->name);
        $request->session()->put('user_id',$c->id);
        $request->session()->put('user_email',$c->email);
        $request->session()->put('user_phone',$c->phone);
        $request->session()->put('user_adress',$c->adress);
        }
        // هنا بقوله هاتلي عدد الطلبات اللي عاملها اليوزر عشان يخزنهم في متغير اسمه نمبر بحيث نحطه فالكارت والعداد يبقى متحدث دايما
        // بجيب بيانات الزبون من الداتا بيز 
        $cust = Customer::find($c->id);
        // هنا بروح اجيب طلبات الكاستمر
        // و بروح اعدهم هم كام طلب
        $number = $cust->products()->count();
        // هنا بخزنهم في متغير اسمه نمبر
        $request->session()->put('numOfOrders',$number);
        // هنا بقوله رجعني للصفحة الرئيسية تاني
        return redirect('/mas');
        }
    }
    }
    
    public function checkSignin(Request $request){
        $user = $request->name2 ;
        $pass = $request->pass2 ;
        
        // هنا بشوف لو اليوزر ده موجود يرجعلي الداتا بتاعته كلها من الداتا بيز
        $customer = Customer::where('name',$user)
                            ->where('password',$pass)->get();
        //هنا لو لو لقاه فيه ريكورد يعنيي اكبر من زيرو فبقوله خزنهملي في سيشن عشان كل الفايلات تقدر تقراه علطول
        if($customer->count()>0){
            foreach($customer as $c){
            $request->session()->put('user_name',$c->name);
            $request->session()->put('user_id',$c->id);
            $request->session()->put('user_email',$c->email);
            $request->session()->put('user_phone',$c->phone);
            $request->session()->put('user_adress',$c->adress);
            
            // بجيب بيانات الزبون من الداتا بيز 
            $cust = Customer::find($c->id);
            // هنا نفس الكلام بروح اجيب طلبات الكاستمر
            // و بروح اعدهم هم كام طلب
            $number = $cust->products()->count();
            // هنا بخزنهم في متغير اسمه نمبر
            $request->session()->put('numOfOrders',$number);
            
            return redirect('/mas');
            }
        }
        // هنا بقى لو هو مفيش اكونت بالاسم او الباسوورد ده بديله ايرور
        else {return "<script>
                    alert('Wrong username or password ');
                    window.location.href = '/mas';
                    </script>";}
    }
    
    // هنا ميثود بتحفظ الطلب اللي عامله اليوزر
    public function save_order(Request $request){
        // nc refer to id of customer
        // ف هنا بقوله روح شوفلي لو الكاستمر ده موجود روح هاتلي بياناته
        if(isset($request ->nc)){
        //هنا بيخزن البيانات في متغير اسمه كاستمر 
         $customer = Customer::find($request ->nc);
         
        //  هنا بروح اجيب كل بيانات الطلب نفسه اذا كان وجبة او مشروب ..
         $product =  Product::select('name','price')->find($request->np);   

        //  هنا بروح اقوله خزنلي البيانات دي انه الزبون ده طلب وجبة كودها مذا وسعرها كذا وكميتها كذا والسعر للكمية كذا كل ده هيكون 
        // in relationship  many to many (table)
        // np refer to id of product
         $customer->products()->attach( $request ->np
         ,['quantity' =>$request->num ,'sub_price' =>($product->price) * ($request->num) ]);
         
        //  هنا نفس الكلام بعد عند الكاستمر كام طلب
        $order = $customer->products();
        $number =$order->count();
        $request->session()->put('numOfOrders',$number); 

        }
        // بقوله رجعني للصفحة الرئيسية
         return redirect('/mas');
    }
    
    // هنا بقى فانكشن بتجبلي بيانات الفاتورة
    public function count(Request $request){
    // هنا بشوف لو الكاستمر ده موجود
     if(isset($request->nc)){
    //بخزن بيانات الكاستمر في متغير اسمه كاستمر  
     $customer = Customer::find($request->nc);
     $products = $customer->products;

     $order = $customer->products();
    
    return view('user.result',compact('products','order','esraa'));
    
     }
    //  هنا بقوله لو انت مش مسجل لازم تروح تسجل الاول
     else {return "<script>
                    alert('Please sign in first ');
                    window.location.href = '/mas';
                    </script>";}
    }
    // هنا مجرج بينده على كل جدول البرودكت بحيث انه بيعرض المنيو كلها
    public function showMenu(Request $request){
    
        $products = Product::get();
        
       return view('user.menu',compact('products') );
       
        }

        // هنا لو ادمن عايز يضيف برودكت
        public function storeProducts(Request $request){
            // هنا بيعمل امر للداتا بيز بحيث يخزن بيانات فيها
            Product::create([
                'name' => $request->name ,
                'price' => $request->price 
            ]);
            // بجيث الداتا واخزنها فالمتغير ده
            $products = Product::get();
            //ببعته لصفحة المنيو بحيث يشوف اللي ضافه 
            return view('user.menu',compact('products') );
        }

        // هنا فانكشن بتعمل تسجيل خروج 
        public function signOut(Request $request){
            // بحيث انها بتخليها تمسح السيشنز
            $request->session()->forget('request->customer_id');
            $request->session()->forget('request->customer_name');
            $request->session()->flush();
            return redirect('/mas');
            }   
        
        //هنا بقى لو عايزاه بعد ما خلاص اكد الاوردر وخلص يمسح بيانات الطلب 
        public function deleteOrder(Request $request){
            Customer::find($request->nc)->products()->detach(); 
            
            // هنا بيروح يجيب عدد الاوردرز الجديد
            $cust = Customer::find($request ->nc);
            $number = $cust->products()->count();
            $request->session()->put('numOfOrders',$number); 
            return redirect('/mas');
        }    
    
    
}
