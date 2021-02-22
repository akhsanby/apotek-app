<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ObatMigration extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'kode_obat' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'kode_suplier' => [
                'type' => 'INT',
            ],
            'nama_obat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'produsen' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'harga' => [
                'type' => 'INT',
            ],
            'jml_stok' => [
                'type' => 'INT',
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('kode_obat', true);
        $this->forge->createTable('obat');
	}

	public function down()
	{
		 $this->forge->dropTable('obat');
	}
}
