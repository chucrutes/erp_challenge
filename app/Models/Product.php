<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model {
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['name', 'description', 'price'];
    
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';





    // Define relationships if needed
    public function category() {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
