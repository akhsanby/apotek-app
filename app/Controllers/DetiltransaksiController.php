<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DetiltransaksiController extends BaseController
{
	public function index()
	{
		return view('/data/detil_transaksi/index', [
			'title' => 'Data Detil Transaksi',
			'subtitle' => 'Daftar Detil Transaksi',
			'username' => session()->get('username'),
			'detil' => $this->detilTransaksiModel->getDetilTransaksi()
		]);
	}

	public function show($kode_detil)
	{
		return view('/data/detil_transaksi/show', [
			'title' => 'Data Detil Transaksi',
			'subtitle' => 'Detil Transaksi',
			'username' => session()->get('username'),
			'detil' => $this->detilTransaksiModel->getDetilTransaksi($kode_detil)
		]);
	}

	public function new()
	{
		return view('/data/detil_transaksi/new', [
			'title' => 'Data Detil Transaksi',
			'subtitle' => 'Tambah Detil Transaksi',
			'username' => session()->get('username'),
			'validation' => $this->validation,
			'detil' => $this->detilTransaksiModel->getDetilTransaksi(),
			'obat' => $this->obatModel->getObat(),
			'transaksi' => $this->transaksiModel->getTransaksi()
		]);
	}

	public function create()
	{
		if (!$this->validate([
			'kode_transaksi' => 'required',
			'kode_obat' => 'required',
			'sub_total' => 'required|integer',
			'total' => 'required'
		])) {
			return redirect()->to('/detil/new')->withInput();
		}

		$this->detilTransaksiModel->save($this->request->getPost());

		return redirect()->to('/detil')->with('created', 'Berhasil ditambahkan!');
	}

	public function edit($kode_detil)
	{

		return view('/data/detil_transaksi/edit', [
			'title' => 'Data Detil Transaksi',
			'subtitle' => 'Edit Detil Transaksi',
			'username' => session()->get('username'),
			'validation' => $this->validation,
			'detil' => $this->detilTransaksiModel->getDetilTransaksi($kode_detil),
			'obat' => $this->obatModel->getObat(),
			'transaksi' => $this->transaksiModel->getTransaksi()
		]);
	}

	public function update($kode_detil)
	{
		if (!$this->validate([
			'kode_transaksi' => 'required',
			'kode_obat' => 'required',
			'sub_total' => 'required|integer',
			'total' => 'required'
		])) {
			return redirect()->to('/detil/edit/' . $kode_detil)->withInput();
		}

		$data = $this->request->getPost();
		$data['kode_detil'] = $kode_detil;

		$this->detilTransaksiModel->save($data);

		return redirect()->to('/detil')->with('updated', 'Berhasil diubah!');
	}

	public function delete($kode_detil)
	{
		$this->detilTransaksiModel->delete($kode_detil);

		return redirect()->to('/detil')->with('deleted', 'Berhasil dihapus!');
	}
}
