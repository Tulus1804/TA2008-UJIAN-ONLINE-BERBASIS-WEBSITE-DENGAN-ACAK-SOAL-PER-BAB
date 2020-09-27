<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Soal_model extends CI_Model
{
	public function file_config()
	{
		$allowed_type     = [
			"image/jpeg", "image/jpg", "image/png", "image/gif",
			"audio/mpeg", "audio/mpg", "audio/mpeg3", "audio/mp3", "audio/x-wav", "audio/wave", "audio/wav",
			"video/mp4", "application/octet-stream"
		];
		$config['upload_path']      = FCPATH . 'uploads/bank_soal/';
		$config['allowed_types']    = 'jpeg|jpg|png|gif|mpeg|mpg|mpeg3|mp3|wav|wave|mp4';
		$config['encrypt_name']     = TRUE;

		return $this->load->library('upload', $config);
	}

	private function uploadFile()
	{
		$config['upload_path']          = './uploads/soal/';
		$config['allowed_types']        = 'gif|jpg|png|mp3|wav|wave|mp4';
		$config['file_name']            = time();
		$config['overwrite']            = true;
		$config['max_size']             = 10000; // 10MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file')) {
			return $this->upload->data('file_name');
		}

		return "";
	}

	public function tambah()
	{
		$data = [
			'id_bank' => $this->input->post('id_bank'),
			'id_kelas' => $this->input->post('id_kelas'),
			'file' => $this->uploadFile(),
			'soal' => htmlspecialchars($this->input->post('soal', true)),
			'jawaban' => $this->input->post('jawaban', true),
			'bobot' => htmlspecialchars($this->input->post('bobot', true)),
			'opsi_a' => htmlspecialchars($this->input->post('pil_a', true)),
			'opsi_b' => htmlspecialchars($this->input->post('pil_b', true)),
			'opsi_c' => htmlspecialchars($this->input->post('pil_c', true)),
			'opsi_d' => htmlspecialchars($this->input->post('pil_d', true)),
			'opsi_e' => htmlspecialchars($this->input->post('pil_e', true)),
			'date_created' => time()
		];
		$this->db->insert('soal', $data);
	}

	public function ubah()
	{
		$id_soal = $this->input->post('id_soal');

		if (!empty($_FILES['file']['name'])) {
			$file = $this->uploadFile();
		} else {
			$file = $this->input->post('file_lama');
		}
		$data = [
			'file' => $file,
			'soal' => htmlspecialchars($this->input->post('soal', true)),
			'jawaban' => $this->input->post('jawaban', true),
			'bobot' => htmlspecialchars($this->input->post('bobot', true)),
			'opsi_a' => htmlspecialchars($this->input->post('pil_a', true)),
			'opsi_b' => htmlspecialchars($this->input->post('pil_b', true)),
			'opsi_c' => htmlspecialchars($this->input->post('pil_c', true)),
			'opsi_d' => htmlspecialchars($this->input->post('pil_d', true)),
			'opsi_e' => htmlspecialchars($this->input->post('pil_e', true)),
			'date_updated' => time()
		];
		$this->db->update('soal', $data, array('id_soal' => $id_soal));
	}

	public function hapus($id)
	{
		$this->db->delete('soal', ['id_soal' => $id]);
	}

	public function getAllSoalByIdBanksoal($id)
	{
		$this->db->select('*')
			->from('soal')
			->where('id_bank', $id);
		return $this->db->get()->result_array();
	}

	public function getSoalById($id)
	{
		$this->db->select('*')
			->from('soal')
			->where('id_soal', $id);
		return $this->db->get()->row_array();
	}

	public function getSoalByIdSoal($id)
	{
		return $this->db->get_where('soal', ['id_soal' => $id])->row();
	}

	public function getIdBankFromSoal($id_kelas)
	{
		$this->db->select("id_bank")
			->from('soal')
			->where('id_kelas', $id_kelas)
			->group_by('id_bank');
		return $this->db->get()->result_array();
	}
}
