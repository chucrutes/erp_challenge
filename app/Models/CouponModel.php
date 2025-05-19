<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class CouponModel extends Model
{
    protected $table      = 'coupons';
    protected $primaryKey = 'coupon_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['product_id', 'discount', 'start_date', 'end_date'];

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'product_id' => 'required|integer|is_not_unique[products.product_id]',
        'discount'   => 'required|decimal|greater_than[0]|less_than_equal_to[100]',
        'start_date' => 'required|valid_date',
        'end_date'   => 'required|valid_date',
    ];
    protected $validationMessages = [
        'product_id' => [
            'required'     => 'O ID do produto é obrigatório.',
            'integer'      => 'O ID do produto deve ser um número inteiro.',
            'is_not_unique' => 'O ID do produto informado não existe.',
        ],
        'discount' => [
            'required'         => 'O desconto é obrigatório.',
            'decimal'          => 'O desconto deve ser um número decimal.',
            'greater_than'     => 'O desconto deve ser maior que zero.',
            'less_than_equal_to' => 'O desconto não pode ser maior que 100.',
        ],
        'start_date' => [
            'required'   => 'A data de início é obrigatória.',
            'valid_date' => 'A data de início deve ser uma data válida.',
        ],
        'end_date' => [
            'required'   => 'A data de término é obrigatória.',
            'valid_date' => 'A data de término deve ser uma data válida.'
        ],
    ];

    public function withProduct()
    {
        return $this->join('products', 'products.product_id = coupons.product_id', 'left');
    }

    public function create(array $data): int
    {

        if ($this->validate($data) === false) {
            throw new Exception('Ocorreram os seguintes erros: ' . implode(', ', $this->errors()));
        }

        return $this->insert($data);
    }
}
