<?php
class DiagnosaModels extends CI_Model
{

    public function getAll()
    {
        return $this->db->order_by('id', 'ASC')->get('diagnosa')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('diagnosa', [
            'id' => $id
        ])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('diagnosa', $data);
    }

    public function updateById($id, $data)
    {
        return $this->db->where('id', $id)->update('diagnosa', $data);
    }

    public function deleteById($id)
    {
        return $this->db->where('id', $id)->delete('diagnosa');
    }

    public function getRiwayat()
    {
        $this->db->select('
        diagnosa.id,
        users.name,
        users.usia,
        users.alamat,
        diagnosa.created_at,
        diagnosa.persen,
        risiko.name as nama_risiko
    ');

        $this->db->from('diagnosa');
        $this->db->join('users', 'users.id = diagnosa.user_id', 'left');
        $this->db->join('risiko', 'risiko.id = diagnosa.risiko_id', 'left');

        $this->db->order_by('diagnosa.id', 'DESC');

        return $this->db->get()->result();
    }

    public function getRiwayatByUser($user_id)
    {
        $this->db->select('
        diagnosa.id,
        diagnosa.persen,
        diagnosa.created_at,
        users.name,
        users.usia,
        users.alamat
    ');

        $this->db->from('diagnosa');
        $this->db->join('users', 'users.id = diagnosa.user_id', 'left');

        // 🔥 filter user login
        $this->db->where('diagnosa.user_id', $user_id);

        $this->db->order_by('diagnosa.id', 'DESC');

        return $this->db->get()->result();
    }

    // public function countToday()
    // {
    //     $this->db->where('DATE(created_at)', date('Y-m-d'));
    //     return $this->db->count_all_results('diagnosa');
    // }

    public function searchRiwayat($keyword = null, $startDate = null, $endDate = null)
    {
        $this->db->select('
        diagnosa.id,
        users.name,
        users.usia,
        users.alamat,
        diagnosa.created_at,
        diagnosa.persen
    ');

        $this->db->from('diagnosa');
        $this->db->join('users', 'users.id = diagnosa.user_id', 'left');

        // 🔍 search nama / (anggap NIK = name sementara kalau belum ada field)
        if (!empty($keyword))
        {
            $this->db->group_start();
            $this->db->like('users.name', $keyword);
            // kalau ada nik tinggal tambah:
            // $this->db->or_like('users.nik', $keyword);
            $this->db->group_end();
        }

        // 📅 filter tanggal
        if (!empty($startDate))
        {
            $this->db->where('DATE(diagnosa.created_at) >=', $startDate);
        }

        if (!empty($endDate))
        {
            $this->db->where('DATE(diagnosa.created_at) <=', $endDate);
        }

        $this->db->order_by('diagnosa.id', 'DESC');

        return $this->db->get()->result();
    }

    public function searchRiwayatonlyUserid($keyword = null, $startDate = null, $endDate = null, $user_id = null)
    {
        $this->db->select('
        diagnosa.id,
        users.name,
        users.usia,
        users.alamat,
        diagnosa.created_at,
        diagnosa.persen
    ');

        $this->db->from('diagnosa');
        $this->db->join('users', 'users.id = diagnosa.user_id', 'left');

        // 🔥 WAJIB: filter user login
        if (!empty($user_id))
        {
            $this->db->where('diagnosa.user_id', $user_id);
        }

        // 🔍 search
        if (!empty($keyword))
        {
            $this->db->group_start();
            $this->db->like('users.name', $keyword);
            $this->db->group_end();
        }

        // 📅 tanggal
        if (!empty($startDate))
        {
            $this->db->where('DATE(diagnosa.created_at) >=', $startDate);
        }

        if (!empty($endDate))
        {
            $this->db->where('DATE(diagnosa.created_at) <=', $endDate);
        }

        $this->db->order_by('diagnosa.id', 'DESC');

        return $this->db->get()->result();
    }
}
