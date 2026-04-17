<?php
class RuleDetailModels extends CI_Model {

    public function getAll()
    {
        return $this->db->order_by('id', 'ASC')->get('rule_detail')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('rule_detail', [
            'id' => $id
        ])->row();
    }

    public function getByRule($rule_id)
    {
        return $this->db
            ->where('id_rule', $rule_id)
            ->get('rule_detail')
            ->result();
    }

    // public function insert($data)
    // {
    //     return $this->db->insert('rule_detail', $data);
    // }

    // public function updateById($id, $data)
    // {
    //     return $this->db->where('id', $id)->update('rule_detail', $data);
    // }

    // public function deleteById($id)
    // {
    //     return $this->db->where('id', $id)->delete('rule_detail');
    // }
}
