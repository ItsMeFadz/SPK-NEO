<?php
class DiagnosaDetailModels extends CI_Model {

    public function getAll()
    {
        return $this->db->order_by('id', 'ASC')->get('diagnosa_detail')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('diagnosa_detail', [
            'id' => $id
        ])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('diagnosa_detail', $data);
    }

    public function updateById($id, $data)
    {
        return $this->db->where('id', $id)->update('diagnosa_detail', $data);
    }

    public function deleteById($id)
    {
        return $this->db->where('id', $id)->delete('diagnosa_detail');
    }
}
