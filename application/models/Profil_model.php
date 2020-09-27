<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil_model extends CI_Model
{
    //guru
    public function getProfilGuruById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('tb_karyawan', 'user.email = tb_karyawan.email');
        $this->db->where('user.id', $id);
        return $this->db->get()->row_array();
    }

    public function getUserGuruById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    //siswa
    public function getProfilSiswaById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('tb_siswa', 'user.email = tb_siswa.email', 'user.no_induk = tb_siswa.no_induk');
        $this->db->where('user.id', $id);
        return $this->db->get()->row_array();
    }

    public function getSiswaByUser($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('tb_siswa', 'user.email = tb_siswa.email', 'user.no_induk = tb_siswa.no_induk');
        $this->db->where('user.id', $id);
        return $this->db->get()->row();
    }

    public function getUserSiswaById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }
    private function uploadGambar($role_id)
    {
        if ($role_id == 2) {
            $config['upload_path']          = './uploads/img/' . $role_id;
        } else {
            $config['upload_path']          = './uploads/img/' . $role_id;
        }
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['max_size']             = 10000; // 10MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data('file_name');
        }

        return "default.png";
    }

    public function ubahProfil($data)
    {

        $d['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $role_id = $d['user']['role_id'];

        $no_induk = $data['no_induk'];
        $name = htmlspecialchars($data['nama']);
        $email = htmlspecialchars($data['email']);
        if (!empty($_FILES["foto"]["name"])) {
            $image = $this->uploadGambar($role_id);
        } else {
            $image = $data["foto_lama"];
        }
        $jk = htmlspecialchars($data['jk']);
        $tmp_lahir = htmlspecialchars($data['tmp_lahir']);
        $tgl_lahir = htmlspecialchars($data['tgl_lahir']);
        $alamat = htmlspecialchars($data['alamat']);

        $user = [
            'name' => $name,
            'email' => $email,
            'image' => $image
        ];
        $guru = [
            'foto' => $image,
            'nama' => $name,
            'email' => $email,
            'jk' => $jk,
            'tmp_lahir' => $tmp_lahir,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,

        ];

        $this->db->update('user', $user, array('no_induk' => $no_induk, 'email' => $guru['email']));
        if ($role_id == 2) {
            $this->db->update('tb_karyawan', $guru, array('nomor_induk' => $no_induk, 'email' => $guru['email']));
        } else {
            $this->db->update('tb_siswa', $guru, array('no_induk' => $no_induk, 'email' => $guru['email']));
        }
    }

    public function ubahpassword($data)
    {
        $id = $data['id'];
        $password = htmlspecialchars(password_hash($data['pass2'], PASSWORD_DEFAULT));
        $array = [
            'password' => $password
        ];
        $this->db->update('user', $array, array('id' => $id));
    }
}
