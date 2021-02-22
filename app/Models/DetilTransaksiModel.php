<?php

namespace App\Models;

use CodeIgniter\Model;

class DetilTransaksiModel extends Model
{
	protected $table                = 'detil_transaksi';
	protected $primaryKey           = 'kode_detil';
	protected $protectFields        = true;
	protected $allowedFields        = ['kode_detil', 'kode_transaksi', 'kode_obat', 'sub_total', 'total'];

	public function getDetilTransaksi($kode_detil = false)
	{
		if ($kode_detil === false) {
			return $this->db->table('detil_transaksi')
			->join('transaksi', 'transaksi.kode_transaksi = detil_transaksi.kode_transaksi')
			->join('obat', 'obat.kode_obat = detil_transaksi.kode_obat')
			->get()->getResultArray();
		} else {
			return $this->db->table('detil_transaksi')
			->join('transaksi', 'transaksi.kode_transaksi = detil_transaksi.kode_transaksi')
			->join('obat', 'obat.kode_obat = detil_transaksi.kode_obat')
			->getWhere(['kode_detil' => $kode_detil])->getResultArray();
		}

	}
}
