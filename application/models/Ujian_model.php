<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ujian_model extends CI_Model
{
	public function getAllUjian()
	{
		$this->db->select('*')
			->from('ujian')
			->join('kelas', 'ujian.id_kelas = kelas.id_kelas')
			->join('tb_karyawan', 'ujian.id_guru = tb_karyawan.id_guru');
		return $this->db->get()->result_array();
	}

	public function getUjianKelasGuru($id)
	{
		$this->db->select('*')
			->from('user')
			->join('tb_karyawan', 'user.no_induk = tb_karyawan.nomor_induk', 'user.email = tb_karyawan.email')
			->join('ujian', 'tb_karyawan.id_guru = ujian.id_guru')
			->join('kelas', 'kelas.id_kelas = ujian.id_kelas')
			->where('user.id', $id)
			->order_by('ujian.tgl_mulai DESC');
		return $this->db->get()->result_array();
	}

	// halaman siswa
	public function getUjianKelasSiswa($id)
	{
		$this->db->select('*')
			->from('kelas-siswa')
			->join('kelas', 'kelas.id_kelas = kelas-siswa.id_kelas')
			->join('ujian', 'ujian.id_kelas = kelas-siswa.id_kelas')
			->join('tb_karyawan', 'tb_karyawan.id_guru = ujian.id_guru')
			->where('kelas-siswa.id_user_siswa', $id)
			->order_by('ujian.tgl_mulai DESC');
		return $this->db->get()->result_array();
	}

	public function getUjianByKelas($id_kelas)
	{
		$this->db->select("ujian.*, kelas.id_kelas, kelas.nama_kelas, kelas.mapel, tb_karyawan.id_guru, tb_karyawan.nama")
			->from('ujian')
			->join('kelas', 'ujian.id_kelas = kelas.id_kelas')
			->join('tb_karyawan', 'tb_karyawan.id_guru = ujian.id_guru')
			->where('ujian.id_kelas', $id_kelas)
			->order_by('ujian.tgl_mulai DESC');
		return $this->db->get()->result_array();
	}

	public function getUjianById($id)
	{
		$this->db->select('*')
			->from('ujian')
			->where('id_ujian', $id);
		return $this->db->get()->row_array();
	}

	public function getUjianByIdUjian($id)
	{
		$this->db->select('*')
			->from('ujian')
			->where('id_ujian', $id);
		return $this->db->get()->row();
	}

	public function getUjian($id)
	{
		$this->db->select('*');
		$this->db->from('ujian a');
		$this->db->join('tb_karyawan b', 'a.id_guru=b.id_guru');
		$this->db->join('kelas c', 'a.id_kelas=c.id_kelas');
		$this->db->where('a.id_ujian', $id);
		return $this->db->get()->row();
	}

	// mengambil data siswa
	public function getIdSiswa($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('kelas-siswa', 'user.id=kelas-siswa.id_user_siswa');
		$this->db->join('kelas', 'kelas-siswa.id_kelas=kelas.id_kelas');
		$this->db->where('user.id', $id);
		return $this->db->get()->row();
	}

	public function tambah()
	{
		$this->load->helper('string');

		$list_bank = "";
		$list_jml_soal = "";

		$id_kelas = $this->input->post('id_kelas');
		$jenis = $this->input->post('jenis', true);


		if ($jenis == "acak per bab") {
			$bank = $this->db->get_where('banksoal', ['id_kelas' => $id_kelas])->result_array();

			if (!empty($bank)) {
				$jml_soal = 0;
				for ($m = 1; $m <= count($bank); $m++) {
					$list_bank .= $this->input->post('id_bank_' . $m) . ",";
					$list_jml_soal .= $this->input->post('jml_' . $m) . ",";
					$jml_soal  += $this->input->post('jml_' . $m);
				}
			}
			$jml_tot = $jml_soal;

			$list_bank = substr($list_bank, 0, -1);
			$list_jml_soal = substr($list_jml_soal, 0, -1);

			$data = [
				'id_kelas' => $id_kelas,
				'id_guru' => $this->input->post('id_guru'),
				'nama_ujian' => htmlspecialchars($this->input->post('ujian', true)),
				'petunjuk' => htmlspecialchars($this->input->post('petunjuk', true)),
				'jml_soal' => $jml_tot,
				'jenis' => htmlspecialchars($this->input->post('jenis', true)),
				'list_bank' => $list_bank,
				'list_jml_soal' => $list_jml_soal,
				'waktu' => htmlspecialchars($this->input->post('bts_waktu', true)),
				'tgl_mulai' => htmlspecialchars($this->input->post('tgl_mulai', true)),
				'tgl_akhir' => htmlspecialchars($this->input->post('tgl_akhir', true)),
				'kd_ujian' => strtoupper(random_string('alpha', 5)),
				'date_created' => time(),
			];
		} else {
			$data = [
				'id_kelas' => $id_kelas,
				'id_guru' => $this->input->post('id_guru'),
				'nama_ujian' => htmlspecialchars($this->input->post('ujian', true)),
				'petunjuk' => htmlspecialchars($this->input->post('petunjuk', true)),
				'jml_soal' => htmlspecialchars($this->input->post('jml_soal', true)),
				'jenis' => $jenis,
				'list_bank' => $list_bank,
				'list_jml_soal' => $list_jml_soal,
				'waktu' => htmlspecialchars($this->input->post('bts_waktu', true)),
				'tgl_mulai' => htmlspecialchars($this->input->post('tgl_mulai', true)),
				'tgl_akhir' => htmlspecialchars($this->input->post('tgl_akhir', true)),
				'kd_ujian' => strtoupper(random_string('alpha', 5)),
				'date_created' => time(),
			];
		}
		$this->db->insert('ujian', $data);
	}

	public function ubah()
	{
		$id_ujian = $this->input->post('id_ujian');
		$id_kelas = $this->input->post('id_kelas');

		$jenis = $this->input->post('jenis', true);

		$this->load->helper('string');
		$list_bank = "";
		$list_jml_soal = "";

		if ($jenis == "acak per bab") {
			$bank = $this->db->get_where('banksoal', ['id_kelas' => $id_kelas])->result_array();

			if (!empty($bank)) {
				$jml_soal = 0;
				for ($m = 1; $m <= count($bank); $m++) {
					$list_bank .= $this->input->post('id_bank_' . $m) . ",";
					$list_jml_soal .= $this->input->post('jml_' . $m) . ",";
					$jml_soal  += $this->input->post('jml_' . $m);
				}
			}
			$jml_tot = $jml_soal;

			$list_bank = substr($list_bank, 0, -1);
			$list_jml_soal = substr($list_jml_soal, 0, -1);

			$data = [
				'nama_ujian' => htmlspecialchars($this->input->post('ujian', true)),
				'petunjuk' => htmlspecialchars($this->input->post('petunjuk', true)),
				'jml_soal' => $jml_tot,
				'jenis' => htmlspecialchars($this->input->post('jenis', true)),
				'list_bank' => $list_bank,
				'list_jml_soal' => $list_jml_soal,
				'waktu' => htmlspecialchars($this->input->post('bts_waktu', true)),
				'tgl_mulai' => htmlspecialchars($this->input->post('tgl_mulai', true)),
				'tgl_akhir' => htmlspecialchars($this->input->post('tgl_akhir', true)),
			];
		} else {
			$data = [
				'nama_ujian' => htmlspecialchars($this->input->post('ujian', true)),
				'petunjuk' => htmlspecialchars($this->input->post('petunjuk', true)),
				'jml_soal' => htmlspecialchars($this->input->post('jml_soal', true)),
				'jenis' => $jenis,
				'list_bank' => $list_bank,
				'list_jml_soal' => $list_jml_soal,
				'waktu' => htmlspecialchars($this->input->post('bts_waktu', true)),
				'tgl_mulai' => htmlspecialchars($this->input->post('tgl_mulai', true)),
				'tgl_akhir' => htmlspecialchars($this->input->post('tgl_akhir', true)),
			];
		}
		$this->db->update('ujian', $data, array('id_ujian' => $id_ujian));
	}

	public function hapus($id)
	{
		$this->db->delete('ujian', ['id_ujian' => $id]);
	}

	public function getJumlahSoal($kelas)
	{
		$this->db->select('COUNT(id_soal) as jml_soal')
			->from('soal')
			->where('id_kelas', $kelas);
		return $this->db->get()->row();
	}

	public function getJumlahSoalPerBank($id_bank)
	{
		$this->db->select('COUNT(id_soal) as jml_soal_bank')
			->from('soal')
			->where('id_bank', $id_bank);
		return $this->db->get()->row();
	}

	public function getSoal($id)
	{
		$ujian = $this->getUjianByIdUjian($id);
		$order = $ujian->jenis === "acak" ? 'rand()' : 'id_soal';

		$this->db->select('id_soal, soal, file, opsi_a, opsi_b, opsi_c, opsi_d, jawaban');
		$this->db->from('soal');
		$this->db->where('id_kelas', $ujian->id_kelas);
		$this->db->order_by($order);
		$this->db->limit($ujian->jml_soal);
		return $this->db->get()->result();
	}

	public function getIdBankFromUjian($id)
	{
		$ujian = $this->getUjianByIdUjian($id);
		$this->db->select("id_bank")
			->from('soal')
			->where('id_kelas', $ujian->id_kelas)
			->group_by('id_bank');
		return $this->db->get()->result_array();
	}

	public function getSoalByBank($id_bank, $jml)
	{

		$this->db->select("a.id_soal, a.soal, a.file, a.opsi_a, a.opsi_b, a.opsi_c, a.opsi_d, a.jawaban, b.*");
		$this->db->from('soal a');
		$this->db->join('banksoal b', "a.id_bank = b.id");
		$this->db->where('a.id_bank', $id_bank);
		$this->db->order_by('a.id_soal', 'random');
		$this->db->limit($jml);
		return $this->db->get()->result_array();
	}

	public function ambilSoal($pc_urut_soal1, $pc_urut_soal_arr)
	{
		$this->db->select("*, {$pc_urut_soal1} AS jawaban");
		$this->db->from('soal');
		$this->db->join('banksoal', "soal.id_bank = banksoal.id");
		$this->db->where('id_soal', $pc_urut_soal_arr);
		return $this->db->get()->row();
	}
	public function ambilSoalForHasil($pc_urut_soal_arr)
	{
		$this->db->select("*");
		$this->db->from('soal');
		$this->db->join('banksoal', "soal.id_bank = banksoal.id");
		$this->db->where('id_soal', $pc_urut_soal_arr);
		return $this->db->get()->row();
	}

	public function getJawaban($id_tes)
	{
		$this->db->select('list_jawaban');
		$this->db->from('h_ujian');
		$this->db->where('id_h', $id_tes);
		return $this->db->get()->row()->list_jawaban;
	}

	public function HasilUjian($id, $user, $siswa)
	{
		$this->db->select('*, UNIX_TIMESTAMP(tgl_selesai) as waktu_habis');
		$this->db->from('h_ujian');
		$this->db->where('id_ujian', $id);
		$this->db->where('id_user', $user);
		$this->db->where('id_siswa', $siswa);
		return $this->db->get();
	}

	public function HasilUjianSiswa($id, $id_user)
	{
		$this->db->select('*');
		$this->db->from('h_ujian a');
		$this->db->where(['a.id_ujian' => $id, 'a.id_user' => $id_user]);
		return $this->db->get()->row();
	}

	public function HasilUjianSiswaG($id)
	{
		$this->db->select("a.*, b.id_siswa, b.nama, b.no_induk, b.email");
		$this->db->from('h_ujian a');
		$this->db->join('tb_siswa b', 'b.id_siswa = a.id_siswa');
		$this->db->where('a.id_ujian', $id);
		return $this->db->get()->result();
	}


	public function bandingNilai($id)
	{
		$this->db->select_min('nilai', 'min_nilai');
		$this->db->select_max('nilai', 'max_nilai');
		$this->db->select_avg('FORMAT(FLOOR(nilai),0)', 'avg_nilai');
		$this->db->where('id_ujian', $id);
		return $this->db->get('h_ujian')->row();
	}
}
