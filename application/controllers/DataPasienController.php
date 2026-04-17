<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPasienController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DiagnosaModels');
    }

    public function index()
    {
        // set menu aktif
        $data['menu'] = 'dataPasien';

        // ambil semua data riwayat diagnosis untuk ditampilkan di halaman admin
        $data['riwayat'] = $this->DiagnosaModels->getRiwayat();

        // $data['total_hari_ini'] = $this->DiagnosaModels->countToday();

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/data_pasien/index';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function search()
    {
        $keyword = trim((string) $this->input->get('keyword', true));
        $startDate = trim((string) $this->input->get('startDate', true));
        $endDate = trim((string) $this->input->get('endDate', true));

        $data = $this->DiagnosaModels->searchRiwayat($keyword, $startDate, $endDate);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

}
