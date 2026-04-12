<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RisikoController extends MY_Controller
{

    public function index()
    {
        $this->load->model('RisikoModels');

        // set menu aktif
        $data['menu'] = 'risiko';

        $data['risiko'] = $this->RisikoModels->getAll();

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/risiko/index';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function create()
    {
        // set menu aktif
        $data['menu'] = 'risiko';

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/risiko/create';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function edit($id = null)
    {
        if (!$id) {
            show_404();
            return;
        }

        $this->load->model('RisikoModels');
        $risiko = $this->RisikoModels->getById($id);
        if (!$risiko) {
            $this->session->set_flashdata('error', 'Data risiko tidak ditemukan');
            redirect('risiko');
            return;
        }

        // set menu aktif
        $data['menu'] = 'risiko';

        $data['risiko'] = $risiko;

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/risiko/edit';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function store()
    {
        $this->load->model('RisikoModels');

        $data = [
            'kode' => $this->input->post('kode'),
            'name' => $this->input->post('name'),
            'deskripsi' => $this->input->post('deskripsi'),
            'saran' => $this->input->post('saran'),
            'level' => $this->input->post('level'),
        ];

        if (empty($data['kode']) || empty($data['name'])) {
            $this->session->set_flashdata('error', 'Kode dan nama risiko wajib diisi');
            redirect('risiko/create');
            return;
        }

        if ($this->RisikoModels->insert($data)) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data');
        }

        redirect('risiko');
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

        $this->load->model('RisikoModels');

        $data = [
            'kode' => $this->input->post('kode'),
            'name' => $this->input->post('name'),
            'deskripsi' => $this->input->post('deskripsi'),
            'saran' => $this->input->post('saran'),
            'level' => $this->input->post('level'),
        ];

        if (empty($data['kode']) || empty($data['name'])) {
            $this->session->set_flashdata('error', 'Kode dan nama risiko wajib diisi');
            redirect('risiko/edit/' . $id);
            return;
        }

        if ($this->RisikoModels->updateById($id, $data)) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
            redirect('risiko');
            return;
        }

        $this->session->set_flashdata('error', 'Gagal mengupdate data');
        redirect('risiko/edit/' . $id);
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

        $this->load->model('RisikoModels');

        $risiko = $this->RisikoModels->getById($id);
        if (!$risiko) {
            $this->session->set_flashdata('error', 'Data risiko tidak ditemukan');
            redirect('risiko');
            return;
        }

        if ($this->RisikoModels->deleteById($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data');
        }

        redirect('risiko');
    }
}
