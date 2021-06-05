<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('userModel');
		$this->load->model('Teater_Model');
		$this->load->model('Pemesanan_Model');
		$this->load->model('Film_Model');
	}
	
	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['num_teater'] = $this->Teater_Model->getNumTeater();
		$data['num_film'] = $this->Film_Model->getNumFilm();
		$data['num_user'] = $this->userModel->getNumUser();
		$data['num_pemesanan'] = $this->Pemesanan_Model->getNumPemesanan();
		$this->load->view('templates/header_admin.php',$data);
		$this->load->view('Admin/Home.php',$data);
		$this->load->view('templates/footer_admin.php');
	}


}
