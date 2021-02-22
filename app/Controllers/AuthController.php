<?php

namespace App\Controllers;

use App\Models\UsersModel;

class AuthController extends BaseController
{
	public function login()
	{
		return view('auth/login', [
			'title' => "Login",
			'validation' => $this->validation
		]);
	}

	public function register()
	{
		return view('auth/register', [
			'title' => "Register",
			'validation' => $this->validation
		]);
	}

	public function loged()
	{
		if (!$this->validate([
			'username' => 'required|trim',
			'password' => 'required|trim'
		])) {
			return redirect()->to('/login')->withInput();
		};

		$username = $this->request->getVar('username', FILTER_SANITIZE_STRING);
		$password = md5($this->request->getVar('password', FILTER_SANITIZE_STRING));
		
		return $this->usersModel->findUser($username, $password);
	}

	public function registered()
	{	
		if (!$this->validate([
			'username' => 'required|is_unique[users.username]',
			'password' => 'required|min_length[3]|matches[password1]',
			'password1' => 'required|matches[password]',
		])) {
			return redirect()->to("/register")->withInput();
		}

		return $this->usersModel->register();
	}

	public function logout()
	{
		session()->remove('id_user');
		session()->remove('username');
		session()->setFlashdata('logout', 'Berhasil logout!');

		return redirect()->to('/');
	}
}
