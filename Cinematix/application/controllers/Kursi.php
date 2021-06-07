<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kursi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); 
        $this->load->model('Kursi_Model'); 
        $this->load->model('Studio_Model'); 
        $this->load->helper('form');
    }

    public function index()
    {
        $data['judul'] = 'Kursi';
        $data['kursi'] = $this->Kursi_Model->getAllKursi();
        $data['studio'] = $this->Studio_Model->getAllStudio();
        $this->load->view('templates/header_admin.php',$data); 
        $this->load->view('Admin/KelolaKursi.php',$data);
        $this->load->view('templates/footer_admin.php');
    }

    public function addKursi()
    {
        $this->form_validation->set_rules('NomorKursi', 'NomorKursi', 'required'); 
        if ($this->form_validation->run() == false) { 
            $this->index(); 
        }else { 
            $data = [ 
                'NomorKursi' => $this->input->post('NomorKursi'),
                'idStudio' => $this->input->post('idStudio'),
            ];
            $this->Kursi_Model->insertKursi($data); 
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kursi berhasil di tambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); // membuat flash data jika data berhasil di inputkan ke database
            redirect('Kursi');
        }
    }

    public function delKursi($id)
    {
        $this->Kursi_Model->deleteKursi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kursi berhasil diHapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
        redirect('Kursi');
    }
}