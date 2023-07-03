<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use \App\Models\AnggotaModel;
use \App\Models\AuthModel;
use App\Models\BerkasModel;
use App\Models\KampusModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    protected $session;
    protected $validation;
    protected $db;
    // protected $image;

    protected $cfg;

    protected $anggota;
    protected $auth;
    protected $admin;
    protected $berkas;
    protected $kampus;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();

        helper(['form', 'url', 'cookie', 'ini']);

        $this->cfg = new \SConfig();

        $this->session      = \Config\Services::session();
        $this->validation     = \Config\Services::validation();
        $this->db     = \Config\Database::connect();
        // $this->image        = \Config\Services::image();

        $this->anggota = new AnggotaModel();
        $this->auth = new AuthModel();
        $this->admin = new AdminModel();
        $this->berkas = new BerkasModel();
        $this->kampus = new KampusModel();
    }

    function isAdmin(): bool
    {
        if (session()->get('isAdmin') == true) {
            return true;
        }
        return false;
    }

    function isLogin(): bool
    {
        if (session()->get('isLogin') == true) {
            return true;
        }
        return false;
    }

    function isSecure($who = 'admin')
    {
        if (session()->get('isLogin')) {
            if ($who == 'admin') {
                if (session()->get('isAdmin')) {
                    return true;
                } else {
                    return false;
                }
            } else if ($who == 'user') {
                if (session()->get('isAdmin')) {
                    return false;
                } else {
                    return true;
                }
            }
        }
        return false;
    }
}
