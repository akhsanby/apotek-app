<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
	protected $table                = 'obat';
	protected $primaryKey           = 'kode_obat';
	protected $useAutoIncrement 	= true;
	protected $protectFields        = true;
	protected $allowedFields        = ['kode_obat', 'kode_suplier', 'nama_obat', 'produsen', 'harga', 'jml_stok', 'icon'];

	public function getObat($kode_obat = false)
	{
		if ($kode_obat === false) return $this->findAll();
		return $this->where(['kode_obat' => $kode_obat])->first();
	}
}
