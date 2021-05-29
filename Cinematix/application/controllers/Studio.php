<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studio extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Studio_Model');
        $this->load->model('Teater_Model');
        $this->load->helper('form');
    }

    public function index()
        {
            $data['judul'] = 'Studio';
            $data['studio'] = $this->Studio_Model->getAllStudio();
            $data['teater'] = $this->Teater_Model->getAllTeater();
            $this->load->view('templates/header_admin.php',$data);
            $this->load->view('Admin/KelolaStudio.php',$data);
            $this->load->view('templates/footer_admin.php');
        }

    public function addStudio()
    {
        $this->form_validation->set_rules('idStudio', 'idStudio', 'required|trim|is_unique[studio.idStudio]');
        $this->form_validation->set_rules('NomorStudio', 'NomorStudio', 'required|integer');
        $this->form_validation->set_rules('TipeStudio', 'TipeStudio', 'required');

        if ($this->form_validation->run() == false) {
            $this->index();
        }else {
            $idStudio      = $this->input->post('idStudio');
            $NomorStudio   = $this->input->post('NomorStudio');
            $TipeStudio    = $this->input->post('TipeStudio');
            $idTeater      = $this->input->post('NamaTeater');
            
            if($this->Studio_Model->cekDuplicate($NomorStudio,$idTeater) != 0){
                $this->index();
            }else{
                $data = [
                    'idStudio' => $idStudio,
                    'NomorStudio' => $NomorStudio,
                    'TipeStudio' => $TipeStudio,
                    'idTeater' => $idTeater,
                ];
    
                $this->Studio_Model->insertStudio($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Studio berhasil di tambahkan</div>');
                redirect('Studio');
            }
            
        }
    }

    public function getEdit()
    {
        echo json_encode($this->Studio_Model->getStudiobyId($_POST['idStudio']));
        
    }

    public function editStudio()
    {
        $this->form_validation->set_rules('idStudio', 'idStudio', 'required|trim');
        $this->form_validation->set_rules('NomorStudio', 'NomorStudio', 'required|integer');
        $this->form_validation->set_rules('TipeStudio', 'TipeStudio', 'required');

        if ($this->form_validation->run()==false){
            $this->index();
        }else{
            $idStudio      = $this->input->post('idStudio');
            $NomorStudio   = $this->input->post('NomorStudio');
            $TipeStudio    = $this->input->post('TipeStudio');
            $idTeater      = $this->input->post('NamaTeater');
            $idlama        = $this->input->post('idlama');
    
            $data = [
                'idStudio' => $idStudio,
                'NomorStudio' => $NomorStudio,
                'TipeStudio' => $TipeStudio,
                'idTeater' => $idTeater,
            ];

            $this->Studio_Model->updateStudio($data, $idlama);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Studio berhasil diUpdate</div>');
            redirect('Studio');
        }
    }
}