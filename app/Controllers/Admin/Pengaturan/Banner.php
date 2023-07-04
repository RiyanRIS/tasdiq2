<?php

namespace App\Controllers\Admin\Pengaturan;

use App\Controllers\BaseController;

class Banner extends BaseController
{
  public function index()
  {
    if (!$this->isSecure()) return redirect()->to(site_url('/admin/login'))->with('msg', [0, 'Sesi anda telah kadaluarsa.']);

    $data = [
      "banner" => $this->banner->find(),
      "judul" => "Pengaturan Banner"
    ];

    return view('admin/pengaturan/banner/index', $data);
  }

  public function tambah()
  {
    if (!$this->isSecure()) return redirect()->to(site_url('/admin/login'))->with('msg', [0, 'Sesi anda telah kadaluarsa.']);

    // Cek isian ngga boleh kosong
    $rules = [
      'nama' => [
        'label'  => 'Nama',
        'rules'  => 'required',
        'errors' => [],
      ]
    ];
    $this->validation->setRules($rules);

    if ($this->request->getPost() && $this->validation->withRequest($this->request)->run()) {
      $additionalData = [];

      $file = $this->request->getFile('file');
      $newName = $file->getRandomName();
      $path = ROOTPATH . 'public/uploads/banner/';
      $file->move($path, $newName);

      $this->resizeImage($path . '/' . $newName, 1280, 718);

      // $id = $this->request->getPost('id');

      $additionalData['file'] = $newName;
      $additionalData['nama'] = $this->request->getPost('nama');

      $lastid = $this->banner->simpan($additionalData);

      if ($lastid) {
        $msg = [
          'status' => true,
          'url' => site_url("admin/pengaturan/banner"),
        ];
      } else {
        $msg = [
          'status' => false,
          'url' => site_url("admin/pengaturan/banner"),
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

  public function hapus(string $id)
  {
    if (!$this->isSecure()) return redirect()->to(site_url('/admin/login'))->with('msg', [0, 'Sesi anda telah kadaluarsa.']);

    $data = $this->banner->find($id);

    $path = ROOTPATH . 'public/uploads/banner/' . $data->file;

    if (file_exists($path)) {
      unlink($path);
    }
    $hapus = $this->banner->delete($id);

    $msg = ($hapus ? [1, "Berhasil menghapus data"] : [0, "Gagal menghapus data"]);

    return redirect()->to(site_url('admin/pengaturan/banner'))->with('msg', $msg);
  }
}
