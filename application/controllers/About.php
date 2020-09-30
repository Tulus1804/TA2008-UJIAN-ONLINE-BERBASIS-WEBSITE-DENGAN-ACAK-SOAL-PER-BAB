<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Tentang';
		$this->load->view('templates/dashboard/header.php', $data);
		$this->load->view('dashboard/about.php');
		$this->load->view('templates/dashboard/footer.php');
	}
}
