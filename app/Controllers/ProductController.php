<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Exception;

class ProductController extends BaseController
{
    public function index(): string
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        $data = [
            'products' => $products,
        ];

        return view('products/list', $data);
    }

    public function get(int $id): string
    {
        echo $id;
        return view('products');
    }

    public function insert()
    {

        try {
            $data = $this->request->getPost();

            $productModel = new ProductModel();
            $productModel->create($data);

            session()->setFlashdata('success', 'Produto cadastrado com sucesso');
        } catch (Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
        } finally {
            return redirect()->to('');
        }
    }
    public function delete($id)
    {

        try {

            $productModel = new ProductModel();
            $productModel->delete($id);

            session()->setFlashdata('success', $id);
        } catch (Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
        } finally {
            return redirect()->to('');
        }
    }
}
