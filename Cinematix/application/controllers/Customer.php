<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); // load library form validation
        $this->load->model('JadwalTayang_Model'); // load model jadwal tayang
        $this->load->model('Studio_Model'); //load model studio
        $this->load->model('Teater_Model'); //load model teater
        $this->load->model('Film_Model'); //load model film
        $this->load->model('Kursi_Model'); //load model kursi
        $this->load->model('Pemesanan_Model'); //load model pemesanan
        $this->load->helper('form'); // load form helper
    }

    public function index()
    {
        $data['customer'] = $this->db->get_where('customer', ['username' => $this->session->userdata('username')])->row_array();
        $data['jadwal_tayang'] = $this->JadwalTayang_Model->getAllJadwalTayang();
        $data['studio'] = $this->Studio_Model->getAllStudio();
        $data['teater'] = $this->Teater_Model->getAllTeater();
        $data['film'] = $this->Film_Model->getAllFilm();
        $data['kursi'] = $this->Kursi_Model->getAllKursi();
        $data['pemesanan'] = $this->Pemesanan_Model->getAllPemesanan();
        $this->load->view('templates/header_customer', $data);
        $this->load->view('Customer/Home', $data);
        $this->load->view('templates/footer_customer');
    }

    public function addPemesanan()
    {
        $this->form_validation->set_rules('idJadwalTayang', 'idJadwalTayang', 'required');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'idJadwalTayang' => $this->input->post('idJadwalTayang'),
                'User' => $this->input->post('username'),
                'TglTransaksi' => $this->input->post('tanggal'),
                'Harga' => $this->input->post('harga'),
                'idKursi' => $this->input->post('NomorKursi'),
            ];
            $this->Pemesanan_Model->insertPemesanan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil melakukan pemesanan tiket<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); // membuat flash data jika data berhasil di inputkan ke database
            redirect('Customer');
        }
    }

    public function getPemesananDetails()
    {
        echo json_encode($this->Pemesanan_Model->getPemesananDetail($_POST['idPemesanan']));
    }
}
