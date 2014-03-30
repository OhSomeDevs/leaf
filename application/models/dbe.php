<?php

class Dbe extends CI_Model {

    public function __construct() {
           parent::__construct(); 
           $this->load->database();
     }
    private function generateId(){
        return substr(uniqid(rand(10,1000),false),rand(0,10),6);
    }
    function ifTeacherExist($user,$pass){
            $this->db->select('id,firstname,lastname,email,age,profession,school');
            $qry =  $this->db->get_where('teacher',array('username' => (string)$user,'password' => (string)$pass) );
            $rs = $qry->row();
            if(!is_null($rs)){
                return $rs;
            }else{
                return false;
            }
    }
    function ifStudentExist($user,$pass){
            $this->db->select('id,firstname,lastname,course,email,school,age');
            $qry = $this->db->get_where('students', array('username' => (string)$user,'password' => (string)$pass) );
            $rs = $qry->row();
            if(!is_null($rs)){
                return $rs;
            }else{
                return false;
            }        
    }
    function createEvaluation($classId,$name){
            $evalId = $this->generateId();
            $this->db->query("INSERT INTO evaluation VALUES ('{$evalId}','{$classId}','{$name}',current_time)");
            return $evalId;            
    }
    function createQuestion($evalId,$question,$quesType){
            $questionId = $this->generateId();
            $quesData = array(
                    'id' => $questionId,
                    'question_text' => $question,
                    'eval_id' => $evalId,
                    'question_type' => $quesType
                        );
            $this->db->insert('question',$quesData);
            return $questionId;
    }    
    function addChoice($quesId,$ansText){
            $choiceId = $this->generateId();
            $choiceData = array(
                        'id' => $choiceId,
                        'question_id' => $quesId,
                        'answer_text' => $ansText
                            );
            $this->db->insert('choice', $choiceData);            
    }
    function createStudent($studentInfo){
            $studentId = $this->generateId();
            $studentData = array(
                        'id' => $studentId,
                        'username' => $studentInfo['username'],
                        'password' => $studentInfo['password'],
                        'firstname' => $studentInfo['firstname'],
                        'lastname' => $studentInfo['lastname'],
                        'course' => $studentInfo['course'],
                        'email' => $studentInfo['email'],
                        'school' => $studentInfo['school']
                                );
            $this->db->insert('students', $studentData);
    }
    function createTeacher($teacherInfo){
            $teacherId = $this->generateId();
            $teacherData = array(
                        'id' => $teacherId,
                        'username' => $teacherInfo['username'],
                        'password' => $teacherInfo['password'],
                        'firstname' => $teacherInfo['firstname'],
                        'lastname' => $teacherInfo['lastname'],
                        'email' => $teacherInfo['email'],
                        'age' => $teacherInfo['age'],
                        'profession' => $teacherInfo['profession'],
                        'school' => $teacherInfo['school']
                            );
            $this->db->insert('teacher', $teacherData);            
    }
    function checkResults($searchKey,$for){
            if ($for === "name"):
                $qry = $this->db->query("SELECT * FROM get_student_by_name('{$searchKey}') ");
            elseif ($for === "teacherComment"):
                $qry = $this->db->get_where('teachers_comment', array('stud_id' => $searchKey) );      
            elseif($for === "studentByClass"):              
                $qry = $this->db->query("SELECT * FROM get_student_by_class('{$searchKey}') ");
            elseif($for === "studentComment"):
                $qry = $this->db->get_where('comment', array('class_id' => $searchKey) );
            elseif($for === "getAllStudents"):
                $qry = $this->db->get($searchKey);
            elseif($for === "getAllTeachers"):
                $qry = $this->db->get($searchKey);
            elseif($for === "classByTeacher"):
                $qry = $this->db->query("SELECT * FROM get_class_by_teacher('{$searchKey}') ");
            elseif($for === "choicesByQuestion"):
                $qry = $this->db->get_where('choice', array('question_id' => $searchKey));
            endif;
            return $qry->num_rows();
    }
    function getStudentByName($searchKey){
            $qry = $this->db->query("SELECT * FROM get_student_by_name('{$searchKey}') ");
            if($qry->num_rows() > 1):
                return $qry->result();
            else:
                return $qry->row();
            endif;
    }
    function getStudentById($studId){
            $qry = $this->db->get_where('students', array('id' => $studId) );
            return $qry->row();
    }
    function getTeacherById($teacherId){
            $qry = $this->db->get_where('teacher', array('id' => $teacherId) );
            return $qry->row();
    }
    function getTeacherComment($studId){
            $qry = $this->db->get_where('teachers_comment', array('stud_id' => $studId) );
            if($qry->num_rows() > 1):
                return $qry->result();
            else:
                return $qry->row();
            endif;
    }
    function addStudentComment($classId,$comment,$name){
            $commentId = $this->generateId();            
            $commentData = array(
                        'id' => $commentId,
                        'class_id' => $classId,
                        'comment' => $comment,
                        'name' => $name
                            );
            $this->db->insert('comment', $commentData);            
    }
    function addTeacherComment($classId,$studId,$comment){
            $commentId = $this->generateId();
            $commentData = array(
                        'id' => $commentId,
                        'class_id' => $classId,
                        'stud_id' => $studId,
                        'comment' => $comment
                            );
            $this->db->insert('teachers_comment', $commentData);
    }
    function createClass($name, $desc, $pass){
            $classId = $this->generateId();
            $classData = array(
                        'id' => $classId,
                        'name' => $name,
                        'description' => $desc,
                        'password' => $pass
                            );
            $this->db->insert('class', $classData);
    }
    function registerInAClass($classId,$studId,$teacherId){
            $regData = array(
                        'class_id' => $classId,
                        'teacher_id' => $teacherId,
                        'student_id' => $studId
                            );
            $this->db->insert('class_reg', $regData);
    }
    function checkIfJoined($studId,$classId){
            $qry = $this->db->get_where('class_reg', array('student_id' => $studId, 'class_id' => $classId) );
            if($qry->num_rows == 1):
                return true;
            else:
                return false;
            endif;
    }
    function addCloseEndedAnswer($choiceId, $studId){
            $answerData = array(
                        'id' => $choiceId,
                        'stud_id' => $studId
                             );
            $this->db->insert('answer', $answerData);
    }
    function addOpenEndedAnswer($questionId, $studId, $answer){
            $openData = array(
                        'id' => $questionId,
                        'stud_id' => $studId,
                        'answer_text' => $answer
                            );
            $this->db->insert('open_answer', $openData);
    }
    function checkEvaluationAnswered($evalId,$studId){
            $qry = $this->db->get_where('evaluation_answer', array('id' => $evalId, 'stud_id' => $studId) );
            if($qry->num_rows == 1):
                return true;
            else:
                return false;
            endif;
    }
    function countSameAnswers($choiceId){
            $qry = $this->db->get_where('answer', array('id' => $choiceId) );
            return $qry->num_rows();
    }
    function getStudentsByClassId($classId){
            $qry = $this->db->query("SELECT * FROM get_student_by_class('{$classId}') ");
            if($qry->num_rows() > 1):
                return $qry->result();
            else:
                return $qry->row();
            endif;                
    }
    function getStudentsComment($classId){
            $qry = $this->db->get_where('comment', array('class_id' => $classId) );
            if($qry->num_rows() > 1):                
                return $qry->result();
            else:
                return $qry->row();
            endif;
    }
    function getAll($get){
            $qry = $this->db->get($get);
            if($qry->num_rows() > 1):                
                return $qry->result();
            else:
                return $qry->row();
            endif;       
    }
    function getClassByTeacherId($teacherId){
            $qry = $this->db->query("SELECT * FROM get_class_by_teacher('{$teacherId}') ");
            if($qry->num_rows() > 1):
                return $qry->result();
            else:
                return $qry->row();
            endif;
    }
    function getChoicesByQuestionId($questionId){        
            $qry = $this->db->get_where('choice', array('question_id' => $questionId) );
            if($qry->num_rows() > 1):
                return $qry->result();
            else:
                return $qry->rows();
            endif;
    }
}

?>