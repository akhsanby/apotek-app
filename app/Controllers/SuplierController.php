<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuplierModel;

class SuplierController extends BaseController
{
	public function index()
	{
		return view('/data/suplier/index', [
			'title' 	=> 'Data Suplier',
			'subtitle' 	=> 'Daftar Data Suplier',
			'username' 	=> session()->get('username'),
			'suplier' 	=> $this->suplierModel->getSuplier()
		]);	
	}

	public function new()
	{
		return view('/data/suplier/new', [
			'title' 		=> 'Data Suplier',
			'subtitle'		=> 'Tambah Data Suplier',
			'username'		=> session()->get('username'),
			'validation'	=> $this->validation
		]);
	}

	public function create()
	{
		if (!$this->validate([
			'nama_suplier'  => 'required',
			'alamat' 		=> 'required',
			'kota' 			=> 'required',
			'telp' 			=> 'required|integer'
		])) {
			return redirect()->to("/suplier/new")->withInput();
		}

		$this->suplierModel->save($this->request->getPost());

		return redirect()->to('/suplier')->withInput()->with('created', 'Berhasil ditambahkan!');
	}

	public function edit($kode_suplier)
	{
		return view('/data/suplier/edit', [
			'title' 		=> 'Data Suplier',
			'subtitle' 		=> 'Edit Data Suplier',
			'username' 		=> session()->get('username'),
			'validation'	=> $this->validation,
			'suplier' 		=> $this->suplierModel->getSuplier($kode_suplier)
		]);
	}

	public function update($kode_suplier)
	{
		if (!$this->validate([
			'nama_suplier'  => 'required',
			'alamat' 		=> 'required',
			'kota' 			=> 'required',
			'telp' 			=> 'required|integer'
		])) {
			return redirect()->to("/suplier/edit/" . $kode_suplier)->withInput();
		}

		$data = $this->request->getPost();
		$data['kode_suplier'] = $kode_suplier; 

		$this->suplierModel->save($data);

		return redirect()->to('/suplier')->withInput()->with('updated', 'Berhasil diedit!');
	}

	public function delete($kode_suplier)
	{
		$this->suplierModel->delete($kode_suplier);

		return redirect()->to('/suplier')->with('deleted', 'Berhasil dihapus!');
	}
}
