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
	}
}
