<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\OrderModel;
use Exception;

class OrderController extends BaseController
{
    public function index(): string
    {
        $productModel = new ProductModel();
        $products = $productModel->withCoupons()->findAll();
        print_r($products);


        $data = [
            'products' => $products,
        ];

        return view('orders/list', $data);
    }

    public function insert()
    {

        try {
            $data = $this->request->getPost();

            $orderModel = new OrderModel();
            $orderModel->create($data);

            session()->setFlashdata('success', 'Pedido cadastrado com sucesso');
        } catch (Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
        } finally {
            return redirect()->to('');
        }
    }
}
