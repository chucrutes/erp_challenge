<?php

namespace App\Controllers;

use Exception;
use App\Models\CouponModel;
use App\Models\ProductModel;

class CouponController extends BaseController
{
    public function index(): string
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();
        $couponModel = new CouponModel();
        $coupons = $couponModel->withProduct()->findAll();

        $data = [
            'products' => $products,
            'coupons' => $coupons,
        ];

        return view('coupons/list', $data);
    }

    public function insert()
    {

        try {
            $data = $this->request->getPost();
            print_r($data);
            $couponModel = new CouponModel();
            $couponModel->create($data);

            session()->setFlashdata('success', 'Cupom cadastrado com sucesso');
        } catch (Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
        } finally {
            return redirect()->to('/coupons');
        }
    }
}
