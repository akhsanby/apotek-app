<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TransaksiController extends BaseController
{
	public function index()
	{
		return view('/data/transaksi/index', [
			'title' => 'Data Transaksi',
			'subtitle' => 'Daftar Data Transaksi',
			'username' => session()->get('username'),
			'transaksi' => $this->transaksiModel->getTransaksi()
		]);
	}

	public function new()
	{
		return view('/data/transaksi/new', [
			'title' => 'Daftar Data Transaksi',
			'subtitle' => 'Tambah Data Transaksi',
			'username' => session()->get('username'),
			'obat' => $this->obatModel->getObat(),
			'validation' => $this->validation
		]);
	}

	public function create()
	{	
		if (!$this->validate([
			'tgl_transaksi' => 'required',
			'nama_pembeli' => 'required'
		])) {
			return redirect()->to('/transaksi/new')->withInput();
		}

		$data = $this->request->getPost();
		$data['id_user'] = session()->get('id_user');

		$this->transaksiModel->insert($data);

		return redirect()->to('/transaksi')->withInput()->with('created', 'Berhasil ditambahkan!');
	}

	public function delete($kode_transaksi)
	{
		$this->transaksiModel->delete($kode_transaksi);

		return redirect()->to('/transaksi')->with('deleted', 'Berhasil dihapus!');
	}
}
