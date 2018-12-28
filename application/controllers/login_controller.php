<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->lirary('form_validation');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('user');
    }
    public function index()
    {
        $this->load->view('users/login');
    }
    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        if($this->form_validation->run()==false){
            $this->load->view('header');
            $this->load->vew('users/login');
            $this->load->view('footer');
        }else{
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            if($this->user->loginUser($email,$password)){
                $userInfo = $this->user->loginUser($email,$password);
                $this->session->set_flashdata('login_msg', '<div class="alert alert-success text-center">Successfully logged in</div>');
                redirect('student/update_student_id');
                }else{
                $this->session->set_flashdata('login_msg', '<div class="alert alert-danger text-center">Login Failed!! Please try again.</div>');
                $this->load->view('header');
                $this->load->view('users/login');
                $this->load->view('footer');

            }
        }
    }

}