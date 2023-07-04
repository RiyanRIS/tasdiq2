<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    function tes()
    {
        $a = '2023-07-01';
        $b = '2023-07-05';

        $c = [
            [
                'tanggal' => '2023-07-01',
                'total' => 0
            ],
            [
                'tanggal' => '2023-07-03',
                'total' => 0
            ],
            [
                'tanggal' => '2023-07-04',
                'total' => 0
            ],
        ];
        $tanggalB = array_column($c, 'tanggal');

        $nilaiTidakAda = '';

        $tgl = [];
        while ($a <= $b) {
            $tgl['tanggal'] = $a;
            $nilaiTidakAda = array_diff($tanggalB, $tgl);
            // print_r($nilaiTidakAda);
            // die();
            $a = strtotime('+1 day', strtotime($a));
            $a = date('Y-m-d', $a);
        }

        // Ambil nilai tanggal dari array pertama
        // $tanggalA = array_column($a, 'tanggal');

        // Ambil nilai tanggal dari array kedua
        // $tanggalB = array_column($b, 'tanggal');

        // Cari elemen yang ada di array kedua tetapi tidak ada di array pertama
        // $nilaiTidakAda = array_diff($tanggalB, $a);

        // Tampilkan nilai yang tidak ada dalam array pertama
        // print_r($tanggalB);
    }
}
