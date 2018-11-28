<?php
class Student_model extends CI_Model{
    protected $tbl_students = 'students';
    public function getList(){
        return $this->db->select('*')->from($this->tbl_students)->get()->result_array();
    }
    public function show_student_id($data)
    {
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function update_student_id($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('students',$data);
    }
}
?>