<?php

namespace App\Controllers;

class HomeController extends BaseController
{
	public function index()
	{
		return view('/home/index', [
			'title' => 'Home',
			'subtitle' => 'Home',
			'username' => session()->get('username'),
			'totalObat' => $this->obatModel->countAll(),
			'totalSuplier' => $this->suplierModel->countAll(),
			'totalTransaksi' => $this->transaksiModel->countAll(),
			'totalUsers' => $this->usersModel->countAll(),
			'totalDetilTransaksi' => $this->detilTransaksiModel->countAll()
		]);
	}
}
