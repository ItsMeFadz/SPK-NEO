<?php
class GejalaModels extends CI_Model {

    public function getAll()
    {
        return $this->db->order_by('kode', 'ASC')->get('gejala')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('gejala', [
            'id' => $id
        ])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('gejala', $data);
    }

    public function updateById($id, $data)
    {
        return $this->db->where('id', $id)->update('gejala', $data);
    }

    public function deleteById($id)
    {
        return $this->db->where('id', $id)->delete('gejala');
    }
}
