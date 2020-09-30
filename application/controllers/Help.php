<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Help extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Bantuan';
		$this->load->view('templates/dashboard/header.php', $data);
		$this->load->view('dashboard/help.php');
		$this->load->view('templates/dashboard/footer.php');
	}
}
