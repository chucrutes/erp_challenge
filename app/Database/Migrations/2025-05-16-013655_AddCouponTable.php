<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCouponTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'discount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'start_date' => [
                'type' => 'DATETIME',
            ],
            'end_date' => [
                'type' => 'DATETIME',
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('coupons');
    }

    public function down()
    {
        $this->forge->dropTable('coupons');
    }
}
