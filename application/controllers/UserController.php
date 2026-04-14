<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends MY_Controller
{

    public function index()
    {
        $this->load->model('UserModels');

        // set menu aktif
        $data['menu'] = 'user';

        $data['user'] = $this->UserModels->getAll();

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/user/index';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function create()
    {
        // set menu aktif
        $data['menu'] = 'user';

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/user/create';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function edit($id = null)
    {
        if (!$id)
        {
            show_404();
            return;
        }

        $this->load->model('UserModels');
        $user = $this->UserModels->getById($id);
        if (!$user)
        {
            $this->session->set_flashdata('error', 'Data user tidak ditemukan');
            redirect('user');
            return;
        }

        // set menu aktif
        $data['menu'] = 'user';

        $data['user'] = $user;

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/user/edit';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function store()
    {
        $this->load->model('UserModels');

        $foto = null;

        // 🔹 upload foto
        if (!empty($_FILES['foto']['name']))
        {
            $config['upload_path'] = './uploads/user/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto'))
            {
                $foto = $this->upload->data('file_name');
            }
            else
            {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('user/create');
                return;
            }
        }

        $tgl_lahir = $this->input->post('tgl_lahir');
        $usia = null;

        if (!empty($tgl_lahir)) {
            $usia = (new DateTime())->diff(new DateTime($tgl_lahir))->y;
        }

        $data = [
            'name' => $this->input->post('name'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'usia' => $usia,
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role'),
            'foto' => $foto
        ];

        if (empty($data['name']) || empty($data['username']))
        {
            $this->session->set_flashdata('error', 'Nama dan username wajib diisi');
            redirect('user/create');
            return;
        }

        $tgl_lahir = $this->input->post('tgl_lahir');

        $usia = null;
        if (!empty($tgl_lahir)) {
            $usia = (new DateTime())->diff(new DateTime($tgl_lahir))->y;
        }

        if ($this->UserModels->insert($data))
        {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        }
        else
        {
            $this->session->set_flashdata('error', 'Gagal menambahkan data');
        }

        redirect('user');
    }

    public function update($id = null)
    {
        if (!$id)
        {
            show_404();
            return;
        }

        $this->load->model('UserModels');

        $user = $this->UserModels->getById($id);

        $foto = $user->foto;

        // 🔹 upload foto baru
        if (!empty($_FILES['foto']['name']))
        {

            $config['upload_path'] = './uploads/user/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto'))
            {

                // hapus foto lama
                if ($user->foto && file_exists('./uploads/user/' . $user->foto))
                {
                    unlink('./uploads/user/' . $user->foto);
                }

                $foto = $this->upload->data('file_name');
            }
        }

        $tgl_lahir = $this->input->post('tgl_lahir');
        $usia = null;

        if (!empty($tgl_lahir)) {
            $usia = (new DateTime())->diff(new DateTime($tgl_lahir))->y;
        }

        $data = [
            'name' => $this->input->post('name'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'usia' => $usia,
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
            'role' => $this->input->post('role'),
            'foto' => $foto
        ];

        // update password kalau diisi
        if (!empty($this->input->post('password')))
        {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        if ($this->UserModels->updateById($id, $data))
        {
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
        }
        else
        {
            $this->session->set_flashdata('error', 'Gagal update');
        }

        redirect('user');
    }

    public function delete($id = null)
    {
        if (!$id)
        {
            show_404();
            return;
        }

        $this->load->model('UserModels');

        $user = $this->UserModels->getById($id);

        if ($user)
        {

            // hapus file foto
            if ($user->foto && file_exists('./uploads/user/' . $user->foto))
            {
                unlink('./uploads/user/' . $user->foto);
            }

            $this->UserModels->deleteById($id);

            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }

        redirect('user');
    }
}
