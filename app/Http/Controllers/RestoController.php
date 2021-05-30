<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use App\Http\Interfaces\UsersRepositoryInterface;

class RestoController extends Controller
{
    private $userRepository;

    public function __construct(UsersRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // SIGNUP
    public function storeCustomers(Request $request)
    {

        $return = $this->userRepository->sign_up($request);
        return $return;
    }

    // SIGNIN
    public function checkSignin(Request $request)
    {

        $return = $this->userRepository->sign_in($request);
        return $return;
    }

    // هنا ميثود بتحفظ الطلب اللي عامله اليوزر
    public function save_order(Request $request)
    {
        $this->userRepository->save_order($request);
        // بقوله رجعني للصفحة الرئيسية
        return redirect('/mas');
    }

    // هنا بقى فانكشن بتجبلي بيانات الفاتورة
    public function count(Request $request)
    {
        $return = $this->userRepository->show_receipt($request);
        return $return;
    }

    // هنا مجرج بينده على كل جدول البرودكت بحيث انه بيعرض المنيو كلها
    public function showMenu(Request $request)
    {
        $products = $this->userRepository->show_menu($request);
        return view('user.menu', compact('products'));
    }

    // هنا فانكشن بتعمل تسجيل خروج 
    public function signOut(Request $request)
    {
        $this->userRepository->sign_out($request);
        return redirect('/mas');
    }

    //هنا بقى لو عايزاه بعد ما خلاص اكد الاوردر وخلص يمسح بيانات الطلب 
    public function deleteallOrders(Request $request)
    {
        $this->userRepository->Confirm_order($request);
        return redirect('/mas');
    }

    public function deleteOrder(Request $request)
    {
        $products = $this->userRepository->delete_order($request);
        return redirect('/mas');
    }
}
