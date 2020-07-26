<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model','AM');
	}

	public function index()
	{
        if(isset($_COOKIE['admin_id'])){
            $this->session->set_userdata('admin_id',$_COOKIE['admin_id']);
            $this->session->set_userdata('admin_name',$_COOKIE['admin_name']);
            redirect('admin/dashboard');
        }else{
            	redirect('admin/login');	
        }       
    }

    public function login(){
        $this->load->view('admin/login');
    }

    public function dashboard(){
        if(isset($_SESSION['admin_id'])){
            $data = $this->AM->details($_SESSION['admin_id']);
            $this->load->view('admin/dashboard',['data'=>$data]);
        }else{
            redirect('admin');
        }
    }
    
    public function adminRegister(){
        $data = $this->input->post();
        $result = $this->AM->register($data);
        // print_r($result);
        if($result){
            $this->set_admin_Cookie($result);
        }
    }

    public function loginProcess(){
        $data = $this->input->post();
        $result = $this->AM->login($data);
        // print_r($result);
        $this->set_admin_Cookie($result);  
    }

    public function set_admin_Cookie($result){
        $admin_id = $result["id"];
        $admin_name = $result["name"];
        set_cookie('admin_id',$admin_id,'2592000');
        set_cookie('admin_name',$admin_name,'2592000');
        redirect('admin');  
    }


    public function editSubject($sub_id){
        $this->session->set_userdata('sub_id',$sub_id);
        $data = $this->AM->subjectDetails($sub_id);
        $this->load->view('admin/subject',['data'=>$data]);       
    }

    public function addSubject(){
        $formData = $this->input->post();
        $formData['admin_id'] = $_SESSION['admin_id'];
        $this->AM->insertSubject($formData);
        redirect('admin/dashboard');
    }

    public function updateSubject(){
        $formData = $this->input->post();
        $this->AM->updateSubject($formData);
        redirect('admin/dashboard');
    }

    public function deleteSubject($sub_id){
        $this->AM->delete_Subject($sub_id);
        redirect('admin/dashboard');
    }

    public function question($sub_id){     
        $this->session->set_userdata('sub_id',$sub_id);
        $data = $this->AM->questionDetails($sub_id);
        $this->load->view('admin/question',['data'=>$data]); 
    }

    public function getQs($qs_id){
        $data = $this->AM->getQuestion($qs_id);
        // $data['sub_id'] = $_SESSION['sub_id'];
        $this->load->view('admin/edit_question',['data'=>$data]);
    }

    public function addQs(){
        $formData = $this->input->post();
        $formData['sub_id'] = $_SESSION['sub_id'] ;
        $this->AM->insertQs($formData);
        redirect('admin/question/'.$_SESSION['sub_id']);
    }

    public function editQs(){
        $formData = $this->input->post();
        $formData['sub_id'] = $_SESSION['sub_id'] ;
        $this->AM->updateQs($formData);
        redirect('admin/question/'.$_SESSION['sub_id']);     
    }

    public function deleteQs($qs_id){
        $this->AM->delete_qs($qs_id);
        redirect('admin/question/'.$_SESSION['sub_id']); 
    }

    public function candidate($sub_id){
        $this->session->set_userdata('sub_id',$sub_id);
        $data = $this->AM->candidateDetails($sub_id);
        $this->load->view('admin/candidate',['data'=>$data]);
    }

    public function getCn($c_id){
        $data = $this->AM->getCandidate($c_id);
        $this->load->view('admin/edit_candidate',['data'=>$data]);
    }

    public function addCandidate(){
        $formData = $this->input->post();
        $folder = $_SESSION['admin_id'].'_'.$_SESSION['sub_id'].'_'.$_SESSION['admin_name'].'/';
        $dir = './uploads/'.$folder;
        if( is_dir($dir) == false )
        {
            mkdir($dir);
        }
        $name = $formData['roll'].'_'.$_FILES['image']['name'];
        // print_r($name);
        $config=[
            'upload_path' => $dir,
            'allowed_types' => 'gif|jpg|png|jpeg',
            'file_name' => $name,
        ];
        $this->load->library('upload',$config);
        $this->upload->do_upload('image');
        $data = $this->upload->data();
        // print_r($data);
        $error = $this->upload->display_errors();
        $formData['image'] = $folder.$name;
        $formData['sub_id'] = $_SESSION['sub_id'];
        $this->AM->insertCn($formData);
        redirect('admin/candidate/'.$_SESSION['sub_id']); 
    }

    public function editCn(){
        $formData = $this->input->post();
        $this->AM->updateCn($formData);
        redirect('admin/candidate/'.$_SESSION['sub_id']);      
    }

    public function deleteCn($c_id){
        $this->AM->delete_cn($c_id);
        redirect('admin/candidate/'.$_SESSION['sub_id']); 
    }

    public function logout(){
        // $this->session->unset_userdata('admin_name');
        delete_cookie('admin_id');
        delete_cookie('admin_name');
        session_destroy();
        redirect('admin');
    }

    public function rank($sub_id){
        $this->AM->generate_rank($sub_id);
        $data = $this->AM->get_rank($sub_id);
        $this->load->view('admin/rank',['data'=>$data]);
    }
}
?>