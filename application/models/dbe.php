<?php

class Dbe extends CI_Model {

    public function __construct() {
           parent::__construct(); 
           $this->load->database();
     }

    function getUsers(){
         $query = $this->db->query("SELECT * FROM users");
         return $query->result();
    }

    function createStudent($user){
    	$this->db->set('users',$user);
    }

    function ifStudentExist($user,$password) {
        $user1 = "dimful";
        $pass = "123";
        if($user1 == $user && $pass == $password){
            return true;
        }
        else{
            return $user;
        }
        
    }
    function ifTeacherExist($user,$password) {
        $user1 = "dimful";
        $pass = "123";
        if($user1 == $user && $pass == $password){
            return true;
        }
        else{
            return $user;
        }
        
    }
}

?>