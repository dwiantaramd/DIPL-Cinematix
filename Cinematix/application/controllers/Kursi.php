<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kursi extends CI_Controller
{
    public funtion construct()
    {
        parent::__construct(); //constructor
        $this->load->library('form_validation'); // load library form validation
        $this->load->model('Kursi_Model'); // load model kursi
        $this->load->helper('form'); // load form helper 
    }

    public function index()
    {
        $data['judul'] = 'Kursi'; // set judul, digunakan untuk title dan h1 pada header
        $data['kursi'] = $this->Kursi_Model->getAllKursi(); // menyimpan seluruh data kursi dari database
        $this->load->view('templates/header_admin.php',$data); // load view header admin
        $this->load->view('Admin/KelolaKursi.php',$data); // load view Kursi
        $this->load->view('templates/footer_admin.php'); // load view footer admin
    }

    // public function addKursi()
    // {
    //     $this->form_validation->set_rules('NomorKursi', 'NomorKursi', 'required'); 

    //     if ($this->form_validation->run() == false) { 
    //         $this->index(); 
    //     }else { 
    //         $data = [  
    //             'NomorStudio' => $this->input->post('NomorKursi'),
    //             'Status' => "0",
    //             'idStudio' => $this->input->post('Sinopsis'),
    //         ];
    //         $this->Film_Model->insertFilm($data); 
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Film berhasil di tambahkan</div>'); 
    //     }
    // }
}