<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeteksiDiniController extends MY_Controller {

	public function index()
	{	
		// set menu aktif
		$data['menu'] = 'deteksiDini';	

		// Nama view halaman yang akan dimuat di dalam $content
		$data['content'] = 'admin/deteksi_dini/index';

        $data['gejala'] = $this->db->get('gejala')->result();

		// Memanggil layout utama
        $this->load->view('admin/main', $data);
	}
}
