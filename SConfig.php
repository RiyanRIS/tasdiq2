<?php
class SConfig
{
    public $_namaApp = "GAYO";
    public $_namaOrganisasi = "MAHASISWA GAYO LUES YOGYAKARTA";
    public $_alamatOrganisasi = 'Sonopakis Kidul nomor 148, RT/RW: 004/-, Desa Ngestiharjo, Kecamatan Kasihan,
    Kabupaten Bantul. ';
    public $_sosmed = [
        'instagram' => 'https://www.instagram.com/',
        'tiktok' => '',
        'facebook' => 'https://youtube.com/',
        'youtube' => '',
        'email' => 'humas@gayoluesyk.org',
        'twitter' => '',
    ];

    public $_logoSekolah = "https://i.ibb.co/CwkFSRS/logo.png";
    // public $_logoSekolah = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrIRiGNTfuYw5wgx_vDIlQUuvGuMhQnqzGLb4p5AoaAw&s";

    public $_visi = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque voluptatem provident, velit ea dolore voluptatibus? Voluptate, cum laborum eligendi hic, reprehenderit aliquid temporibus dolor facilis tempora magnam beatae aliquam ipsum..';
    public $_waAdmin = '6289677249060';

    function is_active($a, $b)
    {
        if ($a == $b) {
            echo "active";
        }
    }
}
