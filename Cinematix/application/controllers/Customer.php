<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); // load library form validation
        $this->load->model('JadwalTayang_Model'); // load model jadwal tayang
        $this->load->model('Studio_Model');
        $this->load->model('Teater_Model');
        $this->load->model('Film_Model');
        $this->load->helper('form'); // load form helper
    }

    public function index()
    {
        $data['judul'] = 'Jadwal Tayang Customer';
        $data['jadwal_tayang'] = $this->JadwalTayang_Model->getAllJadwalTayang();
        $data['studio'] = $this->Studio_Model->getAllStudio();
        $data['teater'] = $this->Teater_Model->getAllTeater();
        $data['film'] = $this->Film_Model->getAllFilm();
        $this->load->view('templates/header_customer', $data);
        $this->load->view('Customer/Home');
        $this->load->view('templates/footer_customer');
    }
}
