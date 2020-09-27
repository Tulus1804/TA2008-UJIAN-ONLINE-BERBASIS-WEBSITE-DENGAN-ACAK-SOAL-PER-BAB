<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    public function getAnggotaKelas($id)
    {
        $this->db->select('*');
        $this->db->from('kelas-siswa');
        $this->db->join('user', 'user.id = kelas-siswa.id_user_siswa');
        $this->db->where('kelas-siswa.id_kelas', $id);
        $this->db->order_by('name ASC');
        return $this->db->get()->result_array();
    }

    public function getDataAnggotaByNis($nis)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('tb_siswa', 'user.no_induk = tb_siswa.no_induk');
        $this->db->where('user.no_induk', $nis);
        return $this->db->get()->row_array();
    }

    public function hapusAnggota($id, $id_kelas)
    {
        $this->db->delete('kelas-siswa', ['id_user_siswa' => $id, 'id_kelas' => $id_kelas]);
    }
}
