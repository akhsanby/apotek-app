<?php

namespace App\Models;

use CodeIgniter\Model;

class SuplierModel extends Model
{
	protected $table                = 'suplier';
	protected $primaryKey           = 'kode_suplier';
	protected $useAutoIncrement 	= true;
	protected $protectFields        = true;
	protected $allowedFields        = ['kode_suplier', 'nama_suplier', 'alamat', 'kota', 'telp'];

	public function getSuplier($kode_suplier = false)
	{
		if ($kode_suplier === false) return $this->findAll();
		return $this->where(['kode_suplier' => $kode_suplier])->first();
	}
}
