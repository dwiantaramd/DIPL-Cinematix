<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$this->load->view('templates/header_admin.php',$data);
		$this->load->view('Admin/Home.php');
		$this->load->view('templates/footer_admin.php');
	}

}
