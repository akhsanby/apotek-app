<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiMigration extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'kode_transaksi' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
            ],
            'nama_pembeli' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tgl_transaksi' => [
                'type' => 'DATE',
            ],
        ]);
        $this->forge->addKey('kode_transaksi', true);
        $this->forge->addForeignKey('id_user','users','id_user');
        $this->forge->createTable('transaksi');
	}

	public function down()
	{
		$this->forge->dropTable('transaksi');
	}
}
