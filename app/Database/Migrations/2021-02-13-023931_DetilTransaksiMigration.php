<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetilTransaksiMigration extends Migration
{
	public function up()
	{
        $this->db->disableForeignKeyChecks();
		$this->forge->addField([
            'kode_detil' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'kode_transaksi' => [
                'type' => 'INT',
            ],
            'kode_obat' => [
                'type' => 'INT',
            ],
            'sub_total' => [
                'type' => 'INT',
            ],
            'total' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addKey('kode_detil', true);
        $this->forge->addForeignKey('kode_transaksi','transaksi','kode_transaksi','CASCADE','CASCADE');
        $this->forge->addForeignKey('kode_obat','obat','kode_obat');
        $this->forge->createTable('detil_transaksi');
        $this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		 $this->forge->dropTable('detil_transaksi');
	}
}
