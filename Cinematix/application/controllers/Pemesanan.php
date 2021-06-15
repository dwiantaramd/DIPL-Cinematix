<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
   
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Pemesanan_Model');
        $this->load->helper('form');
    }

    public function index()
    {
        $data['judul'] = 'Pemesanan';
        $data['pemesanan'] = $this->Pemesanan_Model->getAllPemesanan();
        $this->load->view('templates/header_admin.php',$data);
        $this->load->view('Admin/ViewPemesanan.php');
        $this->load->view('templates/footer_admin.php');
    }

    public function delPemesanan($id)
    {
        $this->Pemesanan_Model->deletePemesanan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Pemesanan berhasil diHapus<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Pemesanan');
    }

    public function getPemesananDetails()
    {
        echo json_encode($this->Pemesanan_Model->getPemesananDetail($_POST['idPemesanan']));
    }
    
}