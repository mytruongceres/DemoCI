<?php
class Student_model extends CI_Model{
    protected $tbl_students = 'students';
    public function getList(){
        return $this->db->select('*')->from($this->tbl_students)->get()->result_array();
    }
    public function insert($students)
    {
        $this->db->insert('tb1_students',$students);
    }
}
?>