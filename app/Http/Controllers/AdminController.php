<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use App\Http\Interfaces\AdminRepositoryInterface;

class AdminController
{
    private $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function storeProducts(Request $request)
    {
        $products = $this->adminRepository->create_product($request);
        //ببعته لصفحة المنيو بحيث يشوف اللي ضافه 
        return view('user.menu', compact('products'));
    }

    public function updateProducts(Request $request)
    {
        $products = $this->adminRepository->update_product($request);

        return view('user.menu', compact('products'));
    }

    public function getDataOfProduct(Request $request)
    {
        $products = $this->adminRepository->data_product($request);

        return view('user.update_product', compact('products'));
    }

    public function deleteProduct(Request $request)
    {
        $products = $this->adminRepository->delete_product($request);

        return view('user.menu', compact('products'));
    }
}
