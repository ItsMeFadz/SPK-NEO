<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PasienController extends MY_Controller
{

    public function index()
    {
        // set menu aktif
        $data['menu'] = 'pasien';

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/pasien/index';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }
}
