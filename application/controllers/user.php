<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'file','url'));

    }
    public function register()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_rules('email','Email','required|valid_email|xss_clean');
        $this->form_validation->set_rules('name', 'Họ và tên', 'required|min_length[8]|xss_clean');
        //phone:  bắt buộc - tối thiểu 8 ký tự - phai la số
        $this->form_validation->set_rules('phone', 'Số điện thoại', 'required|min_length[8]|numeric|xss_clean');
        //password:  bắt buộc - tối thiểu 6 ký tự - phai la số
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]|numeric|xss_clean');
        //re_password:  bắt buộc - phải giống với password
        $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'required|matches[password]|xss_clean');
        if($this->form_validation->run())
        {
            //các dữ liệu nhập hợp lệ
            //đăng ký thành viên thành công
        }
        //hiển thị view
        $this->load->view('user/register');
    }
}

?>