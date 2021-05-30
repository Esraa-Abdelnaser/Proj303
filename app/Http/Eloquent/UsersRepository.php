<?php

namespace App\Http\Eloquent;

use App\Http\Interfaces\UsersRepositoryInterface;
use App\Customer;
use App\Product;

class UsersRepository implements UsersRepositoryInterface
{

    public function sign_up($request)
    {
        // بيشوف الاول هل فيه حد عنده نفس الايميل او التلفون ساعتها مش هيرضى يخليه يعمل اكاونت
        if (Customer::where('email', $request->email)->count() > 0 || Customer::where('phone', $request->phone)->get()->count() > 0) {
            return "<script>
                    alert('There is account by this email or phone ');
                    window.location.href = '/mas';
                    </script>";
        }
        // غير كده لا هيخليه يعمل اكاونت
        else {
            // هنا بيسجل الداتا فالداتا بيز
            Customer::create([
                'name' => $request->name,
                'password' => $request->pass,
                'email' => $request->email,
                'phone' => $request->phone,
                'adress' => $request->adress
            ]);
            // هنا بيجيب الداتا من الداتا بيز ويخزنهم في متغير اسمه زبون
            $customer = Customer::where('name', $request->name)
                ->where('password', $request->pass)->get();
            //هنا بقوله شرط لو الاراي فيها ريكورد يبقى كده هو لقى اليوزر 
            if ($customer->count() > 0) {
                //هنا ب لوب على الاراي وبجيب اللي جواها    
                foreach ($customer as $c) {
                    //خزنلي البيانات دي وحطهملي في سيشن بحيث ان كل الفايلات تقراه فاي مكان مجرد انده عليه ب ريكويست 
                    $request->session()->put('user_name', $c->name);
                    $request->session()->put('user_id', $c->id);
                    $request->session()->put('user_email', $c->email);
                    $request->session()->put('user_phone', $c->phone);
                    $request->session()->put('user_adress', $c->adress);
                }
                // هنا بقوله هاتلي عدد الطلبات اللي عاملها اليوزر عشان يخزنهم في متغير اسمه نمبر بحيث نحطه فالكارت والعداد يبقى متحدث دايما
                // بجيب بيانات الزبون من الداتا بيز 
                $cust = Customer::find($c->id);
                // هنا بروح اجيب طلبات الكاستمر
                // و بروح اعدهم هم كام طلب
                $number = $cust->products()->count();
                // هنا بخزنهم في متغير اسمه نمبر
                $request->session()->put('numOfOrders', $number);
            }
            return redirect('/mas');
        }
    }

    public function sign_in($request)
    {

        $user = $request->name2;
        $pass = $request->pass2;

        // هنا بشوف لو اليوزر ده موجود يرجعلي الداتا بتاعته كلها من الداتا بيز
        $customer = Customer::where('name', $user)
            ->where('password', $pass)->get();
        //هنا لو لو لقاه فيه ريكورد يعنيي اكبر من زيرو فبقوله خزنهملي في سيشن عشان كل الفايلات تقدر تقراه علطول
        if ($customer->count() > 0) {
            foreach ($customer as $c) {
                $request->session()->put('user_name', $c->name);
                $request->session()->put('user_id', $c->id);
                $request->session()->put('user_email', $c->email);
                $request->session()->put('user_phone', $c->phone);
                $request->session()->put('user_adress', $c->adress);

                // بجيب بيانات الزبون من الداتا بيز 
                $cust = Customer::find($c->id);
                // هنا نفس الكلام بروح اجيب طلبات الكاستمر
                // و بروح اعدهم هم كام طلب
                $number = $cust->products()->count();
                // هنا بخزنهم في متغير اسمه نمبر
                $request->session()->put('numOfOrders', $number);

                return redirect('/mas');
            }
        }
        // هنا بقى لو هو مفيش اكونت بالاسم او الباسوورد ده بديله ايرور
        else {
            return "<script>
                    alert('Wrong username or password ');
                    window.location.href = '/mas';
                    </script>";
        }
    }

    public function save_order($request)
    {
        // nc refer to id of customer
        // ف هنا بقوله روح شوفلي لو الكاستمر ده موجود روح هاتلي بياناته
        if (isset($request->nc)) {
            //هنا بيخزن البيانات في متغير اسمه كاستمر 
            $customer = Customer::find($request->nc);

            //  هنا بروح اجيب كل بيانات الطلب نفسه اذا كان وجبة او مشروب ..
            $product =  Product::select('name', 'price')->find($request->np);

            //  هنا بروح اقوله خزنلي البيانات دي انه الزبون ده طلب وجبة كودها مذا وسعرها كذا وكميتها كذا والسعر للكمية كذا كل ده هيكون 
            // in relationship  many to many (table)
            // np refer to id of product
            $customer->products()->attach($request->np, ['quantity' => $request->num, 'sub_price' => ($product->price) * ($request->num)]);

            //  هنا نفس الكلام بعد عند الكاستمر كام طلب
            $order = $customer->products();
            $number = $order->count();
            $request->session()->put('numOfOrders', $number);
        }
    }

    public function show_receipt($request)
    {
        // هنا بشوف لو الكاستمر ده موجود
        if (isset($request->nc)) {
            //بخزن بيانات الكاستمر في متغير اسمه كاستمر  
            $customer = Customer::find($request->nc);
            $products = $customer->products;

            return view('user.result', compact('products'));
        }
        //  هنا بقوله لو انت مش مسجل لازم تروح تسجل الاول
        else {
            return "<script>
                        alert('Please sign in first ');
                        window.location.href = '/mas';
                        </script>";
        }
    }

    public function show_menu($request)
    {
        // بيجيب كل البرودكتس
        $products = Product::get();

        return $products;
    }

    public function sign_out($request)
    {
        // بحيث انها بتخليها تمسح السيشنز
        $request->session()->forget('request->customer_id');
        $request->session()->forget('request->customer_name');
        $request->session()->flush();
    }

    public function Confirm_order($request)
    {
        // بيمسح الاوردر عشان مبقاش له لزمة بعد ما اتاكد
        Customer::find($request->nc)->products()->detach();
        // هنا بيروح يجيب عدد الاوردرز الجديد
        $cust = Customer::find($request->nc);
        $number = $cust->products()->count();
        $request->session()->put('numOfOrders', $number);
    }

    public function delete_order($request)
    {

        Customer::find($request->nc)->products()->wherePivot('id', $request->id_order)->detach();
        // هنا بيروح يجيب عدد الاوردرز الجديد
        $cust = Customer::find($request->nc);
        $number = $cust->products()->count();
        $request->session()->put('numOfOrders', $number);

        $customer = Customer::find($request->nc);
        $products = $customer->products;
        return $products;
    }
}
