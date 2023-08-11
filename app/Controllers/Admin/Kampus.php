<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kampus extends BaseController
{
    public function index()
    {
        if (!$this->isSecure()) return redirect()->to(site_url('/admin/login'))->with('msg', [0, 'Sesi anda telah kadaluarsa.']);

        $data = [
            "kampus" => $this->kampus->find(),
            "judul" => "Kampus"
        ];

        return view('admin/kampus/index', $data);
    }

    public function tambah()
    {
        if (!$this->isSecure()) return redirect()->to(site_url('/admin/login'))->with('msg', [0, 'Sesi anda telah kadaluarsa.']);

        // Cek isian ngga boleh kosong
        $rules = [
            'nama_kampus' => [
                'label'  => 'Nama Kampus',
                'rules'  => 'required',
                'errors' => [],
            ],
            'alamat_kampus' => [
                'label'  => 'Alamat Kampus',
                'rules'  => 'required',
                'errors' => [],
            ],
            'link_kampus' => [
                'label'  => 'Link Kampus',
                'rules'  => 'required',
                'errors' => [],
            ]
        ];
        $this->validation->setRules($rules);

        if ($this->request->getPost() && $this->validation->withRequest($this->request)->run()) {
            $additionalData = $this->request->getPost();
            // unset($additionalData['id']);

            $file = $this->request->getFile('file');
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/kampus/', $newName);

            $additionalData['file'] = $newName;

            $lastid = $this->kampus->simpan($additionalData);

            if ($lastid) {
                $msg = [
                    'status' => true,
                    'url' => site_url("admin/kampus"),
                ];
            } else {
                $msg = [
                    'status' => false,
                    'url' => site_url("admin/kampus"),
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

        $data = $this->kampus->find($id);

        $path = ROOTPATH . 'public/uploads/kampus/' . $data->file;

        if (file_exists($path)) {
            unlink($path);
        }
        $hapus = $this->kampus->delete($id);

        $msg = ($hapus ? [1, "Berhasil menghapus data"] : [0, "Gagal menghapus data"]);

        return redirect()->to(site_url('admin/kampus'))->with('msg', $msg);
    }
}
