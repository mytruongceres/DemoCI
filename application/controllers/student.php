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
    public function home()
    {
        $this->load->library('make_bread');
        $this->make_bread->add('Index','student/index',TRUE);
        $this->make_bread->add('Edit','update_student_id',TRUE);
        $breadcrumb = $this->make_bread->output();
        echo $breadcrumb;
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
            $this->form_validation->set_rules("age", "Tuổi", "required|is_natural_no_zero");
            if ($this->form_validation->run() == TRUE) {
                $this->db->insert("students", $data);
                redirect('student/update_student_id');
            }
        }
        $this->load->view("student/add");
    }
    public  function delete_user($id)
    {
        $this->db->where("id","$id");
        $this->db->delete("students");
        redirect("student/update_student_id");
    }
    public function show_student_id()
    {
        $id = $this->uri->segment(3);
        $data['students'] = $this->student_model->getList();
        $data['single_student'] = $this->student_model->show_student_id($id);
        $this->load->view('student/update',$data);
    }
 /*   public function edit()
    {
        $id = $this->uri->segment(3);

        if (empty($id))
        {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Edit a news item';
        $data['student_item'] = $this->student_model->get_student_by_id($id);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('student/edit', $data);
        }else
        {
            $this->student_model->set_student($id);
            redirect( base_url() . 'index.php/student');
        }
    }
*/

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