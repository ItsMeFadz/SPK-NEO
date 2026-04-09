<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends MY_Controller {

	public function index()
	{	
		// set menu aktif
		$data['menu'] = 'dashboard';	

		// Nama view halaman yang akan dimuat di dalam $content
		$data['content'] = 'admin/dashboard/index';

		// Memanggil layout utama
        $this->load->view('admin/main', $data);
	}
}
