<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use AdminInterface;
use RestoController;
use App\Http\Interfaces\AdminRepositoryInterface;
class AdminController
{
    private $adminRepository;
  
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    } 
    public function storeProducts(Request $request){
        $products=$this->adminRepository->create_product($request); 
        //ببعته لصفحة المنيو بحيث يشوف اللي ضافه 
        return view('user.menu',compact('products') );
    }
}
