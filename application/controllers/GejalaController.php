<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GejalaController extends MY_Controller
{

    public function index()
    {
        $this->load->model('GejalaModels');

        // set menu aktif
        $data['menu'] = 'gejala';

        $data['gejala'] = $this->GejalaModels->getAll();

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/gejala/index';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function create()
    {
        // set menu aktif
        $data['menu'] = 'gejala';

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/gejala/create';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function edit($id = null)
    {
        if (!$id) {
            show_404();
            return;
        }

        $this->load->model('GejalaModels');
        $gejala = $this->GejalaModels->getById($id);
        if (!$gejala) {
            $this->session->set_flashdata('error', 'Data gejala tidak ditemukan');
            redirect('gejala');
            return;
        }

        // set menu aktif
        $data['menu'] = 'gejala';

        $data['gejala'] = $gejala;

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/gejala/edit';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function store()
    {
        $this->load->model('GejalaModels');

        $data = [
            'kode' => $this->input->post('kode'),
            'name' => $this->input->post('name'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        if (empty($data['kode']) || empty($data['name']) || empty($data['deskripsi'])) {
            $this->session->set_flashdata('error', 'Semua field wajib diisi');
            redirect('gejala/create');
            return;
        }

        if ($this->GejalaModels->insert($data)) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data');
        }

        redirect('gejala');
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

        $this->load->model('GejalaModels');

        $data = [
            'kode' => $this->input->post('kode'),
            'name' => $this->input->post('name'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        if (empty($data['kode']) || empty($data['name']) || empty($data['deskripsi'])) {
            $this->session->set_flashdata('error', 'Semua field wajib diisi');
            redirect('gejala/edit/' . $id);
            return;
        }

        if ($this->GejalaModels->updateById($id, $data)) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
            redirect('gejala');
            return;
        }

        $this->session->set_flashdata('error', 'Gagal mengupdate data');
        redirect('gejala/edit/' . $id);
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

        $this->load->model('GejalaModels');

        $gejala = $this->GejalaModels->getById($id);
        if (!$gejala) {
            $this->session->set_flashdata('error', 'Data gejala tidak ditemukan');
            redirect('gejala');
            return;
        }

        if ($this->GejalaModels->deleteById($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data');
        }

        redirect('gejala');
    }
}
