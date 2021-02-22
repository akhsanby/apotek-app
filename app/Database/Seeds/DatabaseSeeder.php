<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->db->table('users')->insert([
			'username'	=> 'admin',
			'password' 	=> md5("admin")
		]);

		for ($i=0; $i < 10; $i++) { 
			$this->db->table('suplier')->insert([
				'nama_suplier'	=> static::faker()->word,
				'alamat' 		=> static::faker()->address,
				'kota' 			=> static::faker()->city,
				'telp' 			=> static::faker()->phoneNumber,
			]);
		}

		for ($i = 0; $i < 10; $i++) {
			$this->db->table('obat')->insert([
				'kode_suplier' => static::faker()->numberBetween(1, 10),
				'nama_obat' => static::faker()->word,
				'produsen' => static::faker()->company,
				'harga' => static::faker()->numberBetween(1, 10) * 1000,
				'jml_stok' => static::faker()->numberBetween(1, 10) * 100,
				'icon' => 'default.png'
			]);
		}

		for ($i = 0; $i < 10; $i++) {
			$this->db->table('transaksi')->insert([
		        'id_user' => 1, // admin
		        'nama_pembeli' => static::faker()->word,
		        'tgl_transaksi' => static::faker()->dateTime()->format('Y-m-d'),
		    ]);
		}

		for ($i = 0; $i < 10; $i++) {
			$this->db->table('detil_transaksi')->insert([
		        'kode_transaksi' => static::faker()->numberBetween(1, 10),
		        'kode_obat' => static::faker()->numberBetween(1, 10),
		        'sub_total' => static::faker()->numberBetween(2, 10),
		        'total' => static::faker()->numberBetween(2, 10) * 1000,
		    ]);
		}
	}
}
