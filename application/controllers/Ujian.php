<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}

		$this->load->model('Kelas_model');
		$this->load->model('Anggota_model');
		$this->load->model('Profil_model');
		$this->load->model('Soal_model');
		$this->load->model('Ujian_model');

		$this->load->helper('typography');

		$this->form_validation->set_error_delimiters('', '');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	public function akses_siswa()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		if ($data['user']['role_id'] !== 3) {
			show_error('Halaman ini khusus untuk mahasiswa mengikuti ujian, <a href="' . base_url('auth') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
		}
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$id = $this->input->get('key', true);
		// $id = $this->encryption->decrypt(rawurldecode($key));

		$ujian = $this->Ujian_model->getUjianById($id);
		if ($ujian['jenis'] == "acak per bab") {

			$b_soal = explode(",", $ujian['list_bank']);
			$jml_soal = explode(",", $ujian['list_jml_soal']);

			for ($j = 0; $j < count($b_soal); $j++) {
				$so = $this->Ujian_model->getSoalByBank($b_soal[$j], $jml_soal[$j]);
				$b[$j] = $so;
			}

			$siswa = $this->Profil_model->getSiswaByUser($data['user']['id']);
			$h_ujian = $this->Ujian_model->HasilUjian($id, $siswa->id, $siswa->id_siswa);

			$cek_sudah_ikut = $h_ujian->num_rows();

			if ($cek_sudah_ikut < 1) {
				$soal_urut_ok = array();
				for ($a = 0; $a < count($b); $a++) {
					for ($c = 0; $c < count($b[$a]); $c++) {
						$soal_per = new stdClass();
						$soal_per->id_soal = $b[$a][$c]['id_soal'];
						$soal_per->soal = $b[$a][$c]['soal'];
						$soal_per->file = $b[$a][$c]['file'];
						$soal_per->opsi_a = $b[$a][$c]['opsi_a'];
						$soal_per->opsi_b = $b[$a][$c]['opsi_b'];
						$soal_per->opsi_c = $b[$a][$c]['opsi_c'];
						$soal_per->opsi_d = $b[$a][$c]['opsi_d'];
						$soal_per->opsi_e = $b[$a][$c]['opsi_e'];
						$soal_per->jawaban = $b[$a][$c]['jawaban'];
						$soal_urut_ok[$a][$c] = $soal_per;
					}
				}

				$soal_urut_ok = $soal_urut_ok;
				$list_id_soal = "";
				$list_jw_soal = "";

				if (!empty($b)) {
					for ($m = 0; $m < count($b); $m++) {
						for ($n = 0; $n < count($b[$m]); $n++) {
							$list_id_soal .= $b[$m][$n]['id_soal'] . ",";
							$list_jw_soal .= $b[$m][$n]['id_soal'] . "::N,";
						}
					}
				}
				$list_id_soal = substr($list_id_soal, 0, -1);
				$list_jw_soal = substr($list_jw_soal, 0, -1);
				$waktu_selesai = date('Y-m-d H:i:s', strtotime("+{$ujian['waktu']} minute"));
				$time_mulai = date('Y-m-d H:i:s');

				$input = [
					'id_ujian' => $id,
					'id_user' => $siswa->id,
					'id_siswa' => $siswa->id_siswa,
					'list_soal' => $list_id_soal,
					'list_jawaban' => $list_jw_soal,
					'jml_benar' => 0,
					'nilai' => 0,
					'nilai_bobot' => 0,
					'tgl_mulai' => $time_mulai,
					'tgl_selesai' => $waktu_selesai,
					'status' => 'Y'
				];
				$this->db->insert('h_ujian', $input);

				// Setelah insert wajib refresh dulu
				redirect('ujian/?key=' . $id, 'location', 301);
			}

			$q_soal = $h_ujian->row();

			$urut_soal = explode(",", $q_soal->list_jawaban);
			$soal_urut_ok = array();
			for ($i = 0; $i < sizeof($urut_soal); $i++) {
				$pc_urut_soal = explode(":", $urut_soal[$i]);
				$pc_urut_soal1 = empty($pc_urut_soal[1]) ? "''" : "'{$pc_urut_soal[1]}'";
				$ambil_soal = $this->Ujian_model->ambilSoal($pc_urut_soal1, $pc_urut_soal[0]);
				$soal_urut_ok[] = $ambil_soal;
			}

			$detail_tes = $q_soal;
			$soal_urut_ok = $soal_urut_ok;

			$pc_list_jawaban = explode(",", $detail_tes->list_jawaban);
			$arr_jawab = array();
			foreach ($pc_list_jawaban as $v) {
				$pc_v = explode(":", $v);
				$idx = $pc_v[0];
				$val = $pc_v[1];
				$rg = $pc_v[2];

				$arr_jawab[$idx] = array("j" => $val, "r" => $rg);
			}

			$arr_opsi = array("a", "b", "c", "d", "e");
			$html = '';
			$no = 1;
			if (!empty($soal_urut_ok)) {
				foreach ($soal_urut_ok as $s) {
					$path = 'uploads/soal/';
					$vrg = $arr_jawab[$s->id_soal]["r"] == "" ? "N" : $arr_jawab[$s->id_soal]["r"];
					$html .= '<input type="hidden" name="id_soal_' . $no . '" value="' . $s->id_soal . '">';
					$html .= '<input type="hidden" name="rg_' . $no . '" id="rg_' . $no . '" value="' . $vrg . '">';
					$html .= '<div class="step" id="widget_' . $no . '">';
					$html .= '<p type="text" readonly name="banksoal_' . $no . '" value=""> ' . $s->banksoal . ' </p>';
					$html .= '<br>';
					if (!empty($s->file)) {
						$html .= '<div class="text-center">
                            <div class="w-25">' . '<img class="thumbnail w-1000" src="' . base_url($path) . $s->file . '">' . '</div>
                            </div>' . auto_typography($s->soal) . '<div class="funkyradio">';
					} else {
						$html .= '<div class="text-center">
                            <div class="w-25">' . '</div>
                            </div>' . auto_typography($s->soal) . '<div class="funkyradio">';
					}

					for ($j = 0; $j < $this->config->item('jml_opsi'); $j++) {
						$opsi = "opsi_" . $arr_opsi[$j];
						$checked = $arr_jawab[$s->id_soal]["j"] == $arr_opsi[$j] ? "checked" : "";
						$pilihan_opsi = !empty($s->$opsi) ? $s->$opsi : "";
						$html .= '<div class="funkyradio-success" onclick="return simpan_sementara();">
                        <input type="radio" id="opsi_' . $arr_opsi[$j] . '_' . $s->id_soal . '" name="opsi_' . $no . '" value="' . $arr_opsi[$j] . '" ' . $checked . '> <label for="opsi_' . $arr_opsi[$j] . '_' . $s->id_soal . '">
                            <div class="huruf_opsi">' . $arr_opsi[$j] . '</div>
                            <p>' . $pilihan_opsi . '</p>
                        </label></div>';
					}
					$html .= '</div>
        </div>';
					$no++;
				}
			}

			$id_tes = $detail_tes->id_h;
			$id_user = $data['user']['id'];

			$data = [
				'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
				'title' => 'Ujian',
				'ujian' => $this->Ujian_model->getUjian($id),
				'siswa' => $this->Ujian_model->getIdSiswa($id_user),
				'soal' => $detail_tes,
				'no' => $no,
				'html' => $html,
				'id_tes' => $id_tes
			];
			$this->load->view('templates/ujian/_header.php', $data);
			$this->load->view('siswa/ujian/sheet');
			$this->load->view('templates/ujian/_footer.php');
		} else {
			$soal = $this->Ujian_model->getSoal($id);

			$siswa = $this->Profil_model->getSiswaByUser($data['user']['id']);
			$h_ujian = $this->Ujian_model->HasilUjian($id, $siswa->id, $siswa->id_siswa);

			$cek_sudah_ikut = $h_ujian->num_rows();

			if ($cek_sudah_ikut < 1) {
				$soal_urut_ok = array();
				$i = 0;
				foreach ($soal as $s) {
					$soal_per = new stdClass();
					$soal_per->id_soal = $s->id_soal;
					$soal_per->soal = $s->soal;
					$soal_per->file = $s->file;
					$soal_per->opsi_a = $s->opsi_a;
					$soal_per->opsi_b = $s->opsi_b;
					$soal_per->opsi_c = $s->opsi_c;
					$soal_per->opsi_d = $s->opsi_d;
					$soal_per->opsi_e = $s->opsi_e;
					$soal_per->jawaban = $s->jawaban;
					$soal_urut_ok[$i] = $soal_per;
					$i++;
				}
				$soal_urut_ok = $soal_urut_ok;
				$list_id_soal = "";
				$list_jw_soal = "";
				if (!empty($soal)) {
					foreach ($soal as $d) {
						$list_id_soal .= $d->id_soal . ",";
						$list_jw_soal .= $d->id_soal . "::N,";
					}
				}
				$list_id_soal = substr($list_id_soal, 0, -1);
				$list_jw_soal = substr($list_jw_soal, 0, -1);
				$waktu_selesai = date('Y-m-d H:i:s', strtotime("+{$ujian['waktu']} minute"));
				$time_mulai = date('Y-m-d H:i:s');

				$input = [
					'id_ujian' => $id,
					'id_user' => $siswa->id,
					'id_siswa' => $siswa->id_siswa,
					'list_soal' => $list_id_soal,
					'list_jawaban' => $list_jw_soal,
					'jml_benar' => 0,
					'nilai' => 0,
					'nilai_bobot' => 0,
					'tgl_mulai' => $time_mulai,
					'tgl_selesai' => $waktu_selesai,
					'status' => 'Y'
				];
				$this->db->insert('h_ujian', $input);

				// Setelah insert wajib refresh dulu
				redirect('ujian/?key=' . $id, 'location', 301);
			}

			$q_soal = $h_ujian->row();

			$urut_soal = explode(",", $q_soal->list_jawaban);
			$soal_urut_ok = array();
			for ($i = 0; $i < sizeof($urut_soal); $i++) {
				$pc_urut_soal = explode(":", $urut_soal[$i]);
				$pc_urut_soal1 = empty($pc_urut_soal[1]) ? "''" : "'{$pc_urut_soal[1]}'";
				$ambil_soal = $this->Ujian_model->ambilSoal($pc_urut_soal1, $pc_urut_soal[0]);
				$soal_urut_ok[] = $ambil_soal;
			}

			$detail_tes = $q_soal;
			$soal_urut_ok = $soal_urut_ok;

			$pc_list_jawaban = explode(",", $detail_tes->list_jawaban);
			$arr_jawab = array();
			foreach ($pc_list_jawaban as $v) {
				$pc_v = explode(":", $v);
				$idx = $pc_v[0];
				$val = $pc_v[1];
				$rg = $pc_v[2];

				$arr_jawab[$idx] = array("j" => $val, "r" => $rg);
			}

			$arr_opsi = array("a", "b", "c", "d", "e");
			$html = '';
			$no = 1;
			if (!empty($soal_urut_ok)) {
				foreach ($soal_urut_ok as $s) {
					$path = 'uploads/soal/';
					$vrg = $arr_jawab[$s->id_soal]["r"] == "" ? "N" : $arr_jawab[$s->id_soal]["r"];
					$html .= '<input type="hidden" name="id_soal_' . $no . '" value="' . $s->id_soal . '">';
					$html .= '<input type="hidden" name="rg_' . $no . '" id="rg_' . $no . '" value="' . $vrg . '">';
					$html .= '<div class="step" id="widget_' . $no . '">';
					if (!empty($s->file)) {
						$html .= '<div class="text-center">
                            <div class="w-25">' . '<img class="thumbnail w-1000" src="' . base_url($path) . $s->file . '">' . '</div>
                            </div>' . auto_typography($s->soal) . '<div class="funkyradio">';
					} else {
						$html .= '<div class="text-center">
                            <div class="w-25">' . '</div>
                            </div>' . auto_typography($s->soal) . '<div class="funkyradio">';
					}

					for ($j = 0; $j < $this->config->item('jml_opsi'); $j++) {
						$opsi = "opsi_" . $arr_opsi[$j];
						$checked = $arr_jawab[$s->id_soal]["j"] == $arr_opsi[$j] ? "checked" : "";
						$pilihan_opsi = !empty($s->$opsi) ? $s->$opsi : "";
						$html .= '<div class="funkyradio-success" onclick="return simpan_sementara();">
                        <input type="radio" id="opsi_' . $arr_opsi[$j] . '_' . $s->id_soal . '" name="opsi_' . $no . '" value="' . $arr_opsi[$j] . '" ' . $checked . '> <label for="opsi_' . $arr_opsi[$j] . '_' . $s->id_soal . '">
                            <div class="huruf_opsi">' . $arr_opsi[$j] . '</div>
                            <p>' . $pilihan_opsi . '</p>
                        </label></div>';
					}
					$html .= '</div></div>';
					$no++;
				}
			}


			$id_tes = $detail_tes->id_h;
			$id_user = $data['user']['id'];

			$data = [
				'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
				'title' => 'Ujian',
				'ujian' => $this->Ujian_model->getUjian($id),
				'siswa' => $this->Ujian_model->getIdSiswa($id_user),
				'soal' => $detail_tes,
				'no' => $no,
				'html' => $html,
				'id_tes' => $id_tes
			];
			$this->load->view('templates/ujian/_header.php', $data);
			$this->load->view('siswa/ujian/sheet');
			$this->load->view('templates/ujian/_footer.php');
		}
	}

	public function simpan_satu()
	{
		// Decrypt Id
		$id_tes = $_POST['id'];
		// $id_tes = $this->encryption->decrypt($id_tes);

		$input = $this->input->post(null, true);
		$list_jawaban = "";
		for ($i = 1; $i < $input['jml_soal']; $i++) {
			$_tjawab = "opsi_" . $i;
			$_tidsoal = "id_soal_" . $i;
			$_ragu = "rg_" . $i;
			$jawaban_ = empty($input[$_tjawab]) ? "" : $input[$_tjawab];
			$list_jawaban .= "" . $input[$_tidsoal] . ":" . $jawaban_ . ":" . $input[$_ragu] . ",";
		}
		$list_jawaban = substr($list_jawaban, 0, -1);
		$d_simpan = ['list_jawaban' => $list_jawaban];

		// Simpan jawaban
		$this->db->update('h_ujian', $d_simpan, array('id_h' => $id_tes));
		$this->output_json(['status' => true]);
	}

	public function simpan_akhir()
	{

		$id_tes = $_POST['id'];
		// $id_tes = $this->encryption->decrypt($id_tes);

		// ambil Jawaban
		$list_jawaban = $this->Ujian_model->getJawaban($id_tes);

		// Pecah Jawaban
		$pc_jawaban = explode(",", $list_jawaban);

		$jumlah_benar = 0;
		$jumlah_salah = 0;
		$jumlah_ragu = 0;
		$nilai_bobot = 0;
		$total_bobot = 0;
		$jumlah_soal = sizeof($pc_jawaban);

		foreach ($pc_jawaban as $jwb) {
			$pc_dt = explode(":", $jwb);
			$id_soal = $pc_dt[0];
			$jawaban = $pc_dt[1];
			$ragu = $pc_dt[2];

			$cek_jwb = $this->Soal_model->getSoalByIdSoal($id_soal);
			$total_bobot = $total_bobot + $cek_jwb->bobot;

			$jawaban == $cek_jwb->jawaban ? $jumlah_benar++ : $jumlah_salah++;
		}

		$nilai = ($jumlah_benar / $jumlah_soal) * 100;
		$nilai_bobot = ($total_bobot / $jumlah_soal) * 100;

		$d_update = [
			'jml_benar' => $jumlah_benar,
			'nilai' => number_format(floor($nilai), 0),
			'nilai_bobot' => number_format(floor($nilai_bobot), 0),
			'status' => 'N'
		];


		$this->db->update('h_ujian', $d_update, array('id_h' => $id_tes));
		$this->output_json(['status' => TRUE, 'data' => $d_update, 'id_h' => $id_tes]);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Terimakasih telah mengikuti ujian!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>');
	}



	public function HslUjianById($id, $dt = false)
	{
		if ($dt === false) {
			$db = "db";
			$get = "get";
		} else {
			$db = "datatables";
			$get = "generate";
		}

		$this->$db->select('d.id, a.nama, b.nama_kelas, c.nama_jurusan, d.jml_benar, d.nilai');
		$this->$db->from('mahasiswa a');
		$this->$db->join('kelas b', 'a.kelas_id=b.id_kelas');
		$this->$db->join('jurusan c', 'b.jurusan_id=c.id_jurusan');
		$this->$db->join('h_ujian d', 'a.id_mahasiswa=d.mahasiswa_id');
		$this->$db->where(['d.ujian_id' => $id]);
		return $this->$db->$get();
	}

	public function bandingNilai($id)
	{
		$this->db->select_min('nilai', 'min_nilai');
		$this->db->select_max('nilai', 'max_nilai');
		$this->db->select_avg('FORMAT(FLOOR(nilai),0)', 'avg_nilai');
		$this->db->where('ujian_id', $id);
		return $this->db->get('h_ujian')->row();
	}
}
