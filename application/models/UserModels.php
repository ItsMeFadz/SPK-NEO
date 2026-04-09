<?php
class UserModels extends CI_Model {

    public function getByUsername($username)
    {
        return $this->db->get_where('users', [
            'username' => $username
        ])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }
}