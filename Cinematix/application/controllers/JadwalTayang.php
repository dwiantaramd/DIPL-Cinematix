<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalTayang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); // load library form validation
        $this->load->model('JadwalTayang_Model'); // load model jadwal tayang
        $this->load->model('Studio_Model');
        $this->load->model('Teater_Model');
        $this->load->model('Film_Model');
        $this->load->helper('form'); // load form helper
    }

    public function index()
    {
        $data['judul'] = 'Jadwal Tayang';
        $data['jadwal_tayang'] = $this->JadwalTayang_Model->getAllJadwalTayang();
        $data['studio'] = $this->Studio_Model->getAllStudio();
        $data['teater'] = $this->Teater_Model->getAllTeater();
        $data['film'] = $this->Film_Model->getAllFilm();
        $this->load->view('templates/header_admin.php',$data);
        $this->load->view('Admin/KelolaJadwalTayang.php');
        $this->load->view('templates/footer_admin.php');
    }

    public function addJadwalTayang()
    {
        $this->form_validation->set_rules('idJadwalTayang', 'idJadwalTayang', 'required|trim|is_unique[jadwaltayang.idJadwalTayang]');
        $this->form_validation->set_rules('Harga', 'Harga', 'required|integer');
        $this->form_validation->set_rules('NomorStudio', 'NomorStudio', 'required|integer');

        if ($this->form_validation->run() == false) {
            $this->index();
        }else {
            $idJadwalTayang = $this->input->post('idJadwalTayang');
            $idFilm = $this->input->post('JudulFilm');
            $idTeater = $this->input->post('NamaTeater');
            $NomorStudio = $this->input->post('NomorStudio');
            $WaktuMulai = $this->input->post('WaktuMulai');
            $WaktuSelesai = $this->input->post('WaktuSelesai');
            $tgl = $this->input->post('TglTayang');
            $Harga = $this->input->post('Harga');
            
            if($this->Studio_Model->cekDuplicate($NomorStudio,$idTeater) == 0){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Studio tidak tersedia</div>');
                $this->index();
            }else{
                $idStudio = $this->Studio_Model->getIdStudio($NomorStudio,$idTeater);
                $data = [
                    'idJadwalTayang' => $idJadwalTayang,
                    'idStudio' => $idStudio,
                    'idFilm' => $idFilm,
                    'idTeater' => $idTeater,
                    'TglTayang' => $tgl,
                    'WaktuMulai' => $WaktuMulai,
                    'WaktuSelesai' => $WaktuSelesai,
                    'Harga' => $Harga,
                ];
    
                $this->JadwalTayang_Model->insertJadwalTayang($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal Tayang berhasil di tambahkan</div>');
                redirect('JadwalTayang');
            }
        }
    }

    public function getJadwalTayangDetails()
    {
        echo json_encode($this->JadwalTayang_Model->getJadwalTayangDetail($_POST['idJadwalTayang']));
    }

    public function editJadwalTayang()
    {
        $this->form_validation->set_rules('idJadwalTayang', 'idJadwalTayang', 'required|trim');
        $this->form_validation->set_rules('Harga', 'Harga', 'required|integer');
        $this->form_validation->set_rules('NomorStudio', 'NomorStudio', 'required|integer');

        if ($this->form_validation->run() == false) {
            $this->index();
        }else {
            $idJadwalTayang = $this->input->post('idJadwalTayang');
            $idFilm = $this->input->post('JudulFilm');
            $idTeater = $this->input->post('NamaTeater');
            $NomorStudio = $this->input->post('NomorStudio');
            $WaktuMulai = $this->input->post('WaktuMulai');
            $WaktuSelesai = $this->input->post('WaktuSelesai');
            $tgl = $this->input->post('TglTayang');
            $Harga = $this->input->post('Harga');
            $idlama = $this->input->post('idlama');

            if($this->Studio_Model->cekDuplicate($NomorStudio,$idTeater) == 0){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Studio tidak tersedia</div>');
                $this->index();
            }else{
                $idStudio = $this->Studio_Model->getIdStudio($NomorStudio,$idTeater);
                $data = [
                    'idJadwalTayang' => $idJadwalTayang,
                    'idStudio' => $idStudio,
                    'idFilm' => $idFilm,
                    'idTeater' => $idTeater,
                    'TglTayang' => $tgl,
                    'WaktuMulai' => $WaktuMulai,
                    'WaktuSelesai' => $WaktuSelesai,
                    'Harga' => $Harga,
                ];
    
                $this->JadwalTayang_Model->updateJadwalTayang($data,$idlama);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal Tayang berhasil di update</div>');
                redirect('JadwalTayang');
            }
        }
    }

    public function delJadwalTayang($id){
        $this->JadwalTayang_Model->deleteJadwalTayang($id); // menghapus data jadwaltayang berdasarkan id
        redirect('JadwalTayang'); // kembali ke tampilan view jadwal tayang
    }

}