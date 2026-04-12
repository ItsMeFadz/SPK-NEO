<?php
class RisikoModels extends CI_Model {

    public function getAll()
    {
        return $this->db->order_by('kode', 'ASC')->get('risiko')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('risiko', [
            'id' => $id
        ])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('risiko', $data);
    }

    public function updateById($id, $data)
    {
        return $this->db->where('id', $id)->update('risiko', $data);
    }

    public function deleteById($id)
    {
        return $this->db->where('id', $id)->delete('risiko');
    }
}
