<?php
class RuleModels extends CI_Model
{

    public function getAll()
    {
        $this->db->select('
        rule.id,
        risiko.kode as kode_risiko,
        risiko.name as nama_risiko,
        GROUP_CONCAT(gejala.kode ORDER BY gejala.kode ASC) as kode_gejala
        ');

        $this->db->from('rule');
        $this->db->join('risiko', 'risiko.id = rule.id_risiko');
        $this->db->join('rule_detail', 'rule_detail.id_rule = rule.id');
        $this->db->join('gejala', 'gejala.id = rule_detail.id_gejala');

        $this->db->group_by('rule.id');

        return $this->db->get()->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('rule', [
            'id' => $id
        ])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('rule', $data);
    }

    public function updateById($id, $data)
    {
        return $this->db->where('id', $id)->update('rule', $data);
    }

    public function deleteById($id)
    {
        return $this->db->where('id', $id)->delete('rule');
    }
}
