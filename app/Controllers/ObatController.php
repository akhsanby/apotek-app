<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ObatController extends BaseController
{
	public function index()
	{
		// // jika tidak ada session username kembalikan ke halaman /login
		// if (!session()->has('username')) return redirect()->to('/');

		return view('/data/obat/index', [
			'title' => 'Daftar Data obat',
			'subtitle' => 'Daftar Data Obat',
			'username' => session()->get('username'),
			'obat' => $this->obatModel->getObat()
		]);	
	}

	public function new()
	{
		return view('/data/obat/new', [
			'title' => 'Data obat',
			'subtitle' => 'Tambah Data Obat',
			'username' => session()->get('username'),
			'obat' => $this->obatModel->getObat(),
			'suplier' => $this->suplierModel->getSuplier(),
			'validation' => $this->validation
		]);
	}

	public function create()
	{
		if (!$this->validate([
			'kode_suplier'  => 'required|integer',
			'nama_obat'     => 'required',
			'produsen' 		=> 'required',
			'harga' 		=> 'required|integer',
			'jml_stok' 		=> 'required|integer',
			'icon' 			=> 'max_size[icon,1024]|is_image[icon]'
		])) {
			return redirect()->to("/obat/new")->withInput();
		}

		// ambil icon pada form
		$icon = $this->request->getFile('icon');

		// jika tidak ada foto yang diupload
		if ($icon->getError() == 4) {
			$namaIcon = 'default.png';	
		} else {
			// generate nama random
			$namaIcon = $icon->getRandomName();
			// pindahkan gambar ke folder /img/obat
			$icon->move('img/obat/', $namaIcon);
		}

		$data = $this->request->getPost();
		$data['icon'] = $namaIcon;

		$this->obatModel->save($data);
		return redirect()->to('/obat')->withInput()->with('created', 'Berhasil ditambahkan!');
	}

	public function edit($kode_obat)
	{
		$suplier = $this->suplierModel->getSuplier();
		foreach ($suplier as $suplier) {
			$kode_suplier[$suplier['kode_suplier']] = $suplier['kode_suplier'];
		}

		return view('/data/obat/edit', [
			'title' => 'Data obat',
			'subtitle' => 'Edit Data Obat',
			'username' => session()->get('username'),
			'obat' => $this->obatModel->getObat($kode_obat),
			'kode_suplier' => $kode_suplier,
			'validation' => $this->validation
		]);
	}

	public function update($kode_obat)
	{ 
		if (!$this->validate([
			'kode_suplier'  => 'required',
			'nama_obat'     => 'required',
			'produsen' 		=> 'required',
			'harga' 		=> 'required|integer',
			'jml_stok' 		=> 'required|integer',
			'icon' 			=> 'max_size[icon,1024]|is_image[icon]'
		])) {
			return redirect()->to("/obat/edit/" . $kode_obat)->withInput();
		}

		$icon = $this->request->getFile('icon');
		$iconLama = $this->obatModel->find($kode_obat);

		// jika icon tidak di ganti
		if ($icon->getError() === 4) {
			$namaIcon = $iconLama['icon'];
		} else {
			// generate icon nama random
			$namaIcon = $icon->getRandomName();
			// pindahkan gambar ke folder /img/obat
			$icon->move('img/obat/', $namaIcon);
			// // hapus icon lama 
			if ($iconLama['icon'] !== 'default.png') unlink('img/obat/' . $iconLama['icon']);
		}

		$data = $this->request->getPost();
		$data['kode_obat'] = $kode_obat;
		$data['icon'] = $namaIcon;
	
		$this->obatModel->save($data);
		return redirect()->to('/obat')->withInput()->with('updated', 'Berhasil diubah!');
	}

	public function delete($kode_obat)
	{
		$obat = $this->obatModel->find($kode_obat);	

		// cek jika icon adalah default.png
		if ($obat['icon'] !== 'default.png') unlink('img/obat/' . $obat['icon']);

		$this->obatModel->delete($kode_obat);
		return redirect()->to('/obat')->with('deleted', 'Berhasil dihapus!');
	}
}
