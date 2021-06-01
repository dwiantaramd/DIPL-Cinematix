<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('userModel');
    }

    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/Login');
            $this->load->view('templates/auth_footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->userModel->getUser($username);
            if ($user) {
                if ($password == $user['Password']) {
                    $data = [
                        'username' => $user['Username'],
                        'role' => $user['JenisAkun']
                    ];
                    $this->session->set_userdata($data);
                    if ($data['role'] == "0") {
                        redirect('Admin');
                    } else {
                        redirect('User');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong Password </div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username has not been registered </div>');
                redirect('Auth');
            }
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[customer.email]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nohp', 'Phone', 'required|trim');
        $this->form_validation->set_rules('tglLahir', 'TglLahir', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password does not match',
            'min_length' => 'Password is too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Cinematix Sign-up ';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/Register');
            $this->load->view('templates/auth_footer');
        } else {
            $data1 = [
                'Username' => $this->input->post('username'),
                'Password' => $this->input->post('password1'),
                'Nama' => $this->input->post('name'),
                'JenisAkun' => 1,
            ];

            $data2 = [
                'Username' => $this->input->post('username'),
                'Email' => $this->input->post('email'),
                'Alamat' => $this->input->post('alamat'),
                'NoTelp' => $this->input->post('nohp'),
                'TglLahir' => $this->input->post('tglLahir'),
            ];
            $this->userModel->insertUser($data1);
            $this->userModel->insertCustomer($data2);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your account has been created </div>');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        redirect(base_url());
    }
}
