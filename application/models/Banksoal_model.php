<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Banksoal_model extends CI_Model
{
    public function getAllBanksoal($id)
    {
        $this->db->select('*');
        $this->db->from('banksoal');
        $this->db->join('kelas', 'banksoal.id_kelas = kelas.id_kelas');
        $this->db->where('kelas.id_kelas', $id);
        $this->db->order_by('banksoal ASC');
        return $this->db->get()->result_array();
    }

    public function getSomeBank($id)
    {

        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('user', 'kelas.id_user = user.id');
        $this->db->where('kelas.id_user !=', $id);
        $this->db->order_by('nama_kelas ASC, mapel ASC');
        return $this->db->get()->result_array();
    }

    public function getBanksoalById($id)
    {
        $this->db->select('*');
        $this->db->from('banksoal');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    public function tambahBanksoal($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data = [
            'id' => '',
            'id_kelas' => $id,
            'banksoal' => htmlspecialchars($this->input->post('banksoal', true))
        ];
        $cek = $this->db->query("SELECT * FROM banksoal where id_kelas = '" . $data['id_kelas'] . "' AND banksoal='" . $data['banksoal'] . "'");
        if ($cek->num_rows() >= 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Banksoal Sudah ada!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru/banksoal/' . $id, 'refresh');
        } else {
            $this->db->insert('banksoal', $data);
        }
    }

    public function hapusBanksoal($id, $id_kelas)
    {
        return $this->db->delete('banksoal', ['id' => $id, 'id_kelas' => $id_kelas]);
    }

    public function ubahBanksoal()
    {

        $i_b = $this->input->post('i');
        $i_k = $this->input->post('i_k');
        $array = [
            'banksoal' => $this->input->post('bs')
        ];

        return $this->db->update('banksoal', $array, ['id' => $i_b]);
    }
}
