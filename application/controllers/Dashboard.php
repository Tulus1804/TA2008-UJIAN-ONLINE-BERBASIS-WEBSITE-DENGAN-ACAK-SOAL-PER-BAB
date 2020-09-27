<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Exam';
        $this->load->view('templates/dashboard/header.php', $data);
        $this->load->view('dashboard/index.php');
        $this->load->view('templates/dashboard/footer.php');
    }
}
