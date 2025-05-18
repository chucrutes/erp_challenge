<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'orders';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'product_id',
        'coupon_id',
        'quantity',
        'total',
        'shipping_address',
        'payment_status',
    ];

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [
        'product_id'      => 'required|is_natural_no_zero',
        'coupon_id'       => 'permit_empty|is_natural_no_zero',
        'quantity'        => 'required|numeric|greater_than[0]',
        'total'           => 'required|numeric|greater_than_equal_to[0]',
        'shipping_address' => 'required|string|min_length[5]',
        'payment_status'  => 'required|in_list[pending,completed,failed]',
    ];

    protected $validationMessages = [
        'product_id' => [
            'required'            => 'Id do produto é obrigatório.',
            'is_natural_no_zero'  => 'Produto inválido.',
        ],
        'coupon_id' => [
            'is_natural_no_zero'  => 'Cupom inválido.',
        ],
        'quantity' => [
            'required'            => 'A quantidade é obrigatória.',
            'numeric'             => 'Quantidade inválida.',
            'greater_than'      => 'Quantidade deve ser maior ou igual a zero.',
        ],
        'total' => [
            'required'            => 'É necessário informar o valor total.',
            'numeric'             => 'Total inválido',
            'greater_than_equal_to' => 'O total deve ser maior ou igual a zero.',
        ],
        'shipping_address' => [
            'required'            => 'O endereço para entrega é obrigatório.',
            'string'              => 'O endereço inválido.',
            'min_length'          => 'O endereço deve ter pelo menos 5 caracteres.',
        ],
        'payment_status' => [
            'required'            => 'É necessário informar um método de pagamento.',
            'in_list'             => 'Status de pagamento inválido.',
        ],
    ];

    public function calculateShippingCost(float $subtotal): float
    {
        if ($subtotal >= 52.00 && $subtotal <= 166.59) {
            return 15.00;
        }

        if ($subtotal > 200.00) {
            return 0;
        }

        return 20;
    }

    public function withCoupon()
    {
        return $this->join('coupons', 'coupons.id = orders.coupon_id', 'left');
    }

    public function withProduct()
    {
        return $this->join('products', 'products.id = orders.product_id', 'inner');
    }
}
