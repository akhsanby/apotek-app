<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
	protected $table                = 'transaksi';
	protected $primaryKey           = 'kode_transaksi';
	protected $useAutoIncrement 	= true;
	protected $protectFields        = true;
	protected $allowedFields        = ['kode_transaksi', 'id_user', 'nama_pembeli', 'tgl_transaksi'];

	public function getTransaksi()
	{
		return $this->db->table('transaksi')->join('users', 'users.id_user = transaksi.id_user')->get()->getResultArray();
	}
}
