<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function login()
	{
		// print_r(session()->isLogin);
		// die();
		if (session()->isLogin) {
			return redirect()->to(site_url());
		}

		$username = '';

		$this->validation->setRule('username', "Username", 'required');
		$this->validation->setRule('password', "Password", 'required');
		if ($this->request->getPost() && $this->validation->withRequest($this->request)->run()) {
			$username =  (string)$this->request->getVar('username');
			$password =  (string)$this->request->getVar('password');

			if ($this->auth->login_user($username, $password)) {
				$data_user = $this->anggota->getByUsername($username);
				return redirect()->to(site_url())->with('msg', [1, "Selamat datang, " . $data_user->nama]);
			} else {
				$ses = [0, "Kombinasi username dan password belum tepat"];
				session()->setFlashdata(['msg' => $ses]);
			}
		}
		$data = [
			'err' => $this->validation->getErrors(),
			'username' => (@$username ?: '')
		];
		return view("login", $data);
	}

	public function daftar()
	{
		$this->validation->setRules($this->anggota->rules_tambah_ubah);
		if ($this->request->getPost() && $this->validation->withRequest($this->request)->run()) {
			// inisialisasi data yang akan dimasukkan ke database
			$additionalData = $this->request->getPost();

			$additionalData['password'] =  password_hash($additionalData['password'], PASSWORD_DEFAULT);

			// Cek Valid Username
			$isValidUsername = $this->anggota->isValidUsername($additionalData['username']);
			if (!$isValidUsername) {
				$data = [
					'post' => $this->request->getPost(),
					'err' => ['username' => "Username telah digunakan"]
				];
				session()->setFlashdata('msg', [0, "Username telah digunakan"]);

				return view('daftar', $data);
			}

			// Input ke database
			$lastid = $this->anggota->simpan($additionalData);

			if ($lastid) // Kondisi berhasil menambah data
			{
				return redirect()->to(site_url("login"))->with('msg', [1, "Berhasil Mendaftar"]);
			} else { // kondisi gagal
				return redirect()->to(site_url("daftar"))->with('msg', [1, "Gagal Mendaftar"]);
			}
		} else { // kondisi validasi error
			$data = [
				'post' => $this->request->getPost(),
				'err' => $this->validation->getErrors()
			];
			if ($this->validation->getErrors()) {
				session()->setFlashdata('msg', [0, "Isian belum lengkap"]);
			}
			return view('daftar', $data);
		}

		// return view('auth/daftar');
	}

	public function logout()
	{
		$this->auth->logout();
		return redirect()->to(site_url())->with('msg', [1, "Berhasil Logout"]);
	}
}
