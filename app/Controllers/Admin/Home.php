<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        if (!$this->isSecure()) return redirect()->to(site_url('/admin/login'));

        $data = [
            "judul" => "Dashboard"
        ];

        return view('admin/home/index', $data);
    }
}
