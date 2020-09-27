<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
    // guru
    public function getAllKelas()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('user', 'kelas.id_user = user.id');
        $this->db->where('kelas.id_user', $id);
        $this->db->order_by('nama_kelas ASC');
        return $this->db->get()->result_array();
    }

    public function getSomeKelas($id)
    {

        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('user', 'kelas.id_user = user.id');
        $this->db->where('kelas.id_user !=', $id);
        $this->db->order_by('nama_kelas ASC');
        return $this->db->get()->result_array();
    }

    public function getKelasById($id)
    {
        $this->db->select('*')
            ->from('kelas')
            ->join('user', 'kelas.id_user = user.id')
            ->where('kelas.id_kelas', $id);
        return $this->db->get()->row_array();
    }

    public function getKelasDanGuruById($id)
    {
        $this->db->select('*')
            ->from('kelas')
            ->join('user', 'kelas.id_user = user.id')
            ->join('tb_karyawan', 'user.email = tb_karyawan.email', 'user.name = tb_karyawan.nama', 'user.no_induk = tb_karyawan.nomor_induk')
            ->where('kelas.id_kelas', $id);
        return $this->db->get()->row_array();
    }

    public function tambahKelas()
    {
        $this->load->helper('string');

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data = [
            'id_user' => $data['user']['id'],
            'nama_kelas' => htmlspecialchars($this->input->post('nama_kelas', true)),
            'mapel' => htmlspecialchars($this->input->post('mapel', true)),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
            'kode_kelas' => random_string('alpha', 5)
        ];

        $cek = $this->db->where(['nama_kelas' => $data['nama_kelas'], 'mapel' => $data['mapel']])->get('kelas')->result_array();

        if (count($cek) > 0) {
            $this->session->set_flashdata('error', 'Kelas sudah ada!');
            redirect('guru/kelas', 'refresh');
        } else {
            $this->db->insert('kelas', $data);
        }
    }

    public function ubahKelas($data)
    {
        $array = [
            'id_kelas' => $data['id_kelas'],
            'id_user' => $data['id_user'],
            'nama_kelas' => $data['nama_kelas'],
            'mapel' => $data['mapel'],
            'deskripsi' => $data['deskripsi']
        ];
        $cek = $this->db->where(['nama_kelas' => $data['nama_kelas'], 'mapel' => $data['mapel']])->get('kelas')->result_array();
        if (count($cek) > 0) {
            $this->session->set_flashdata('error', 'Kelas sudah ada!');
            redirect('guru/kelas', 'refresh');
        } else {
            $this->db->update('kelas', $array, array('id_kelas' => $array['id_kelas'], 'id_user' => $array['id_user']));
        }
    }

    public function hapusKelas($id)
    {
        $this->db->where('id_kelas', $id);
        return $this->db->delete('kelas');
    }


    // siswa
    public function getKelasSiswa($id)
    {

        $this->db->select("kelas-siswa.*, kelas.*, user.id, user.name")
            ->from('kelas-siswa')
            ->join('kelas', 'kelas.id_kelas = kelas-siswa.id_kelas')
            ->join('user', 'user.id = kelas-siswa.id_user_siswa')
            ->where('kelas-siswa.id_user_siswa', $id)
            ->order_by('nama_kelas ASC');


        return $this->db->get()->result_array();
    }

    public function getIdKelasSiswa($id)
    {
        $this->db->select('kelas-siswa.id_kelas')
            ->from('kelas-siswa')
            ->join('kelas', 'kelas.id_kelas = kelas-siswa.id_kelas')
            ->join('user', 'user.id = kelas-siswa.id_user_siswa')
            ->where('kelas-siswa.id_user_siswa', $id)
            ->order_by('nama_kelas ASC');
        return $this->db->get()->result_array();
    }

    public function getKelasSiswaById($id)
    {
        $this->db->select('*')
            ->from('kelas')
            ->join('user', 'kelas.id_user = user.id')
            ->where('kelas.id_kelas', $id);
        return $this->db->get()->row_array();
    }

    public function getKelasByToken($token)
    {
        $this->db->select('*')
            ->from('kelas')
            ->where('kode_kelas', $token);
        return $this->db->get()->row_array();
    }

    public function gabungKelas($array)
    {
        $this->db->insert('kelas-siswa', $array);
    }

    public function keluar($id_user, $id_kelas)
    {
        $this->db->delete('kelas-siswa', ['id_user_siswa' => $id_user, 'id_kelas' => $id_kelas]);
    }
}
