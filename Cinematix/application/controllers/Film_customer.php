<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Film_customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); //constructor
        $this->load->library('form_validation'); // load library form validation
        $this->load->model('Film_Model'); // load model film
        $this->load->helper('form'); // load form helper 
    }

    public function index()
    {
        $data['judul'] = 'Film'; // set judul, digunakan untuk title dan h1 pada header
        $data['film'] = $this->Film_Model->getAllFilm(); // menyimpan seluruh data film dari database
        $this->load->view('templates/header_customer', $data); // load view header admin
        $this->load->view('Customer/film', $data); // load view film
        $this->load->view('templates/footer_customer'); // load view footer admin
    }
}
