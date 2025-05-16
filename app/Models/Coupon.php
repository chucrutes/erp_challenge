<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
    protected $table      = 'coupons';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'product_id',
        'quantity',
        'total',
    ];

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [
        'product_id' => 'required|is_natural_no_zero|is_unique[stocks.product_id]',
        'quantity'    => 'required|numeric|greater_than_equal_to[0]',
    ];
    protected $validationMessages = [
        'product_id' => [
            'required'            => 'Id do produto é obrigatório.',
            'is_natural_no_zero'  => 'Produto inválido.',
            'is_unique'          => 'Um produto pode estar associado a apenas um estoque.',
        ],
        'quantity' => [
            'required'            => 'A quantidade é obrigatória.',
            'numeric'             => 'Quantiade inválida.',
            'greater_than_equal_to' => 'Quantidade deve ser maior ou igual a zero.',
        ],
    ];

    public function withProduct()
    {
        return $this->join('products', 'products.id = coupons.product_id', 'left');
    }
}
