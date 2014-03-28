<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

	public function index(){
		$this->load->model('dbe');
		$this->load->view('student/index');
	}

	public function register() {
		$template['content'] = $this->load->view('student/register',[],true);
		$this->load->view('template',$template);
	}
	public function	profile() {
		$template['content'] = $this->load->view('student/profile',[],true);
		$this->load->view('template',$template);
	}
	public function classes() {
		$template['content'] = $this->load->view('student/classes',[],true);
		$this->load->view('template',$template);
	}


	public function login(){
		$template['content'] = $this->load->view('student/login',[],true);
		$this->load->view('template',$template);
	}

	public function login_student(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('dbe');
		$result = $this->dbe->ifStudentExist($username,$password);
		if($result === true){
			$print['content'] = "success";
			$this->load->view('template',$print);
		}
		else{
			$print['content'] = "failed...";
			$this->load->view('template',$print);
		}

	}

	public function add_student(){
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['firstname']= $this->input->post('firstname');
		$data['lastname'] = $this->input->post('lastname');
		$data['course'] = $this->input->post('course');
		$data['email'] = $this->input->post('email');
		$data['school'] = $this->input->post('school');

		$this->load->model('dbe');
	
		$this->dbe->createStudent($data);

		
		$template['content'] = $this->load->view('student/index',[],true);
		$this->load->view('template',$template);
	}

}