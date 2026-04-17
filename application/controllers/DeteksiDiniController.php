<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeteksiDiniController extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DiagnosaModels');
		$this->load->model('DiagnosaDetailModels');
	}


	public function index()
	{
		// set menu aktif
		$data['menu'] = 'deteksiDini';

		// Nama view halaman yang akan dimuat di dalam $content
		$data['content'] = 'admin/deteksi_dini/index';

		$data['gejala'] = $this->db->order_by('kode', 'ASC')->get('gejala')->result();

		// Memanggil layout utama
		$this->load->view('admin/main', $data);
	}

	public function proses()
	{
		$jawaban = $this->input->post('jawaban');
		$jawaban = is_array($jawaban) ? $jawaban : [];
		$totalGejala = (int) $this->db->count_all('gejala');

		if (count($jawaban) !== $totalGejala)
		{
			$this->session->set_flashdata('error', 'Semua pertanyaan gejala wajib dijawab dengan Ya atau Tidak.');
			redirect('/deteksiDini');
			return;
		}

		foreach ($jawaban as $nilai)
		{
			if (!in_array((string) $nilai, ['0', '1'], true))
			{
				$this->session->set_flashdata('error', 'Terdapat jawaban yang tidak valid. Silakan isi ulang semua gejala.');
				redirect('/deteksiDini');
				return;
			}
		}

		$hasilForwardChaining = $this->inferRisikoFromRules($jawaban);
		if (!$hasilForwardChaining)
		{
			show_error('Rule deteksi dini belum tersedia atau belum lengkap.');
			return;
		}

		// simpan ke diagnosa
		$dataDiagnosa = [
			'user_id' => (int) $this->session->userdata('id'),
			'risiko_id' => $hasilForwardChaining['risiko']->risiko_id,
			'persen' => $this->getPersenByLevel((int) $hasilForwardChaining['risiko']->level),
			'created_at' => date('Y-m-d H:i:s')
		];

		$this->DiagnosaModels->insert($dataDiagnosa);
		$diagnosa_id = $this->db->insert_id();

		// simpan detail
		foreach ($jawaban as $id_gejala => $val)
		{
			if ($val == 1)
			{
				$this->DiagnosaDetailModels->insert([
					'diagnosa_id' => $diagnosa_id,
					'gejala_id' => $id_gejala
				]);
			}
		}

		// kirim ke halaman hasil
		redirect('/deteksiDini/hasil/' . $diagnosa_id);
	}


	public function hasil($id)
	{
		$data = $this->buildDiagnosaViewData($id);
		$data['menu'] = 'deteksiDini';
		$data['content'] = 'admin/deteksi_dini/hasil';

		$this->load->view('admin/main', $data);
	}

	public function unduh ($id)
	{
		$data = $this->buildDiagnosaViewData($id);
		$data['logo_path'] = $this->getImageDataUri(FCPATH . 'assets/admin/img/icons/brands/cancer-HD.png');
		$data['status_icon_path'] = $this->getImageDataUri(FCPATH . 'assets/admin/img/icons/brands/' . $data['icon']);

		$html = $this->load->view('admin/deteksi_dini/unduh_pdf', $data, true);

		if (!class_exists('Dompdf\\Dompdf'))
		{
			show_error('Class Dompdf tidak ditemukan. Pastikan package dompdf/dompdf sudah terpasang.');
			return;
		}

		$options = new \Dompdf\Options();
		$options->set('isRemoteEnabled', true);
		$options->set('isHtml5ParserEnabled', true);

		$dompdf = new \Dompdf\Dompdf($options);
		$dompdf->loadHtml($html, 'UTF-8');
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		$dompdf->stream('hasil-diagnosis-' . $data['diagnosa']->id . '.pdf', ['Attachment' => true]);
	}

	private function getImageDataUri($path)
	{
		if (!is_file($path))
		{
			return null;
		}

		$imageData = @file_get_contents($path);
		if ($imageData === false)
		{
			return null;
		}

		$mime = function_exists('mime_content_type') ? mime_content_type($path) : 'image/png';
		if (!$mime)
		{
			$mime = 'image/png';
		}

		return 'data:' . $mime . ';base64,' . base64_encode($imageData);
	}

	private function getPersenByLevel($level)
	{
		switch ($level)
		{
			case 1:
				return 25;
			case 2:
				return 50;
			case 3:
				return 100;
			default:
				return 0;
		}
	}

	private function inferRisikoFromRules($jawaban)
	{
		$rules = $this->db
			->select('
				rule.id as rule_id,
				rule.id_risiko as rule_risiko_id,
				risiko.id as risiko_id,
				risiko.kode,
				risiko.name,
				risiko.level,
				risiko.deskripsi,
				risiko.saran
			')
			->from('rule')
			->join('risiko', 'risiko.id = rule.id_risiko')
			->order_by('risiko.level', 'DESC')
			->order_by('rule.id', 'ASC')
			->get()
			->result();

		if (empty($rules))
		{
			return null;
		}

		$evaluasi = [];

		foreach ($rules as $rule)
		{
			$details = $this->db
				->select('id_gejala')
				->from('rule_detail')
				->where('id_rule', $rule->rule_id)
				->get()
				->result();

			$totalRuleGejala = count($details);
			if ($totalRuleGejala === 0)
			{
				continue;
			}

			$matchedYa = 0;
			$terpenuhi = true;

			foreach ($details as $detail)
			{
				$jawabanGejala = isset($jawaban[$detail->id_gejala]) ? (int) $jawaban[$detail->id_gejala] : 0;

				if ($jawabanGejala === 1)
				{
					$matchedYa++;
				}
				else
				{
					$terpenuhi = false;
				}
			}

			$persenKecocokan = ($matchedYa / $totalRuleGejala) * 100;

			$evaluasi[] = [
				'rule_id' => $rule->rule_id,
				'risiko' => $rule,
				'persen' => $persenKecocokan,
				'total_gejala_rule' => $totalRuleGejala,
				'matched_ya' => $matchedYa,
				'fulfilled' => $terpenuhi
			];
		}

		if (empty($evaluasi))
		{
			return null;
		}

		$rulesTerpenuhi = array_values(array_filter($evaluasi, function ($item)
		{
			return $item['fulfilled'] === true;
		}));

		if (!empty($rulesTerpenuhi))
		{
			usort($rulesTerpenuhi, function ($a, $b)
			{
				if ((int) $a['risiko']->level !== (int) $b['risiko']->level)
				{
					return (int) $b['risiko']->level <=> (int) $a['risiko']->level;
				}

				if ((int) $a['total_gejala_rule'] !== (int) $b['total_gejala_rule'])
				{
					return (int) $b['total_gejala_rule'] <=> (int) $a['total_gejala_rule'];
				}

				return (int) $a['rule_id'] <=> (int) $b['rule_id'];
			});

			return $rulesTerpenuhi[0];
		}

		usort($evaluasi, function ($a, $b)
		{
			if ((float) $a['persen'] !== (float) $b['persen'])
			{
				return (float) $b['persen'] <=> (float) $a['persen'];
			}

			if ((int) $a['matched_ya'] !== (int) $b['matched_ya'])
			{
				return (int) $b['matched_ya'] <=> (int) $a['matched_ya'];
			}

			if ((int) $a['risiko']->level !== (int) $b['risiko']->level)
			{
				return (int) $b['risiko']->level <=> (int) $a['risiko']->level;
			}

			return (int) $a['rule_id'] <=> (int) $b['rule_id'];
		});

		return $evaluasi[0];
	}

	private function buildDiagnosaViewData($id)
	{
		$diagnosa = $this->db
			->select('diagnosa.*, risiko.name, risiko.level, risiko.deskripsi, risiko.saran')
			->join('risiko', 'risiko.id = diagnosa.risiko_id')
			->where('diagnosa.id', $id)
			// ->where('diagnosa.user_id', (int) $this->session->userdata('id'))
			->get('diagnosa')
			->row();

		if (!$diagnosa)
		{
			show_404();
			exit;
		}

		$users = $this->db
			->where('id', $diagnosa->user_id)
			->get('users')
			->row();

		$head_name = 'Hasil deteksi dini';
		$message = 'Hasil deteksi dini berhasil dihitung.';

		switch ($diagnosa->level)
		{
			case 1:
				$icon = 'alert-success.png';
				$class = 'btn-success';
				$head_name = 'Tidak Terindikasi Risiko';
				$message = 'Berdasarkan jawaban Anda, tidak ditemukan indikasi risiko tumor payudara saat ini. Tetap jaga pola hidup sehat.';
				break;
			case 2:
				$icon = 'alert-warning.png';
				$class = 'btn-warning';
				$head_name = 'Terindikasi Risiko';
				$message = 'Anda memiliki indikasi risiko sedang dan disarankan untuk lebih waspada.';
				break;
			case 3:
				$icon = 'alert-danger.png';
				$class = 'btn-danger';
				$head_name = 'Terindikasi Risiko Tinggi';
				$message = 'Anda memiliki indikasi risiko tinggi dan perlu segera melakukan pemeriksaan lanjutan.';
				break;
			default:
				$icon = 'alert-warning.png';
				$class = 'btn-warning';
				break;
		}

		return [
			'diagnosa' => $diagnosa,
			'icon' => $icon,
			'class' => $class,
			'message' => $message,
			'head_name' => $head_name,
			'users' => $users
		];
	}
}
