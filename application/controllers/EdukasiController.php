<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EdukasiController extends MY_Controller
{

    public function index()
    {
        // set menu aktif
        $data['menu'] = 'edukasi';

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/edukasi/index';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }
    
}