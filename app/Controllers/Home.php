<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'banner' => $this->banner->find(),
            'info' => $this->info->find(1),
        ];
        // print_r($data);
        // die();
        return view('index', $data);
    }

    public function berkas()
    {
        $berkas = $this->berkas->find();
        $data = [
            'berkas' => $berkas,
        ];
        return view('berkas', $data);
    }

    public function ubah()
    {
        $this->validation->setRules($this->anggota->rules_tambah_ubah);
        if ($this->request->getPost() && $this->validation->withRequest($this->request)->run()) {
            // inisialisasi data yang akan dimasukkan ke database
            $additionalData = $this->request->getPost();

            if ($additionalData['password'] != '') {
                $additionalData['password'] =  password_hash($additionalData['password'], PASSWORD_DEFAULT);
            } else {
                unset($additionalData['password']);
            }

            // Cek Valid Username
            $isValidUsername = $this->anggota->isValidUsername($additionalData['username'], session()->user_id);
            if (!$isValidUsername) {
                $data = [
                    'post' => $this->request->getPost(),
                    'err' => ['username' => "Username telah digunakan"]
                ];
                session()->setFlashdata('msg', [0, "Username telah digunakan"]);

                return view('ubah', $data);
            }

            // Input ke database
            $lastid = $this->anggota->update(['id_anggota' => session()->user_id], $additionalData);

            if ($lastid) // Kondisi berhasil menambah data
            {
                return redirect()->to(site_url("ubah"))->with('msg', [1, "Berhasil Memperbarui Data"]);
            } else { // kondisi gagal
                return redirect()->to(site_url("ubah"))->with('msg', [1, "Gagal Memperbarui Data"]);
            }
        } else {
            if ($this->validation->getErrors()) {
                session()->setFlashdata('msg', [0, "Isian belum lengkap"]);
            }
            $anggota = (array) $this->anggota->find(session()->user_id);
            $data = [
                'post' => $anggota,
                'err' => $this->validation->getErrors()
            ];
            return view('ubah', $data);
        }
    }

    function visi()
    {
        $info = $this->info->find(1);
        return json_encode($info->visi);
    }

    function misi()
    {
        $info = $this->info->find(1);
        return json_encode($info->misi);
    }
}
