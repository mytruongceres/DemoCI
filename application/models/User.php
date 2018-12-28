<?php if(! defined('BASEPATH')) exit ('No direct script access allowed ');
class User extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->userTbl = 'users';
    }
    function login($email,$password)
    {
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {
            return true;
        }else
        {
            return false;
        }
    }
 /*  function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->userTbl);

        if(array_key_exists("Conditions",$params)){
            foreach ($params['conditions'] as $key => $value){
                $this->db->where($key,$value);
            }
        }
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else {
            //set star and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);

            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $query->num_rows();
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
            }else{
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        return $result;
    }
    /*insert users information*/
    public function insert($data = array()){
        //add created and modified data if not include
        if(!array_key_exists("created",$data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified",$data)){
            $data['modified'] = date("Y-m-d");
        }

        //insert users data to users table
        $insert = $this->db->insert($this->userTbl,$data);

        //return the status
        if($insert)
        {
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function insertEmployee($data){
        return $this->db->insert('users',$data);
    }
 /*   public function sendEmail($receiver){
        $from = "ngocmy.truong29@gmail.com";
        $subject = 'Verify email address';

        $message = 'Dear User,<br><br> Please click on the below activation link to verify your email address<br><br>
 <a href=\'http://www.localhost/DemoCI/Users/confirmEmail/'.md5($receiver).'\'>http://www.localhost/DemoCI/Users/confirmEmail/'. md5($receiver) .'</a><br><br>Thanks';
        //config email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from;
        $config['smtp_pass'] = '******';  //sender's password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n";

        $this->load->library('email', $config);
        $this->email->initialize($config);
        //send email
        $this->email->from($from);
        $this->email->to($receiver);
        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send()){
            //for testing
            echo "sent to: ".$receiver."<br>";
            echo "from: ".$from. "<br>";
            echo "protocol: ". $config['protocol']."<br>";
            echo "message: ".$message;
            return true;
        }else{
            echo "email send failed";
            return false;
        }

    }
    function verifyEmail($key){
        $data = array('status' => 1);
        $this->db->where('md5(email)',$key);
        return $this->db->update('users', $data);    //update status as 1 to make active user
    } */

    public function resolve_user_login($email,$password){
        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('email',$email);
        $hash = $this->db->get()->row('password');
        return $this->verify_password_hash($password,$hash);
    }

    public function get_user_id_form_email($email){
        $this->db->select('id');
        $this->db->form('users');
        $this->db->where('email',$email);
        return $this->db->get()->row('id');
    }
    public function get_user($id){
        $this->db->form('users');
        $this->db->where('id',$id);
        return $this->db->get()->row();
    }
    public function verify_password_hash($password,$hash){
        return password_verify($password,$hash);
    }
}
