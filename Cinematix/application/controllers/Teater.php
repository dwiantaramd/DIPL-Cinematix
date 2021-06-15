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
            $img = $_FILES['image']['name'];
            if(!$img){
                $data = [
                    'idTeater' => $this->input->post('idTeater'),
                    'NamaTeater' => $this->input->post('NamaTeater'),
                    'image' => 'defaultimage.png'
                ];
                $this->Teater_Model->insertTeater($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Teater berhasil di tambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Teater');
            }else{
                $config['upload_path']      = './assets/img/teater';
                $config['allowed_types']    = 'jpg|png|gif';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Add Teater Failed</div>');
                    redirect('Teater');
                }else{
                    $img = $this->upload->data('file_name');
                    $data = [
                        'idTeater' => $this->input->post('idTeater'),
                        'NamaTeater' => $this->input->post('NamaTeater'),
                        'image' => $img,
                    ];
                    $this->Teater_Model->insertTeater($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Teater berhasil di tambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Teater');
                }
            }
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
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Teater berhasil diUpdate<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Teater');
        }
    }

    public function delTeater($id)
    {
        $this->Teater_Model->deleteTeater($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Teater berhasil diHapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Teater');
    }

}