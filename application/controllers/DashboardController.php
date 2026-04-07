<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function index()
	{
		// Nama view halaman yang akan dimuat di dalam $content
		$data['content'] = 'admin/dashboard/index';

		// Memanggil layout utama
        $this->load->view('admin/main', $data);
	}
}
