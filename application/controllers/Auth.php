<?php
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModels');
    }

    public function process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->UserModels->getByUsername($username);

        if ($user && password_verify($password, $user->password)) {

            $data = [
                'id' => $user->id,
                'name' => $user->name,
                'login' => true
            ];

            $this->session->set_userdata($data);

            log_message('debug', 'User data: ' . json_encode($this->session->userdata()));
            redirect('dashboard');

        } else {
            echo "Login gagal";
        }
    }

    public function register()
    {
        $name = $this->input->post('name');
        $username = $name; 
        $tgl_lahir = $this->input->post('tgl_lahir');
        $usia = $this->input->post('usia');
        $alamat = $this->input->post('alamat');
        $password = $this->input->post('password');

        // Hash password
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'name' => $name,
            'username' => $username,
            'password' => $hashPassword,
            'role' => 2,
            'tgl_lahir' => $tgl_lahir,
            'usia' => $usia,
            'alamat' => $alamat,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->UserModels->insert($data);

        $this->session->set_flashdata('success', 'Registrasi berhasil, silakan login');
        redirect('/');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}