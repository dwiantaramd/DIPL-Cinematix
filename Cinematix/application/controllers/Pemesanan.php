<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

   
    public function index()
        {
            $data['judul'] = 'Pemesanan';
            $this->load->view('templates/header_admin.php',$data);
            $this->load->view('Admin/ViewPemesanan.php');
            $this->load->view('templates/footer_admin.php');
        }
}