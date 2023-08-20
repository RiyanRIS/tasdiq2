<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Anggota extends BaseController
{
    public function index()
    {
        if (!$this->isSecure()) return redirect()->to(site_url('/admin/login'))->with('msg', [0, 'Sesi anda telah kadaluarsa.']);

        $data = [
            "anggota" => $this->anggota->find(),
            "judul" => "Anggota"
        ];

        return view('admin/anggota/index', $data);
    }

    public function vtambah()
    {
        if (!$this->isSecure()) return redirect()->to(site_url('/admin/login'))->with('msg', [0, 'Sesi anda telah kadaluarsa.']);

        $data = [
            "judul" => "Tambah Anggota"
        ];

        return view('admin/anggota/form', $data);
    }


    public function tambah()
    {
        if (!$this->isSecure()) return redirect()->to(site_url('/admin/login'))->with('msg', [0, 'Sesi anda telah kadaluarsa.']);

        $this->validation->setRules($this->anggota->rules_tambah_ubah);
        if ($this->request->getPost() && $this->validation->withRequest($this->request)->run()) {
            $additionalData = $this->request->getPost();

            if (@$additionalData['id_anggota'] == '') { // TAMBAH
                unset($additionalData['id_anggota']);

                $additionalData['password'] =  password_hash($additionalData['password'], PASSWORD_DEFAULT);

                // Cek Valid Username
                $isValidUsername = $this->anggota->isValidUsername($additionalData['username']);
                if (!$isValidUsername) {
                    $msg = [
                        'status' => false,
                        'err' => ['username' => "Username telah digunakan"]
                    ];
                    echo json_encode($msg);
                    die();
                }

                // Input ke database
                $lastid = $this->anggota->simpan($additionalData);
            } else { // UBAH
                $id_anggota = $additionalData['id_anggota'];
                unset($additionalData['id_anggota']);

                if ($additionalData['password'] != '') {
                    $additionalData['password'] =  password_hash($additionalData['password'], PASSWORD_DEFAULT);
                } else {
                    unset($additionalData['password']);
                }

                // Cek Valid Username
                $isValidUsername = $this->anggota->isValidUsername($additionalData['username'], $id_anggota);
                if (!$isValidUsername) {
                    $msg = [
                        'status' => false,
                        'err' => ['username' => "Username telah digunakan"]
                    ];
                    echo json_encode($msg);
                    die();
                }

                // Input ke database
                $lastid = $this->anggota->update(['id_anggota' => $id_anggota], $additionalData);
            }

            if ($lastid) {
                $msg = [
                    'status' => true,
                    'url' => site_url("admin/anggota"),
                ];
            } else {
                $msg = [
                    'status' => false,
                    'url' => site_url("admin/anggota"),
                    'pesan'     => 'Data gagal ditambah',
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

        $hapus = $this->anggota->delete($id);

        $msg = ($hapus ? [1, "Berhasil menghapus data"] : [0, "Gagal menghapus data"]);

        return redirect()->to(site_url('admin/anggota'))->with('msg', $msg);
    }

    public function getbyusername($username)
    {
        $anggota = $this->anggota->getByUsername($username);
        echo json_encode($anggota);
    }
}
