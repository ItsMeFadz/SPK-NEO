<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ruleController extends MY_Controller
{

    public function index()
    {
        $this->load->model('RuleModels');

        // set menu aktif
        $data['menu'] = 'rule';

        $data['rule'] = $this->RuleModels->getAll();

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/rule/index';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function create()
    {
        $this->load->model('RuleModels');
        $this->load->model('SolusiModels');

        // set menu aktif
        $data['menu'] = 'rule';

        // ambil data risiko, gejala & solusi
        $data['risiko'] = $this->db->order_by('kode', 'asc')->get('risiko')->result();
        $data['gejala'] = $this->db->order_by('kode', 'asc')->get('gejala')->result();
        $data['solusi'] = $this->SolusiModels->getAll();

        // Nama view halaman yang akan dimuat di dalam $content
        $data['content'] = 'admin/rule/create';

        // Memanggil layout utama
        $this->load->view('admin/main', $data);
    }

    public function edit($id = null)
    {
        if (!$id)
        {
            show_404();
            return;
        }

        $this->load->model('RuleModels');
        $this->load->model('SolusiModels');

        $rule = $this->RuleModels->getById($id);
        if (!$rule)
        {
            $this->session->set_flashdata('error', 'Data Rule tidak ditemukan');
            redirect('rule');
            return;
        }

        $data['menu'] = 'rule';
        $data['rule'] = $rule;

        // 🔹 ambil semua risiko, gejala & solusi
        $data['risiko'] = $this->db->order_by('kode', 'asc')->get('risiko')->result();
        $data['gejala'] = $this->db->order_by('kode', 'asc')->get('gejala')->result();
        $data['solusi'] = $this->SolusiModels->getAll();

        // 🔹 ambil gejala yang sudah dipilih
        $detail = $this->db->get_where('rule_detail', [
            'id_rule' => $id
        ])->result();

        // ubah jadi array id_gejala
        $data['selected_gejala'] = array_column($detail, 'id_gejala');

        $data['content'] = 'admin/rule/edit';
        $this->load->view('admin/main', $data);
    }

    public function store()
    {
        $this->load->model('RuleModels');

        $id_risiko = $this->input->post('id_risiko');
        $gejala = $this->input->post('gejala');
        $id_solusi = $this->input->post('id_solusi');

        if (empty($id_risiko) || empty($gejala) || empty($id_solusi))
        {
            $this->session->set_flashdata('error', 'Risiko dan gejala wajib dipilih');
            redirect('rule/create');
            return;
        }

        // 🔴 CEK APAKAH RISIKO SUDAH ADA DI RULE
        $cek = $this->db->get_where('rule', [
            'id_risiko' => $id_risiko,
            'id_solusi' => $id_solusi
        ])->row();

        if ($cek)
        {
            $this->session->set_flashdata('error', 'Risiko sudah digunakan dalam Rule');
            redirect('rule/create');
            return;
        }

        // 🔹 insert ke rule
        $this->db->insert('rule', [
            'id_risiko' => $id_risiko,
            'id_solusi' => $id_solusi
        ]);

        $id_rule = $this->db->insert_id();

        // 🔹 insert ke rule_detail
        foreach ($gejala as $g)
        {
            $this->db->insert('rule_detail', [
                'id_rule' => $id_rule,
                'id_gejala' => $g
            ]);
        }

        $this->session->set_flashdata('success', 'Rule berhasil disimpan');
        redirect('rule');
    }

    public function update($id = null)
    {
        if (!$id)
        {
            show_404();
            return;
        }

        $id_risiko = $this->input->post('id_risiko');
        $gejala = $this->input->post('gejala');
        $id_solusi = $this->input->post('id_solusi');

        if (empty($id_risiko) || empty($gejala) || empty($id_solusi))
        {
            $this->session->set_flashdata('error', 'Risiko, gejala, dan solusi wajib dipilih');
            redirect('rule/edit/' . $id);
            return;
        }

        // 🔴 cek duplicate risiko (kecuali dirinya sendiri)
        $cek = $this->db
            ->where('id_risiko', $id_risiko)
            ->where('id_solusi', $id_solusi)
            ->where('id !=', $id)
            ->get('rule')
            ->row();

        if ($cek)
        {
            $this->session->set_flashdata('error', 'Risiko sudah digunakan');
            redirect('rule/edit/' . $id);
            return;
        }

        $this->db->trans_start();

        // 🔹 update rule
        $this->db->where('id', $id)->update('rule', [
            'id_risiko' => $id_risiko,
            'id_solusi' => $id_solusi
        ]);

        // 🔹 hapus detail lama
        $this->db->delete('rule_detail', [
            'id_rule' => $id
        ]);

        // 🔹 insert ulang
        foreach ($gejala as $g)
        {
            $this->db->insert('rule_detail', [
                'id_rule' => $id,
                'id_gejala' => $g
            ]);
        }

        $this->db->trans_complete();

        $this->session->set_flashdata('success', 'Rule berhasil diupdate');
        redirect('rule');
    }

    public function delete($id = null)
    {
        if (!$id)
        {
            show_404();
            return;
        }

        if (strtoupper($this->input->method()) !== 'POST')
        {
            show_404();
            return;
        }

        $this->db->trans_start();

        // 🔹 hapus detail dulu
        $this->db->delete('rule_detail', [
            'id_rule' => $id
        ]);

        // 🔹 hapus rule
        $this->db->delete('rule', [
            'id' => $id
        ]);

        $this->db->trans_complete();

        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('rule');
    }
}
