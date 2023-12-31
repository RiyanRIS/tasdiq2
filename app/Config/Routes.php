<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('berkas', 'Home::berkas');
$routes->get('galery', 'Home::galery');
$routes->get('organ', 'Home::organ');
$routes->get('kampus', 'Home::kampus');
$routes->match(['get', 'post'], 'ubah', 'Home::ubah');

$routes->match(['get', 'post'], 'login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->match(['get', 'post'], 'daftar', 'Auth::daftar');

$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin\Home::index');

    $routes->match(['get', 'post'], 'login', 'Admin\Auth::login');
    $routes->get('logout', 'Admin\Auth::logout');

    $routes->group('anggota', function ($routes) {
        $routes->get('/', 'Admin\Anggota::index');
        $routes->get('tambah', 'Admin\Anggota::vtambah');
        $routes->post('tambah', 'Admin\Anggota::tambah');
        // $routes->post('ubah', 'Admin\Anggota::tambah');
        $routes->get('hapus/(:segment)', 'Admin\Anggota::hapus/$1');
    });

    $routes->group('kampus', function ($routes) {
        $routes->get('/', 'Admin\Kampus::index');
        $routes->post('tambah', 'Admin\Kampus::tambah');
        $routes->get('hapus/(:segment)', 'Admin\Kampus::hapus/$1');
    });

    $routes->group('berkas', function ($routes) {
        $routes->get('/', 'Admin\Berkas::index');
        $routes->post('tambah', 'Admin\Berkas::tambah');
        $routes->get('hapus/(:segment)', 'Admin\Berkas::hapus/$1');
    });

    $routes->group('galeri', function ($routes) {
        $routes->get('/', 'Admin\Galeri::index');
        $routes->post('tambah', 'Admin\Galeri::tambah');
        $routes->get('hapus/(:segment)', 'Admin\Galeri::hapus/$1');
    });

    $routes->group('pengaturan', function ($routes) {
        $routes->group('banner', function ($routes) {
            $routes->get('/', 'Admin\Pengaturan\Banner::index');
            $routes->post('tambah', 'Admin\Pengaturan\Banner::tambah');
            $routes->get('hapus/(:segment)', 'Admin\Pengaturan\Banner::hapus/$1');
        });

        $routes->group('visi', function ($routes) {
            $routes->get('/', 'Admin\Pengaturan\Visi::index');
            $routes->post('tambah', 'Admin\Pengaturan\Visi::tambah');
            $routes->get('hapus/(:segment)', 'Admin\Pengaturan\Visi::hapus/$1');
        });

        $routes->group('struktur', function ($routes) {
            $routes->get('/', 'Admin\Pengaturan\Struktur::index');
            $routes->post('tambah', 'Admin\Pengaturan\Struktur::tambah');
            $routes->get('hapus/(:segment)', 'Admin\Pengaturan\Struktur::hapus/$1');
        });
    });
});

$routes->group('api', function ($routes) {
    $routes->get('visi', 'Home::visi');
    $routes->get('misi', 'Home::misi');
    $routes->get('struktur', 'Home::struktur');
    $routes->get('anggota/(:segment)', 'Admin\Anggota::getbyusername/$1');
});

$routes->get('tes', 'Home::tes');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
