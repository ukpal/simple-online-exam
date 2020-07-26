<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class panel_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['infodata'])){
            redirect('welcome');
        }  
    }
    
    function totalQuestion(){
        $candidate = $_SESSION['infodata'];
        $sub_id = $candidate['sub_id'];
        $roll = $candidate['roll'];
        $this->db->where('roll',$roll)->update('candidate',['status'=>'closed']);
        return $this->db->where('sub_id',$sub_id)->get('question')->num_rows();
        
    }

    public function getQuestions($offset){
        $candidate = $_SESSION['infodata'];
        $sub_id = $candidate['sub_id'];
        $roll = $candidate['roll'];
        $qs = $this->db->query("select * from question where sub_id=$sub_id order by q_id asc limit $offset,1")->row_array();
        $q_id = $qs['q_id'];
        $submit = $this->db->query("select * from submitted where roll=$roll and q_id=$q_id")->row_array();
        return array($qs , $submit);
    } 

    public function saveQuestions($data){
        $candidate = $_SESSION['infodata'];
        $roll = $candidate['roll'];
        $q_id = $data['q_id'];
        $input_ans = $data['input_ans'];
        return $this->db->query("insert into submitted(roll,q_id,ans_given) values($roll,$q_id,$input_ans)");
    }

    public function updateQuestions($data){
        return $this->db->where('q_id',$data['q_id'])->update('submitted',['ans_given'=>$data['ans_given']]);
    }
}
?>  