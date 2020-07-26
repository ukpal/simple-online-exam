<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {
    
    public function __construct(){      
        parent::__construct();
        $this->load->model('panel_model','pm');
    }

	public function index()	{
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config = [
            'base_url' => base_url('exam/index'),
            'per_page' => 1,
            'total_rows' => $this->pm->totalQuestion(),
            'uri_segment'=>3,
            'num_links'=>4,
            'next_tag_open' => '<li class="list-inline-item border px-4 py-3 rounded-circle">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="list-inline-item border px-4 py-3 rounded-circle">',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li class="list-inline-item border px-4 py-3 rounded-circle">',
            'num_tag_close' => '</li>',
            'cur_tag_open' => '<li class="list-inline-item border px-4 py-3 rounded-circle bg-primary"><a class="text-white">',
            'cur_tag_close' => '</a></li>',
            'last_link' => FALSE,
            'first_link' => FALSE,
                   ];
        $this->load->library('pagination',$config);
        $data['total'] = $this->pm->totalQuestion();
        $data['question'] = $this->pm->getQuestions($offset);
        $data['pagelinks'] = $this->pagination->create_links();
        $this->load->view('exam_panel',$data);
        
    }
    
    public function save(){
        $candidate = $_SESSION['infodata'];
        $data = $this->input->post();
        $res = $this->pm->saveQuestions($data);
        echo json_encode($res);
    }

    public function updateQs(){
        $data['q_id'] = $this->input->post('q_id');
        $data['ans_given'] = $this->input->post('input_ans');
        $res = $this->pm->updateQuestions($data);
        echo json_encode($res);
    }

    public function status_closed(){
        echo 'hi';
    }
}
?>