<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("student_model");
        $this->load->helper(array('form', 'file','url'));
    }
    public function index(){
        $this->load->model("student_model");
        $data["list"] = $this->student_model->getList();
        $this->load->view("student/index", $data);
    }
    public function add(){
        $this->load->helper(array('form','file','url'));
        $this->load->library('form_validation');
        if ($this->input->post("btnadd")) {
            /*   echo "<pre>";
               print_r($_FILES);
               die; */
            $data["name"] = $this->input->post("name");
            $data["age"] = $this->input->post("age");
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path'] = './upload';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '500';
                $config['max_width']     = '1500';
                $config['max_height']    = '1500';
                $config['file_name'] = $_FILES['image']['name'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $uploadData = $this->upload->data();
                    $data["image"] = $uploadData['file_name'];
                }
            }
            $this->form_validation->set_rules("name", "Tên sinh viên", "required|min_length[3]");
            $this->form_validation->set_rules("age", "Tuổi", "required|is_numeric");
            if ($this->form_validation->run() == TRUE) {
                $this->db->insert("students", $data);
                header('Location: index');
            }
        }
        $this->load->view("student/add");
    }
    public  function delete_user($id)
    {
        $this->db->where("id","$id");
        $this->db->delete("students");
        redirect("student/index");
    }
    public function show_student_id()
    {
        $id = $this->uri->segment(3);
        $data['students'] = $this->student_model->getList();
        $data['single_student'] = $this->student_model->show_student_id($id);
        $this->load->view('student/update',$data);
    }
    public function update_student_id()
    {
        $id = $this->input->post('id');
        $data = array(
            'name' =>$this->input->post('name'),
            'age' =>$this->input->post('age')
        );
        $this->student_model->update_student_id($id,$data);
        $this->show_student_id();
    }
}
?>