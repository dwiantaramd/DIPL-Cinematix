<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalTayang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); // load library form validation
        $this->load->model('JadwalTayang_Model'); // load model jadwal tayang
        $this->load->helper('form'); // load form helper
    }

    public function index()
        {
            $data['judul'] = 'Jadwal Tayang';
            $this->load->view('templates/header_admin.php',$data);
            $this->load->view('Admin/KelolaJadwalTayang.php');
            $this->load->view('templates/footer_admin.php');
        }
}