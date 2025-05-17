<?php

namespace App\Controllers;
use App\Models\ProductModel;

class Products extends BaseController
{
    public function index(): string
    {
        return view('products/list');
    }

    public function get(int $id): string {
        echo $id;
        return view('products');
    }
    public function create(array $data): void
    {
        $productModel = new ProductModel();
        try {
            $productModel->create($data);
            echo 'Produto criado com sucesso';
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }
}
