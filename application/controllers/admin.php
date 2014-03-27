<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

public function index(){
	$this->load->model('dbe');
	$template['content'] = 	$this->load->view('admin/index',[],true);
	$this->load->view('template',$template);
}

}