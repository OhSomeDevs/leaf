<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function index(){
		$this->load->model('dbe');
		$this->load->view('teacher/index');
	}

	public function register() {
		$template['content'] = $this->load->view('teacher/register',[],true);
		$this->load->view('template',$template);
	}

	public function login(){
		$template['content'] = $this->load->view('teacher/login',[],true);
		$this->load->view('template',$template);
	}

	public function login_teacher(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('dbe');
		$result = $this->dbe->ifTeacherExist($username,$password);
		if(!$result){
			$print['content'] = "success";
			$this->load->view('template',$print);
		}
		else{
			$print['content'] = "failed";
			$this->load->view('template',$print);
		}

	}

	public function add_teacher(){
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['firstname']= $this->input->post('firstame');
		$data['lastname'] = $this->input->post('lastname');
		$data['email'] = $this->input->post('email');
		
		$this->load->model('dbe');
	
		$this->dbe->createTeacher($data);

		$template['content'] = $this->load->view('teacher/register',$data,true);
		$this->load->view('template',$template);
	}

}