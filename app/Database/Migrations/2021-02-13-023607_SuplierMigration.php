<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuplierMigration extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'kode_suplier' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nama_suplier' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'kota' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'telp' => [
                'type' => 'INT'
            ]
        ]);
        $this->forge->addKey('kode_suplier', true);
        $this->forge->createTable('suplier');
	}

	public function down()
	{
		 $this->forge->dropTable('suplier');
	}
}
