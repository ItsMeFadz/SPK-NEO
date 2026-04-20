<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingController extends CI_Controller {

	public function index()
	{
		$tab = strtolower((string) $this->input->get('tab', true));
		$show_login_on_load = !in_array($tab, ['register', 'daftar'], true);

		$this->load->view('landing/index', [
			'show_login_on_load' => $show_login_on_load,
		]);
	}

	public function referensi()
	{
		$this->load->view('landing/referensi');
	}

	public function referensiPenanganan()
	{
		$this->load->view('landing/referensi_penanganan');
	}

	public function referensiSadari()
	{
		$this->load->view('landing/referensi_sadari');
	}
}
