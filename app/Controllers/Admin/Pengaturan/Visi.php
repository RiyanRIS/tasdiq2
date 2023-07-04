<?php

namespace App\Controllers\Admin\Pengaturan;

use App\Controllers\BaseController;

class Visi extends BaseController
{
  public function index()
  {
    if (!$this->isSecure()) return redirect()->to(site_url('/admin/login'))->with('msg', [0, 'Sesi anda telah kadaluarsa.']);

    $data = [
      "info" => $this->info->find(1),
      "judul" => "Pengaturan Visi & Misi"
    ];

    return view('admin/pengaturan/visi/index', $data);
  }

  public function tambah()
  {
    if (!$this->isSecure()) return redirect()->to(site_url('/admin/login'))->with('msg', [0, 'Sesi anda telah kadaluarsa.']);

    // Cek isian ngga boleh kosong
    $rules = [
      'visi' => [
        'label'  => 'Visi',
        'rules'  => 'required',
        'errors' => [],
      ],
      'misi' => [
        'label'  => 'Misi',
        'rules'  => 'required',
        'errors' => [],
      ]
    ];
    $this->validation->setRules($rules);

    if ($this->request->getPost() && $this->validation->withRequest($this->request)->run()) {
      $additionalData = $this->request->getPost();

      $lastid = $this->info->update(['id_info' => 1], $additionalData);

      if ($lastid) {
        $msg = [
          'status' => true,
          'url' => site_url("admin/pengaturan/visi"),
        ];
      } else {
        $msg = [
          'status' => false,
          'url' => site_url("admin/pengaturan/visi"),
          'pesan'     => 'Data gagal dirubah',
        ];
      }
    } else {
      $msg = [
        'status' => false,
        'errors' => $this->validation->getErrors(),
      ];
    }
    echo json_encode($msg);
    die();
  }
}
