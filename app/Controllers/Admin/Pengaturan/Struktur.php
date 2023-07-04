<?php

namespace App\Controllers\Admin\Pengaturan;

use App\Controllers\BaseController;

class Struktur extends BaseController
{
  public function index()
  {
    if (!$this->isSecure()) return redirect()->to(site_url('/admin/login'))->with('msg', [0, 'Sesi anda telah kadaluarsa.']);

    $data = [
      "struktur" => $this->struktur->find(),
      "judul" => "Pengaturan Struktur Pengurus"
    ];

    return view('admin/pengaturan/struktur/index', $data);
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
      ],
      'jabatan' => [
        'label'  => 'Jabatan',
        'rules'  => 'required',
        'errors' => [],
      ]
    ];
    $this->validation->setRules($rules);

    if ($this->request->getPost() && $this->validation->withRequest($this->request)->run()) {
      $additionalData = [];

      $file = $this->request->getFile('file');
      $newName = $file->getRandomName();
      $path = ROOTPATH . 'public/uploads/struktur/';
      $file->move($path, $newName);

      $this->resizeImage($path . '/' . $newName, 280, 370);

      // $id = $this->request->getPost('id');

      $additionalData['file'] = $newName;
      $additionalData['nama'] = $this->request->getPost('nama');
      $additionalData['jabatan'] = $this->request->getPost('jabatan');

      $lastid = $this->struktur->simpan($additionalData);

      if ($lastid) {
        $msg = [
          'status' => true,
          'url' => site_url("admin/pengaturan/struktur"),
        ];
      } else {
        $msg = [
          'status' => false,
          'url' => site_url("admin/pengaturan/struktur"),
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

    $data = $this->struktur->find($id);

    $path = ROOTPATH . 'public/uploads/struktur/' . $data->file;

    if (file_exists($path)) {
      unlink($path);
    }
    $hapus = $this->struktur->delete($id);

    $msg = ($hapus ? [1, "Berhasil menghapus data"] : [0, "Gagal menghapus data"]);

    return redirect()->to(site_url('admin/pengaturan/struktur'))->with('msg', $msg);
  }
}
