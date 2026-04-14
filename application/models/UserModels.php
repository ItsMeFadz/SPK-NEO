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

    public function getAll()
    {
        return $this->db->order_by('name', 'ASC')->get('users')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('users', [
            'id' => $id
        ])->row();
    }

    public function updateById($id, $data)
    {
        return $this->db->where('id', $id)->update('users', $data);
    }

    public function deleteById($id)
    {
        return $this->db->where('id', $id)->delete('users');
    }
}