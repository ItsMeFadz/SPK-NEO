<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatDiagnosisController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DiagnosaModels');
    }

    public function index()
    {
        // set menu aktif
        $data['menu'] = 'riwayatDiagnosis';

        // ambil user login
        $user_id = (int) $this->session->userdata('id');

        // kirim ke model
        $data['riwayat'] = $user_id > 0
            ? $this->DiagnosaModels->getRiwayatByUser($user_id)
            : [];

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/riwayat_diagnosis/index';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function search()
    {
        $keyword = trim((string) $this->input->get('keyword', true));
        $startDate = trim((string) $this->input->get('startDate', true));
        $endDate = trim((string) $this->input->get('endDate', true));

        $user_id = (int) $this->session->userdata('id');

        $data = $this->DiagnosaModels->searchRiwayatonlyUserid($keyword, $startDate, $endDate, $user_id);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

}
