<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// set menu aktif
		$data['menu'] = 'dashboard';
		$role = $this->session->userdata('role');
		$user_id = $this->session->userdata('id');

		$data['current_user_name'] = (string) $this->session->userdata('name');
		$data['summary'] = [
			'total_pasien' => (int) $this->db->where('role', 2)->count_all_results('users'),
			'total_diagnosa' => (int) $this->db->count_all('diagnosa'),
			'total_gejala' => (int) $this->db->count_all('gejala'),
			'total_rule' => (int) $this->db->count_all('rule'),
			'total_risiko' => (int) $this->db->count_all('risiko'),
			'today_diagnosa' => (int) $this->db
				->where("DATE(created_at) = " . $this->db->escape(date('Y-m-d')), null, false)
				->count_all_results('diagnosa'),
			'weekly_diagnosa' => (int) $this->db
				->where('created_at >=', date('Y-m-d 00:00:00', strtotime('-6 days')))
				->count_all_results('diagnosa'),
			'average_persen' => (float) ($this->db->select_avg('persen')->get('diagnosa')->row()->persen ?? 0),
		];

		if ($role == 2)
		{
			$user_id = $this->session->userdata('id');

			$data['summary']['my_total_diagnosa'] = (int) $this->db->where('user_id', $user_id)->count_all_results('diagnosa');
			$data['summary']['my_monthly_diagnosa'] = (int) $this->db->where('user_id', $user_id)->where('MONTH(created_at) = ' . date('n'), null, false)->where('YEAR(created_at) = ' . date('Y'), null, false)->count_all_results('diagnosa');
			$data['summary']['my_average_persen'] = (float) ($this->db->select_avg('persen')->where('user_id', $user_id)->get('diagnosa')->row()->persen ?? 0);

			$riskCounts = $this->db->select('risiko.level, COUNT(diagnosa.id) as total')->from('diagnosa')->join('risiko', 'risiko.id = diagnosa.risiko_id', 'left')->where('diagnosa.user_id', $user_id)->group_by('risiko.level')->get()->result();
			$data['summary']['my_low_risk'] = $data['summary']['my_mid_risk'] = $data['summary']['my_high_risk'] = 0;
			foreach ($riskCounts as $rc)
			{
				if ((int) $rc->level === 1)
					$data['summary']['my_low_risk'] = (int) $rc->total;
				if ((int) $rc->level === 2)
					$data['summary']['my_mid_risk'] = (int) $rc->total;
				if ((int) $rc->level === 3)
					$data['summary']['my_high_risk'] = (int) $rc->total;
			}

			// Override data diagnosis & highest risk case khusus milik pasien ini
			$data['latest_diagnoses'] = $this->db->select('diagnosa.id, diagnosa.created_at, diagnosa.persen, risiko.name as risiko_name, risiko.level')->from('diagnosa')->join('risiko', 'risiko.id = diagnosa.risiko_id', 'left')->where('diagnosa.user_id', $user_id)->order_by('diagnosa.created_at', 'DESC')->limit(4)->get()->result();
			$data['highest_risk_case'] = $this->db->select('diagnosa.id, diagnosa.created_at, diagnosa.persen, risiko.name as risiko_name, risiko.level')->from('diagnosa')->join('risiko', 'risiko.id = diagnosa.risiko_id', 'left')->where('diagnosa.user_id', $user_id)->order_by('diagnosa.persen', 'DESC')->order_by('diagnosa.created_at', 'DESC')->limit(1)->get()->row();
		}

		$data['risk_distribution'] = $this->db
			->select('risiko.name, risiko.level, COUNT(diagnosa.id) as total')
			->from('risiko')
			->join('diagnosa', 'diagnosa.risiko_id = risiko.id', 'left')
			->group_by(['risiko.id', 'risiko.name', 'risiko.level'])
			->order_by('risiko.level', 'ASC')
			->get()
			->result();

		$data['latest_diagnoses'] = $this->db
			->select('diagnosa.id, diagnosa.created_at, diagnosa.persen, users.name, users.usia, risiko.name as risiko_name, risiko.level')
			->from('diagnosa')
			->join('users', 'users.id = diagnosa.user_id', 'left')
			->join('risiko', 'risiko.id = diagnosa.risiko_id', 'left')
			->order_by('diagnosa.created_at', 'DESC')
			->limit(4)
			->get()
			->result();

		$data['latest_patient'] = $this->db
			->select('name, usia, alamat, created_at')
			->from('users')
			->where('role', 2)
			->order_by('created_at', 'DESC')
			->limit(1)
			->get()
			->row();

		$data['highest_risk_case'] = $this->db
			->select('diagnosa.id, diagnosa.created_at, diagnosa.persen, users.name, risiko.name as risiko_name, risiko.level')
			->from('diagnosa')
			->join('users', 'users.id = diagnosa.user_id', 'left')
			->join('risiko', 'risiko.id = diagnosa.risiko_id', 'left')
			->order_by('diagnosa.persen', 'DESC')
			->order_by('diagnosa.created_at', 'DESC')
			->limit(1)
			->get()
			->row();

		// Nama view halaman yang akan dimuat di dalam $content
		$data['content'] = 'admin/dashboard/index';

		// Memanggil layout utama
		$this->load->view('admin/main', $data);
	}
}
