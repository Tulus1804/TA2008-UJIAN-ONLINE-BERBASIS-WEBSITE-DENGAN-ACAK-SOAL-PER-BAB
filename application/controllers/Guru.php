<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('Kelas_model');
		$this->load->model('Banksoal_model');
		$this->load->model('Profil_model');
		$this->load->model('Anggota_model');
		$this->load->model('Soal_model');
		$this->load->model('Ujian_model');

		$this->load->helper('typography');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Dashboard Guru';
		$data['kelas'] = $this->Kelas_model->getAllKelas();
		$data['ujian'] = $this->Ujian_model->getUjianKelasGuru($data['user']['id']);


		$this->load->view('templates/header', $data);
		$this->load->view('guru/home/index', $data);
		$this->load->view('templates/footer');
	}

	public function profil($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Profil Guru';
		$data['profil'] = $this->Profil_model->getProfilGuruById($id);
		$this->load->view('templates/header', $data);
		$this->load->view('guru/profil/index', $data);
		$this->load->view('templates/footer');
	}

	public function getubahprofil($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Ubah Profil Guru';
		$data['profil'] = $this->Profil_model->getProfilGuruById($id);
		$this->load->view('templates/header', $data);
		$this->load->view('guru/profil/ubah', $data);
		$this->load->view('templates/footer');
	}

	public function ubahprofil($id)
	{
		$this->form_validation->set_rules('no_induk', 'No induk', 'required|trim|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

		if ($this->form_validation->run() == false) {
			return $this->getubahprofil($id);
		} else {
			$this->Profil_model->ubahprofil($_POST);
			$this->session->set_flashdata('message', 'diubah');
			redirect('guru/profil/' . $id);
		}
	}


	public function getubahpassword($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Ubah Profil Guru';
		$data['profil'] = $this->Profil_model->getUserGuruById($id);
		$this->load->view('templates/header', $data);
		$this->load->view('guru/profil/ubahpassword', $data);
		$this->load->view('templates/footer');
	}
	public function ubahpassword($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$pass_lama = $this->input->post('pass_lama');

		if (password_verify($pass_lama, $data['user']['password'])) {
			$this->form_validation->set_rules('pass1', 'Password', 'required|trim|matches[pass2]', [
				'matches' => 'Password dont match!'
			]);
			$this->form_validation->set_rules('pass2', 'Password', 'required|trim|matches[pass1]');

			if ($this->form_validation->run() == FALSE) {
				return $this->getubahpassword($id);
			} else {
				$this->Profil_model->ubahpassword($_POST);
				$this->session->set_flashdata('message', 'diubah');
				return $this->getubahpassword($id);
			}
		} else {
			$this->session->set_flashdata('error', 'Password lama salah!');
			return $this->getubahpassword($id);
		}
	}

	public function kelas()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Kelas';
		$data['kelas'] = $this->Kelas_model->getAllKelas();
		$this->load->view('templates/header', $data);
		$this->load->view('guru/kelas/index', $data);
		$this->load->view('templates/footer');
	}

	public function kelas_dashboard($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Dashboard Kelas';
		$kelas['kelas'] = $this->Kelas_model->getAllKelas();
		$data['kelasId'] = $this->Kelas_model->getKelasById($id);
		$data['ujian'] = $this->Ujian_model->getUjianByKelas($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/kelas_sidebar', $kelas, $data);
		$this->load->view('guru/kelas/dashboard', $kelas, $data);
		$this->load->view('templates/footer');
	}

	public function refresh_kdkelas($id)

	{
		$this->load->helper('string');
		$data['kd_kelas'] = random_string('alpha', 5);
		$refresh = $this->db->update('kelas', $data, array('id_kelas' => $id));
		$data['status'] = $refresh ? TRUE : FALSE;
		$this->output_json($data);
	}

	public function tambahKelas()
	{
		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|trim');
		$this->form_validation->set_rules('mapel', 'Mapel', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

		if ($this->form_validation->run() == false) {
			return $this->kelas();
		} else {
			$this->Kelas_model->tambahKelas();
			$this->session->set_flashdata('message', 'ditambahkan');
			redirect('guru/kelas');
		}
	}

	public function getubahkelas()
	{
		echo json_encode($this->Kelas_model->getKelasById($_POST['id_kelas']));
	}

	public function ubahKelas()
	{
		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|trim');
		$this->form_validation->set_rules('mapel', 'Mapel', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

		if ($this->form_validation->run() == false) {
			return $this->kelas();
		} else {
			$this->Kelas_model->ubahKelas($_POST);
			$this->session->set_flashdata('message', 'diubah');
			redirect('guru/kelas');
		}
	}


	public function hapusKelas($id)
	{
		$this->Kelas_model->hapusKelas($id);
		$this->session->set_flashdata('message', 'dihapus');
		redirect('guru/kelas');
	}

	public function banksoal($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Banksoal';
		$data['kelas'] = $this->Kelas_model->getKelasById($id);
		$data['banksoal'] = $this->Banksoal_model->getAllBanksoal($id);
		$this->load->view('templates/header', $data);
		$this->load->view('guru/kelas/banksoal', $data, $data);
		$this->load->view('templates/footer');
	}

	public function detailBanksoal($id, $id_kelas)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Banksoal';
		$data['kelas'] = $this->Kelas_model->getKelasById($id_kelas);
		$data['banksoal'] = $this->Banksoal_model->getBanksoalById($id);
		$data['soal'] = $this->Soal_model->getAllSoalByIdBanksoal($id);
		$this->load->view('templates/header', $data);
		$this->load->view('guru/kelas/detailbanksoal', $data, $data);
		$this->load->view('templates/footer');
	}

	public function tambahBanksoal($id)
	{
		$this->form_validation->set_rules('banksoal', 'Banksoal', 'required|trim');
		if ($this->form_validation->run() == false) {
			return $this->banksoal($id);
		} else {
			$this->Banksoal_model->tambahBanksoal($id);
			$this->session->set_flashdata('message', 'ditambahkan');
			redirect('guru/banksoal/' . $id);
		}
	}

	public function getubahbanksoal()
	{
		echo json_encode($this->Banksoal_model->getBanksoalById($_POST['id_bank']));
	}

	public function ubahBanksoal($id)
	{
		$this->form_validation->set_rules('bs', 'Banksoal', 'required|trim');
		if ($this->form_validation->run() == false) {
			return $this->banksoal($id);
		} else {
			$this->Banksoal_model->ubahBanksoal();
			$this->session->set_flashdata('message', 'diubah');
			redirect('guru/banksoal/' . $id);
		}
	}


	public function hapusBanksoal($id, $id_kelas)
	{
		$this->Banksoal_model->hapusBanksoal($id, $id_kelas);
		$this->session->set_flashdata('message', 'dihapus');
		redirect('guru/banksoal/' . $id_kelas);
	}

	public function anggota($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Anggota Kelas';
		$data['kelas'] = $this->Kelas_model->getKelasById($id);
		$data['anggota'] = $this->Anggota_model->getAnggotaKelas($id);
		$this->load->view('templates/header', $data);
		$this->load->view('guru/kelas/anggota', $data, $data);
		$this->load->view('templates/footer');
	}

	public function getdataanggota()
	{
		echo json_encode($this->Anggota_model->getDataANggotaByNis($_POST['nis']));
	}

	public function hapusanggota($id, $id_kelas)
	{
		$this->Anggota_model->hapusAnggota($id, $id_kelas);
		$this->session->set_flashdata('message', 'dihapus');
		redirect('guru/anggota/' . $id_kelas);
	}


	// soal

	public function tambahsoal($id, $id_kelas)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('bobot', 'Bobot soal', 'required|trim|numeric|max_length[2]');


		if ($this->form_validation->run() == false) {
			return $this->detailBanksoal($id, $id_kelas);
		} else {

			$this->Soal_model->tambah();
			$this->session->set_flashdata('message', 'ditambahkan');
			redirect('guru/detailbanksoal/' . $id . '/' . $id_kelas);
		}
	}

	public function hapussoal($id, $id_bank, $id_kelas)
	{
		$this->Soal_model->hapus($id);
		$this->session->set_flashdata('message', 'dihapus');
		redirect('guru/detailbanksoal/' . $id_bank . '/' . $id_kelas);
	}

	public function getdatasoal()
	{
		echo json_encode($this->Soal_model->getSoalById($_POST['id_soal']));
	}

	public function getubahsoal()
	{
		echo json_encode($this->Soal_model->getSoalById($_POST['id_soal']));
	}

	public function ubahsoal($id_bank, $id_kelas)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('bobot', 'Bobot soal', 'required|trim|numeric');

		if ($this->form_validation->run() == false) {
			return $this->detailBanksoal($id_bank, $id_kelas);
		} else {
			$this->Soal_model->ubah();
			$this->session->set_flashdata('message', 'diubah');
			redirect('guru/detailbanksoal/' . $id_bank . '/' . $id_kelas);
		}
	}

	public function ujian($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Ujian';
		$data['kelas'] = $this->Kelas_model->getKelasById($id);
		$data['ujian'] = $this->Ujian_model->getUjianByKelas($id);
		$this->load->view('templates/header', $data);
		$this->load->view('guru/kelas/ujian/index', $data);
		$this->load->view('templates/footer');
	}

	public function getdataujian()
	{
		echo json_encode($this->Ujian_model->getUjian($_POST['id_ujian']));
	}

	public function hapusujian($id, $id_kelas)
	{
		$this->Ujian_model->hapus($id);
		$this->session->set_flashdata('message', 'dihapus');
		redirect('guru/ujian/' . $id_kelas);
	}

	public function tambahujian($id_kelas)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$jml     = $this->Ujian_model->getJumlahSoal($id_kelas)->jml_soal;
		$jml_a     = $jml + 1;

		$this->form_validation->set_rules('bts_waktu', 'Batas Waktu', 'required|trim|numeric|greater_than[15]', [
			'greater_than' => 'Batas waktu harus lebih dari 15 menit'
		]);
		$this->form_validation->set_rules('jml_soal', 'Jumlah Soal', "integer|less_than[{$jml_a}]", ['less_than' => "Soal tidak cukup, anda hanya punya {$jml} soal"]);
		$this->form_validation->set_rules('jenis', 'Jenis Soal', 'required');

		// banksoal
		$bank = $this->db->get_where('banksoal', ['id_kelas' => $id_kelas])->result_array();
		for ($m = 0; $m < count($bank); $m++) {
			$jml_bank = $bank[$m]['id'];
			$b[$m] = $jml_bank;
		}

		for ($m = 0; $m < count($b); $m++) {
			$jumlah = $this->Ujian_model->getJumlahSoalPerBank($b[$m])->jml_soal_bank;
			$spb[$m] = $jumlah;
		}
		if (!empty($spb)) {
			$no = 1;
			foreach ($spb as $j) {
				$i = $j + 1;
				$this->form_validation->set_rules('jml_' . $no . '', 'Jumlah Soal', "integer|less_than[{$i}]", ['less_than' => "Soal tidak cukup, anda hanya punya {$j} soal"]);
				$no++;
			}
		}
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->run();




		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Ujian';
			$data['kelas'] = $this->Kelas_model->getKelasDanGuruById($id_kelas);
			$data['bank'] = $bank;
			$this->load->view('templates/header', $data);
			$this->load->view('guru/kelas/ujian/tambah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Ujian_model->tambah();
			$this->session->set_flashdata('message', 'ditambahkan');
			redirect('guru/ujian/' . $id_kelas);
		}
	}

	public function ubahujian($id_ujian, $id_kelas)
	{

		$jml     = $this->Ujian_model->getJumlahSoal($this->input->post('id_kelas'))->jml_soal;
		$jml_a     = $jml + 1;

		$this->form_validation->set_rules('bts_waktu', 'Batas Waktu', 'required|trim|numeric|greater_than[15]', [
			'greater_than' => 'Batas waktu harus lebih dari 15 menit'
		]);
		$this->form_validation->set_rules('jml_soal', 'Jumlah Soal', "required|integer|less_than[{$jml_a}]|greater_than[0]", ['less_than' => "Soal tidak cukup, anda hanya punya {$jml} soal"]);
		$this->form_validation->set_rules('jenis', 'Jenis Soal', 'required');

		// banksoal
		$bank = $this->db->get_where('banksoal', ['id_kelas' => $id_kelas])->result_array();
		for ($m = 0; $m < count($bank); $m++) {
			$jml_bank = $bank[$m]['id'];
			$b[$m] = $jml_bank;
		}

		for ($m = 0; $m < count($b); $m++) {
			$jumlah = $this->Ujian_model->getJumlahSoalPerBank($b[$m])->jml_soal_bank;
			$spb[$m] = $jumlah;
		}
		if (!empty($spb)) {
			$no = 1;
			foreach ($spb as $j) {
				$i = $j + 1;
				$this->form_validation->set_rules('jml_' . $no . '', 'Jumlah Soal', "integer|less_than[{$i}]", ['less_than' => "Soal tidak cukup, anda hanya punya {$j} soal"]);
				$no++;
			}
		}

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->run();

		if ($this->form_validation->run() == false) {
			$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();

			$data['title'] = 'Ubah Ujian';
			$data['ujian'] = $this->Ujian_model->getUjianById($id_ujian);
			$data['kelas'] = $this->Kelas_model->getKelasDanGuruById($id_kelas);
			$data['bank'] = $bank;
			$this->load->view('templates/header', $data);
			$this->load->view('guru/kelas/ujian/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Ujian_model->ubah();
			$this->session->set_flashdata('message', 'diubah');
			redirect('guru/ujian/' . $this->input->post('id_kelas'));
		}
	}

	public function hasilujian($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Hasil Ujian';
		$data['ujian'] = $this->Ujian_model->getUjian($id);
		$data['hasil'] = $this->Ujian_model->bandingNilai($id);
		$data['h'] = $this->Ujian_model->HasilUjianSiswaG($id);

		$this->load->view('templates/header', $data);
		$this->load->view('guru/kelas/ujian/hasil_ujian', $data);
		$this->load->view('templates/footer');
	}
}
