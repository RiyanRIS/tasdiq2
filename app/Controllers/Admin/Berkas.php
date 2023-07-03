<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Berkas extends BaseController
{
    public function index()
    {
        if (!$this->isSecure()) return redirect()->to(site_url('/admin/login'))->with('msg', [0, 'Sesi anda telah kadaluarsa.']);

        $data = [
            "berkas" => $this->berkas->find(),
            "judul" => "Berkas"
        ];

        return view('admin/berkas/index', $data);
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
            $file->move(ROOTPATH . 'public/uploads/berkas/', $newName);

            // $id = $this->request->getPost('id');

            $additionalData['file'] = $newName;
            $additionalData['nama'] = $this->request->getPost('nama');

            $lastid = $this->berkas->simpan($additionalData);

            if ($lastid) {
                $msg = [
                    'status' => true,
                    'url' => site_url("admin/berkas"),
                ];
            } else {
                $msg = [
                    'status' => false,
                    'url' => site_url("admin/berkas"),
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

        $data = $this->berkas->find($id);

        $path = ROOTPATH . 'public/uploads/berkas/' . $data->file;

        if (file_exists($path)) {
            unlink($path);

            $hapus = $this->berkas->delete($id);

            $msg = ($hapus ? [1, "Berhasil menghapus data"] : [0, "Gagal menghapus data"]);
        } else {
            $msg = [0, "Gagal menghapus dataa"];
        }

        return redirect()->to(site_url('admin/berkas'))->with('msg', $msg);
    }
}
