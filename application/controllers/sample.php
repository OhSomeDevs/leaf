<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sample extends CI_Controller {

	public function index(){		
		$this->load->view('sample/index');		
	}

	public function form_check(){
		/*if ( !is_null($this->input->post('name')) ){
			$this->load->model('dbe');			
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$student = $this->dbe->ifStudentExist($user,$pass);			
			if ($student){
				$data['user'] = $student->firstname . " " . $student->lastname;
				$this->load->view('sample/formcheck',$data);
			}
		}
			$this->load->view('sample/formcheck');*/
		$this->load->model('dbe');
		/*$data['eval_id'] = $this->dbe->createEvaluation('302','ang mga gwapo');
		$data['question_id'] = $this->dbe->createQuestion($data['eval_id'], 'Gwapo si Raven?', 2);
		$this->dbe->addChoice($data['question_id'], 'Yes');
		$this->dbe->addChoice($data['question_id'], 'No');
		 $teacherData = array(
                        'username' => 'love123' ,
                        'password' => 'raboy',
                        'firstname' => 'Love Jhoye',
                        'lastname' => 'Raboy',
                        'email' => 'loveraboy@gmail.com',                                               
                        'age' => 30,
                        'profession' => 'instructor',
                        'school' => 'MUST'
                       );
		 $this->dbe->createTeacher($teacherData);*/
		 //$data['studInfo'] = $this->dbe->getStudentByName('Raven');
		 //$data['count'] = $this->dbe->checkResults('Raven');
		 //$data['studInfo'] = $this->dbe->getStudentById('103');
		 //$data['teacherInfo'] = $this->dbe->getTeacherById('203');
		 //$data['tComment'] = $this->dbe->getTeacherComment('103');
		 //$data['count'] = $this->dbe->checkResults('103' , "teacherComment");
		 //$this->dbe->createClass('c#','walay klase','abc123');
		 //$this->dbe->registerInAClass('303','106','202');
		 //$data['check'] = $this->dbe->checkIfJoined('101', '303');
		 //$this->dbe->addCloseEndedAnswer('3001', 106);
		 //$data['check'] = $this->dbe->checkEvaluationAnswered('1001', '102');
		 //$data['count'] = $this->dbe->countSameAnswers('3002');
		 //$data['student'] = $this->dbe->getStudentsByClassId('305');
		 //$data['count'] = $this->dbe->checkResults('305', 'studentByClass');
		 //$this->dbe->addTeacherComment('301', '107', 'Gwapa kaayo ka!!!');		 
		 //$data['sComment'] = $this->dbe->getStudentsComment('302');		 
		 //$data['count'] = $this->dbe->checkResults('302', 'studentComment');
		 //$data['teachers'] = $this->dbe->getAll('teacher');
		// $data['class'] = $this->dbe->getClassByTeacherId('201');
		 //$data['count'] = $this->dbe->checkResults('201', 'classByTeacher');
		 $data['choices'] = $this->dbe->getChoicesByQuestionId('2001');
		 $data['count'] = $this->dbe->checkResults('2001', "choicesByQuestion");
		$this->load->view('sample/formcheck',$data);
		 //$data['count'] = $this->dbe->checkResults('teacher',"getAllTeachers");
	}

}