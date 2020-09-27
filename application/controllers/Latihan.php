<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Latihan extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Latihan";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('latihan');
        $this->load->view('templates/footer');
    }
}
