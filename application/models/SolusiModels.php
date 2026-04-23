<?php
class SolusiModels extends CI_Model {

    public function getAll()
    {
        return $this->db->order_by('kode', 'ASC')->get('solusi')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('solusi', [
            'id' => $id
        ])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('solusi', $data);
    }

    public function updateById($id, $data)
    {
        return $this->db->where('id', $id)->update('solusi', $data);
    }

    public function deleteById($id)
    {
        return $this->db->where('id', $id)->delete('solusi');
    }
}
