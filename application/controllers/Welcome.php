<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('welcome_model','wm');
	}

	public function index() {
		$this->load->view('login');
	}

	public function authenticate(){
		$formdata = $this->input->post();
		$data = $this->wm->login_authentication($formdata);
		if($data['status'] == 'open'){
			$this->session->set_userdata('infodata',$data);
			redirect('welcome/instruction');	
		}else{
			redirect('welcome');
		}		
	}

	public function instruction(){		
		$this->load->view('instruction');
	}

	public function other(){
		$this->load->view('other_instruction');
	}
}
?>