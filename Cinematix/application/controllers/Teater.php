<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teater extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Teater_Model');
        $this->load->helper('form');
    }
   
    public function index()
    {
        $data['judul'] = 'Teater';
        $data['teater'] = $this->Teater_Model->getAllTeater();
        $this->load->view('templates/header_admin.php',$data);
        $this->load->view('Admin/KelolaTeater.php',$data);
        $this->load->view('templates/footer_admin.php');
    }

    public function addTeater(){

        $this->form_validation->set_rules('idTeater', 'idTeater', 'required|trim|is_unique[teater.idTeater]');
        $this->form_validation->set_rules('NamaTeater', 'NamaTeater', 'required');

        if ($this->form_validation->run() == false) {
            $this->index();
        }else {
            $data = [
                'idTeater' => $this->input->post('idTeater'),
                'NamaTeater' => $this->input->post('NamaTeater'),
            ];
            $this->Teater_Model->insertTeater($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Teater berhasil di tambahkan</div>');
            redirect('Teater');
        }
    }

    public function getEdit()
    {
        echo json_encode($this->Teater_Model->getTeaterbyId($_POST['idTeater']));
    }

    public function editTeater()
    {
        $this->form_validation->set_rules('idTeater', 'idTeater', 'required|trim');
        $this->form_validation->set_rules('NamaTeater', 'NamaTeater', 'required');

        if ($this->form_validation->run()==false){
            $this->index();
        }else{
            $idlama         = $this->input->post('idlama');
            $data = [
                'idTeater' => $this->input->post('idTeater'),
                'NamaTeater' => $this->input->post('NamaTeater'),
            ];
            $this->Teater_Model->updateTeater($data, $idlama);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Teater berhasil diUpdate</div>');
            redirect('Teater');
        }
    }

    public function delTeater($id){
        $this->Teater_Model->deleteTeater($id);
        redirect('Teater');
    }
}