<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SolusiController extends MY_Controller
{

    public function index()
    {
        $this->load->model('SolusiModels');

        // set menu aktif
        $data['menu'] = 'solusi';

        $data['solusi'] = $this->SolusiModels->getAll();

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/solusi/index';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function create()
    {
        // set menu aktif
        $data['menu'] = 'solusi';

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/solusi/create';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function edit($id = null)
    {
        if (!$id) {
            show_404();
            return;
        }

        $this->load->model('SolusiModels');
        $solusi = $this->SolusiModels->getById($id);
        if (!$solusi) {
            $this->session->set_flashdata('error', 'Data solusi tidak ditemukan');
            redirect('solusi');
            return;
        }

        // set menu aktif
        $data['menu'] = 'solusi';

        $data['solusi'] = $solusi;

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/solusi/edit';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function store()
    {
        $this->load->model('SolusiModels');

        $data = [
            'kode' => $this->input->post('kode'),
            'keterangan' => $this->input->post('keterangan'),
            'solusi_1' => $this->input->post('solusi_1'),
            'solusi_2' => $this->input->post('solusi_2'),
            'solusi_3' => $this->input->post('solusi_3'),
            'solusi_4' => $this->input->post('solusi_4'),
            'solusi_5' => $this->input->post('solusi_5'),
            'solusi_6' => $this->input->post('solusi_6'),
        ];

        if (empty($data['kode']) || empty($data['keterangan'])) {
            $this->session->set_flashdata('error', 'Kode dan Keterangan wajib diisi');
            redirect('solusi/create');
            return;
        }

        if ($this->SolusiModels->insert($data)) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data');
        }

        redirect('solusi');
    }

    public function update($id = null)
    {
        if (!$id) {
            show_404();
            return;
        }

        if (strtoupper($this->input->method()) !== 'POST') {
            show_404();
            return;
        }

        $this->load->model('SolusiModels');

        $data = [
            'kode' => $this->input->post('kode'),
            'keterangan' => $this->input->post('keterangan'),
            'solusi_1' => $this->input->post('solusi_1'),
            'solusi_2' => $this->input->post('solusi_2'),
            'solusi_3' => $this->input->post('solusi_3'),
            'solusi_4' => $this->input->post('solusi_4'),
            'solusi_5' => $this->input->post('solusi_5'),
            'solusi_6' => $this->input->post('solusi_6'),
        ];

        if (empty($data['kode']) || empty($data['keterangan'])) {
            $this->session->set_flashdata('error', 'Kode dan Keterangan wajib diisi');
            redirect('solusi/edit/' . $id);
            return;
        }

        if ($this->SolusiModels->updateById($id, $data)) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
            redirect('solusi');
            return;
        }

        $this->session->set_flashdata('error', 'Gagal mengupdate data');
        redirect('solusi/edit/' . $id);
    }

    public function delete($id = null)
    {
        if (!$id) {
            show_404();
            return;
        }

        if (strtoupper($this->input->method()) !== 'POST') {
            show_404();
            return;
        }

        $this->load->model('SolusiModels');

        $solusi = $this->SolusiModels->getById($id);
        if (!$solusi) {
            $this->session->set_flashdata('error', 'Data solusi tidak ditemukan');
            redirect('solusi');
            return;
        }

        if ($this->SolusiModels->deleteById($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data');
        }

        redirect('solusi');
    }
}
