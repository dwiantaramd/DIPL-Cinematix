<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $this->load->view('templates/header_customer', $data);
        $this->load->view('Customer/Home');
        $this->load->view('templates/footer_customer');
    }
}
