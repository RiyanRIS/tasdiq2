<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Auth extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function login()
	{
		if (session()->islogin) {
			return redirect()->to(site_url("admin"));
		}

		$username = '';

		$this->validation->setRule('username', "Username", 'required');
		$this->validation->setRule('password', "Password", 'required');
		if ($this->request->getPost() && $this->validation->withRequest($this->request)->run()) {
			$username =  (string)$this->request->getVar('username');
			$password =  (string)$this->request->getVar('password');

			if ($this->auth->login($username, $password)) {
				$data_user = $this->admin->getByUsername($username);
				if (session()->isAdmin) {
					return redirect()->to(site_url("admin"))->with('msg', [1, "Selamat datang, " . $data_user->nama]);
				} else {
					return redirect()->to(site_url())->with('msg', [1, "Selamat datang, " . $data_user->nama_lengkap]);
				}
			} else {
				$ses = [0, "Kombinasi username dan password belum tepat"];
				session()->setFlashdata(['msg' => $ses]);
			}
		}
		$data = [
			'err' => $this->validation->getErrors(),
			'username' => (@$username ?: '')
		];
		return view("admin/auth/login", $data);
	}

	public function logout()
	{
		$this->auth->logout(session()->user_id);
		return redirect()->to(site_url('admin/login'))->with('msg', [1, "Berhasil Logout"]);
	}
}
