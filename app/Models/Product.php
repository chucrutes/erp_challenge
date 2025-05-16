<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model {
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['name', 'price'];
    
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[255]',
        'price' => 'required|decimal'
    ];
    
    protected $validationMessages = [
        'name' => [
            'required' => 'Nome do produto é obrigatório',
            'min_length' => 'O produto deve ter pelo menos 3 caracteres',
            'max_length' => 'O produto deve ter no máximo 255 caracteres'
        ],
        'price' => [
            'required' => 'Preço do produto é obrigatório',
            'decimal' => 'Price do produto deve ser um número'
        ]
    ];



    // Define relationships if needed
    public function category() {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
