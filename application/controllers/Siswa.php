<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		// $this->load->model('Auth_model');
		$this->load->model('Kelas_model');
		$this->load->model('Anggota_model');
		$this->load->model('Profil_model');
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

		$data['title'] = 'Dashboard Siswa';
		$data['kelas'] = $this->Kelas_model->getKelasSiswa($data['user']['id']);
		$data['ujian'] = $this->Ujian_model->getUjianKelasSiswa($data['user']['id']);

		$this->load->view('templates/siswa_header', $data);
		$this->load->view('siswa/home/index', $data);
		$this->load->view('templates/siswa_footer');
	}

	public function profil($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Profil Siswa';
		$data['profil'] = $this->Profil_model->getProfilSiswaById($id);
		$this->load->view('templates/siswa_header', $data);
		$this->load->view('siswa/profil/index', $data);
		$this->load->view('templates/siswa_footer');
	}

	public function getubahprofil($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Ubah Profil Siswa';
		$data['profil'] = $this->Profil_model->getProfilSiswaById($id);
		$this->load->view('templates/siswa_header', $data);
		$this->load->view('siswa/profil/ubah', $data);
		$this->load->view('templates/siswa_footer');
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
			redirect('siswa/profil/' . $id);
		}
	}


	public function getubahpassword($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Ubah Password';
		$data['profil'] = $this->Profil_model->getUserSiswaById($id);
		$this->load->view('templates/siswa_header', $data);
		$this->load->view('siswa/profil/ubahpassword', $data);
		$this->load->view('templates/siswa_footer');
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
			$this->session->set_flashdata('error', 'Password lama salah');
			return $this->getubahpassword($id);
		}
	}

	public function kelas()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Kelas';
		$data['kelas'] = $this->Kelas_model->getKelasSiswa($data['user']['id']);
		// $data['d'] = $this->Kelas_model->getKelasDanGuruById($data['kelas']['id_kelas']);
		$this->load->view('templates/siswa_header', $data);
		$this->load->view('siswa/kelas/index', $data);
		$this->load->view('templates/siswa_footer');
	}




	public function kelas_dashboard($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Dashboard Kelas';
		$kelas['kelas'] = $this->Kelas_model->getKelasSiswa($data['user']['id']);
		$data['kelasId'] = $this->Kelas_model->getKelasSiswaById($id);
		$data['ujian'] = $this->Ujian_model->getUjianByKelas($id);


		$this->load->view('templates/siswa_header', $data);
		$this->load->view('templates/kelas_sidebar_siswa', $kelas, $data);
		$this->load->view('siswa/kelas/dashboard', $kelas, $data);
		$this->load->view('templates/siswa_footer');
	}

	public function gabungkelas()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$kode_kelas = $this->input->post('kode_kelas');

		$query = $this->db->get_where('kelas', ['kode_kelas' => $kode_kelas])->row_array();
		if (count($query) > 0) {
			$array = [
				'id_user_siswa' => $data['user']['id'],
				'id_kelas' => $query['id_kelas']
			];
			$cek = $this->db->get_where('kelas-siswa', ['id_user_siswa' => $array['id_user_siswa'], 'id_kelas' => $array['id_kelas']])->row_array();
			if (count($cek) < 1) {
				$this->db->insert('kelas-siswa', $array);
				$this->session->set_flashdata('message', 'bergabung');
				redirect('siswa/kelas');
			} else {
				$this->session->set_flashdata('error', 'Anda Sudah bergabung');
				redirect('siswa/kelas');
			}
		} else {
			$this->session->set_flashdata('error', 'Kode Kelas tidak sesuai dengan kelas manapun');
			redirect('siswa/kelas');
		}
	}

	public function keluarkelas($id_kelas)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$id_user = $data['user']['id'];
		if (true) {
			$this->Kelas_model->keluar($id_user, $id_kelas);
			$this->session->set_flashdata('message', 'keluar');
		} else {
			$this->session->set_flashdata('error', 'Anda Batal keluar');
		}
		redirect('siswa/kelas');
	}

	public function anggota($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Anggota Kelas';
		$data['kelas'] = $this->Kelas_model->getKelasById($id);
		$data['anggota'] = $this->Anggota_model->getAnggotaKelas($id);
		$this->load->view('templates/siswa_header', $data);
		$this->load->view('siswa/kelas/anggota', $data, $data);
		$this->load->view('templates/siswa_footer');
	}

	public function getdataanggota()
	{
		echo json_encode($this->Anggota_model->getDataANggotaByNis($_POST['nis']));
	}

	public function ujian($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Ujian';
		$data['kelas'] = $this->Kelas_model->getKelasById($id);
		$data['ujian'] = $this->Ujian_model->getUjianByKelas($id);
		$this->load->view('templates/siswa_header', $data);
		$this->load->view('siswa/kelas/ujian/index', $data);
		$this->load->view('templates/siswa_footer');
	}

	public function token($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$id_user = $data['user']['id'];

		$data['title'] = 'Detail Ujian';
		$data['siswa'] = $this->Ujian_model->getIdSiswa($id_user);
		$data['ujian'] = $this->Ujian_model->getUjian($id);
		$this->load->view('templates/topnav/_header', $data);
		$this->load->view('siswa/kelas/ujian/token');
		$this->load->view('templates/topnav/_footer');
	}

	public function cektoken()
	{
		$id = $_POST['id_ujian'];
		$token = $_POST['token'];
		$cek = $this->Ujian_model->getUjian($id);

		$data['status'] = $token == $cek->kd_ujian ? true : false;
		$this->output_json($data);
	}

	public function hasilujian($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$h_ujian = $this->Ujian_model->HasilUjianSiswa($id, $data['user']['id']);

		$list_jawaban = explode(',', $h_ujian->list_jawaban);

		for ($i = 0; $i < sizeof($list_jawaban); $i++) {
			$soal = explode(":", $list_jawaban[$i]);
			$soal1 = empty($soal[1]) ? "''" : "'{$soal[1]}'";
			$ambil_soal = $this->Ujian_model->ambilSoalForHasil($soal[0]);
			$soal_ok[] = $ambil_soal;
			$jwb_ok[] = $soal[1];
		}

		// var_dump($list_jawaban);
		// echo '<hr>';
		// var_dump($soal_ok);
		// echo '<hr>';
		// var_dump($jwb_ok);

		// die;
		$data['title'] = 'Hasil Ujian';
		$data['ujian'] = $this->Ujian_model->getUjian($id);
		$data['hasil'] = $h_ujian;
		$data['soal'] = $soal_ok;
		$data['jwb'] = $jwb_ok;

		$this->load->view('templates/siswa_header', $data);
		$this->load->view('siswa/kelas/ujian/hasil', $data);
		$this->load->view('templates/siswa_footer');
	}
}
