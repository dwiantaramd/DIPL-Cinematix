<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Film extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); //constructor
        $this->load->library('form_validation'); // load library form validation
        $this->load->model('Film_Model'); // load model film
        $this->load->helper('form'); // load form helper 
        $this->load->library('unit_test');
    }

    public function index()
    {
        $data['judul'] = 'Film'; // set judul, digunakan untuk title dan h1 pada header
        $data['film'] = $this->Film_Model->getAllFilm(); // menyimpan seluruh data film dari database
        $this->load->view('templates/header_admin.php', $data); // load view header admin
        $this->load->view('Admin/KelolaFilm.php', $data); // load view film
        $this->load->view('templates/footer_admin.php'); // load view footer admin
    }

    public function addFilm()
    {
        $this->form_validation->set_rules('idFilm', 'idFilm', 'required|trim|is_unique[film.idFilm]'); // set aturan data id film untuk form validation
        $this->form_validation->set_rules('JudulFilm', 'JudulFilm', 'required'); // set aturan data judul film untuk form validation
        $this->form_validation->set_rules('Durasi', 'Durasi', 'required'); // set aturan data durasi untuk form validation
        $this->form_validation->set_rules('Sinopsis', 'Sinopsis', 'required'); // set aturan data sinopsis untuk form validation

        if ($this->form_validation->run() == false) { // jika terdapat aturan yang dilanggar
            $this->index(); // kembali ke index, yaitu tampilan view film
        } else {
            $img = $_FILES['image']['name'];
            if (!$img) {
                $data = [
                    'idFilm' => $this->input->post('idFilm'),
                    'JudulFilm' => $this->input->post('JudulFilm'),
                    'Durasi' => $this->input->post('Durasi'),
                    'Sinopsis' => $this->input->post('Sinopsis'),
                    'image' => 'defaultimage.png',
                ];
                $this->Film_Model->insertFilm($data); // melakukan insert data baru ke database
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Film berhasil di tambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); // membuat flash data jika data berhasil di inputkan ke database
                redirect('Film'); // kembali ke tampilan view film
            } else {
                $config['upload_path']      = './assets/img/film';
                $config['allowed_types']    = 'jpg|png|gif';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Add Film Failed</div>');
                    redirect('Film');
                } else {
                    $img = $this->upload->data('file_name');
                    $data = [
                        'idFilm' => $this->input->post('idFilm'),
                        'JudulFilm' => $this->input->post('JudulFilm'),
                        'Durasi' => $this->input->post('Durasi'),
                        'Sinopsis' => $this->input->post('Sinopsis'),
                        'image' => $img,
                    ];
                    $this->Film_Model->insertFilm($data); // melakukan insert data baru ke database
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Film berhasil di tambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); // membuat flash data jika data berhasil di inputkan ke database
                    redirect('Film'); // kembali ke tampilan view film
                }
            }
        }
    }

    public function getEdit()
    {
        echo json_encode($this->Film_Model->getFilmbyId($_POST['idFilm'])); // mengambil data film berupa json berdasarkan id

    }

    public function editFilm()
    {
        $this->form_validation->set_rules('idFilm', 'idFilm', 'required|trim'); // set aturan data id film untuk form validation
        $this->form_validation->set_rules('JudulFilm', 'JudulFilm', 'required'); // set aturan data judul film untuk form validation
        $this->form_validation->set_rules('Durasi', 'Durasi', 'required'); // set aturan data durasi untuk form validation
        $this->form_validation->set_rules('Sinopsis', 'Sinopsis', 'required'); // set aturan data sinopsis untuk form validation

        if ($this->form_validation->run() == false) { // jika terdapat aturan yang dilanggar
            $this->index(); // kembali ke index, yaitu tampilan view film
        } else {
            $img = $_FILES['image']['name'];
            $idlama = $this->input->post('idlama');
            if (!$img) {
                $data = [
                    'idFilm' => $this->input->post('idFilm'),
                    'JudulFilm' => $this->input->post('JudulFilm'),
                    'Durasi' => $this->input->post('Durasi'),
                    'Sinopsis' => $this->input->post('Sinopsis'),
                    'image' => 'defaultimage.png',
                ];
                $this->Film_Model->updateFilm($data, $idlama); // melakukan insert data baru ke database
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Film berhasil di tambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); // membuat flash data jika data berhasil di inputkan ke database
                redirect('Film'); // kembali ke tampilan view film
            } else {
                $config['upload_path']      = './assets/img/film';
                $config['allowed_types']    = 'jpg|png|gif';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Add Film Failed</div>');
                    redirect('Film');
                } else {
                    $img = $this->upload->data('file_name');
                    $data = [
                        'idFilm' => $this->input->post('idFilm'),
                        'JudulFilm' => $this->input->post('JudulFilm'),
                        'Durasi' => $this->input->post('Durasi'),
                        'Sinopsis' => $this->input->post('Sinopsis'),
                        'image' => $img,
                    ];
                    $this->Film_Model->updateFilm($data, $idlama); // melakukan insert data baru ke database
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Film berhasil di update<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); // membuat flash data jika data berhasil di inputkan ke database
                    redirect('Film'); // kembali ke tampilan view film
                }
            }
        }
    }

    public function delFilm($id)
    {
        $this->Film_Model->deleteFilm($id); // menghapus data film berdasarkan id
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Film berhasil diHapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Film'); // kembali ke tampilan view film
    }
}
