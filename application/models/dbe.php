<?php

class Dbe extends CI_Model {

    public function __construct() {
           parent::__construct(); 
           $this->load->database();
     }

    function ifTeacherExist($user,$pass){
            $query = $this->db->get('teacher');
            $result = $query->result();
            if($result){
                return $result;
            }else{
                return false;
            }
    }
}

?>