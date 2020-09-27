<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if ($this->session->userdata('email')) {
      if ($this->session->userdata('role_id') == 2) {
        redirect('guru');
      } else {
        redirect('siswa');
      }
    }

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      // Validation Success
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    //jika usernya ada
    if ($user) {
      // jika usernya aktif
      if ($user['is_active'] == 1) {
        // cek password
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id'],
            'id' => $user['id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 2) {
            redirect('guru');
          } else {
            redirect('siswa');
          }
        } else {
          $this->session->set_flashdata('error', 'Password salah!');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('error', 'Email belum aktif');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('error', 'Email tidak terdaftar');
      redirect('auth');
    }
  }

  public function registration_guru()
  {
    if ($this->session->userdata('email')) {
      if ($this->session->userdata('role_id') == 2) {
        redirect('guru');
      } else {
        redirect('siswa');
      }
    }

    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('no_induk', 'No induk', 'required|trim|numeric');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'this email has already registered!'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
      'matches' => 'Password tidak sama',
      'min_length' => 'Password terlalu pendek!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Registrasi Guru';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration_guru');
      $this->load->view('templates/auth_footer');
    } else {
      $email = $this->input->post('email', true);
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($email),
        'no_induk' => htmlspecialchars($this->input->post('no_induk', true)),
        'image' => 'default.png',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 0,
        'date_created' => time()
      ];

      $guru = [
        'nomor_induk' => htmlspecialchars($this->input->post('no_induk', true)),
        'foto' => 'default.png',
        'nama' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($email),
        'jk' => ''
      ];

      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];
      $this->db->insert('user', $data);
      $this->db->insert('user_token', $user_token);
      $this->db->insert('tb_karyawan', $guru);

      $this->_sendEmail($token, 'verify');

      $this->session->set_flashdata('message', 'Akun anda berhasil didaftarkan. Silakan cek email anda');
      redirect('auth');
    }
  }


  public function registration_siswa()
  {

    if ($this->session->userdata('email')) {
      if ($this->session->userdata('role_id') == 2) {
        redirect('guru');
      } else {
        redirect('siswa');
      }
    }


    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('no_induk', 'No induk', 'required|trim|numeric');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'this email has already registered!'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
      'matches' => 'Password tidak sama!',
      'min_length' => 'Password terlalu pendek!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Registrasi Siswa';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration_siswa');
      $this->load->view('templates/auth_footer');
    } else {
      $email = $this->input->post('email', true);
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($email),
        'no_induk' => htmlspecialchars($this->input->post('no_induk', true)),
        'image' => 'default.png',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 3,
        'is_active' => 0,
        'date_created' => time()
      ];

      $siswa = [
        'no_induk' => htmlspecialchars($this->input->post('no_induk', true)),
        'foto' => 'default.png',
        'nama' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($email),
        'jk' => ''
      ];

      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];

      $this->db->insert('user', $data);
      $this->db->insert('user_token', $user_token);
      $this->db->insert('tb_siswa', $siswa);

      $this->_sendEmail($token, 'verify');

      $this->session->set_flashdata('message', 'Akun anda berhasil didaftarkan. Silakan cek email anda');
      redirect('auth');
    }
  }


  private function _sendEmail($token, $type)
  {
    $this->load->library('email');

    $config = array();
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
    $config['smtp_user'] = 'exam.ta2008@gmail.com';
    $config['smtp_pass'] = 'aknkajen18';
    $config['smtp_port'] = 465;
    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';

    $this->email->initialize($config);

    $this->email->set_newline("\r\n");

    $this->email->from('exam.ta2008@gmail.com', 'TA.2008');
    $this->email->to($this->input->post('email'));
    $pesan = '';

    if ($type == 'verify') {

      $this->email->subject('Verifikasi Akun');
      $this->email->message('Klik Link berikut untuk memverifikasi akun anda: <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" >Aktifkan!</a>
      <br>
      hanya berlaku selama 24 jam!');
    } else if ($type == 'forgot') {
      $this->email->message('Klik Link berikut untuk mengatur ulang password  anda: <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" >Reset!</a>');
    }

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

      if ($user_token) {
        if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('user');

          $this->db->delete('user_token', ['email' => $email]);
          $this->session->set_flashdata('message', 'Akun <strong>' . $email . '</strong> berhasil diaktivasi! silakan Login');
          redirect('auth');
        } else {
          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);
          $this->db->delete('tb_karyawan', ['email' => $email]);
          $this->session->set_flashdata('error', 'Aktivasi akun gagal! Token kadaluarsa.');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('error', 'Aktivasi akun gagal! Token invalid.');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('error', 'Aktivasi akun gagal! Email salah.');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('message', 'Anda telah Logout');
    redirect('dashboard');
  }

  public function blocked()
  {
    $this->load->view('auth/blocked');
  }

  public function lupaPassword()
  {

    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Lupa Password';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/lupa-password');
      $this->load->view('templates/auth_footer');
    } else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('user', ['email' => $email])->row_array();

      if ($user) {
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];

        $this->db->insert('user_token', $user_token);

        $this->_sendEmail($token, 'forgot');

        $this->session->set_flashdata('message', 'Silakan cek email anda untuk atur ulang password!');
        redirect('auth/lupapassword');
      } else {
        $this->session->set_flashdata('error', 'Email tidak terdaftar');
        redirect('auth/lupapassword');
      }
    }
  }

  public function resetPassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if ($user_token) {
        $this->session->set_userdata('reset_email', $email);
        $this->ubahPassword();
      } else {
        $this->session->set_flashdata('error', 'Reset password gagal! Token salah');
        redirect('auth/lupapassword');
      }
    } else {
      $this->session->set_flashdata('error', 'Reset password gagal! Email salah');
      redirect('auth/lupapassword');
    }
  }

  public function ubahPassword()
  {
    if (!$this->session->userdata('reset_email')) {
      redirect('auth');
    }

    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
      'matches' => 'Password tidak sama!'
    ]);
    $this->form_validation->set_rules('password2', 'Ulang Password', 'required|matches[password1]', [
      'matches' => 'Password tidak sama!'
    ]);


    if ($this->form_validation->run() == false) {
      $data['title'] = 'Ubah Password';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/ubah-password');
      $this->load->view('templates/auth_footer');
    } else {
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password)
        ->where('email', $email)
        ->update('user');

      $this->session->unset_userdata('reset_email');
      $this->session->set_flashdata('message', 'Password berhasil diubah! Silakan login');
      redirect('auth');
    }
  }
}
