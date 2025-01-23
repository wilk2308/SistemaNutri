<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEmployeeIdToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'employee_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'after'      => 'id', // Coloque na posição desejada
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'employee_id');
    }
}
