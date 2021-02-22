<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $protectFields        = true;
	protected $allowedFields        = ['id_user', 'username', 'password'];

	public function findUser($username, $password)
	{
		$user = $this->where(['username' => $username, 'password' => $password])->first();

		if ($user) {
			session()->set([
				'id_user' => $user['id_user'],
				'username' => $user['username']
			]);
			return redirect()->to('/home');
		} else {
			return redirect()->to('/')->withInput()->with('kesalahan', 'Email/password salah!');
		}
	}

	public function register()
	{
		$request = \Config\Services::request();

		$data = [
			'username' => $request->getVar('username', FILTER_SANITIZE_STRING),
			'password' => md5($request->getVar('password', FILTER_SANITIZE_STRING))
		];

		$this->insert($data);
		return redirect()->to("/login")->withInput()->with('pesan', 'Berhasil didaftarkan!');
	}
}
