<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {
    
   public function register($data){
        $this->db->insert('admin',$data);
        $result = $this->login($data);
        return $result;
   }
   public function login($data){
       return $this->db->where(['email'=>$data['email'],'password'=>$data['password']])->get('admin')->row_array();
   }

   public function details($admin_id){
       return $this->db->order_by('sub_id','desc')->where(['admin_id'=>$admin_id])->get('subject')->result();
   
   }

   public function subjectDetails($sub_id){
       return $this->db->where(['sub_id'=>$sub_id])->get('subject')->result_array();
   }

   public function addSubject($data){
       return  $this->db->insert('subject',$data);     
   }

   public function updateSubject($formData){
       $data = [
           'sub_name'=>$formData['sub_name'],
           'advt_no'=>$formData['advt_no'],
           'duration'=>$formData['duration'],
           'positive'=>$formData['positive'],
           'negative'=>$formData['negative'],
           'status'=>$formData['status']
        ];
        if($formData['status']=='closed'){
            $this->db->where('sub_id',$formData['sub_id'])->update('candidate',['status'=>'closed']);
        }
       return $this->db->where('sub_id',$formData['sub_id'])->update('subject',$data);
   }

   public function delete_Subject($sub_id){
       $this->db->where('sub_id',$sub_id)->delete('subject');
   }

   public function insertSubject($formData){
       return $this->db->insert('subject',$formData);
   }

   public function questionDetails($sub_id){
       return $this->db->order_by('q_id','desc')->where(['sub_id'=>$sub_id])->get('question')->result();
   }

   public function getQuestion($qs_id){
       return $this->db->where(['q_id'=>$qs_id])->get('question')->result_array();
   }

   public function updateQs($formData){
        $data = [
            'q_des'=>$formData['q_des'],
            'option_1'=>$formData['option_1'],
            'option_2'=>$formData['option_2'],
            'option_3'=>$formData['option_3'],
            'option_4'=>$formData['option_4'],
            'answer'=>$formData['answer'],
        ];
        return $this->db->where('q_id',$formData['q_id'])->update('question',$data);
   }

   public function insertQs($formData){
        $result = $this->db->insert('question',$formData);
        $strd_proc = "CALL `totalQuestion`(?)";
        $this->db->query($strd_proc,$formData["sub_id"]);
        return $result;
   }

   public function delete_qs($qs_id){
       $this->db->where('q_id',$qs_id)->delete('question');
   }

   public function candidateDetails($sub_id){
       return $this->db->order_by('id','desc')->where(['sub_id'=>$sub_id])->get('candidate')->result();
   }

   public function getCandidate($c_id){
       return $this->db->where(['id'=>$c_id])->get('candidate')->result_array();
   }

   public function insertCn($formData){
        $result = $this->db->insert('candidate',$formData);
        $strd_proc = "CALL `totalCandidate`(?)";
        $this->db->query($strd_proc,$formData["sub_id"]);
        return $result;
   }

   public function updateCn($formData){
        $data = [
            'name'=>$formData['name'],
            'roll'=>$formData['roll'],
            'dob'=>$formData['dob'],
        ];
        return $this->db->where('id',$formData['id'])->update('candidate',$data);   
    }

    public function delete_cn($c_id){
        $this->db->where('id',$c_id)->delete('candidate');
    }

    public function generate_rank($sub_id){
        $subject = $this->db->where('sub_id',$sub_id)->get('subject')->result();
        foreach($subject as $sub):
            $right = $sub->positive;
            $wrong = $sub->negative;
        endforeach;
        $candidates = $this->db->where('sub_id',$sub_id)->get('candidate')->result();
        foreach($candidates as $cand):
            $positive = 0; $negative = 0;
            $roll = $cand->roll;
            $submit = $this->db->query("select q.q_id,q.answer,s.ans_given,s.roll from question q join submitted s on q.q_id=s.q_id WHERE s.roll=$roll")->result();
            foreach($submit as $submit_detail):
                if($submit_detail->answer == $submit_detail->ans_given){
                    $positive += $right;
                }else{
                    $negative += $wrong;
                }
                // print_r($submit_detail)."<br>";
            endforeach;
            $score = $positive - $negative;
            $has_roll = $this->db->where('roll',$roll)->get('completion')->row_array();
            if(empty($has_roll)){
                $data = [
                    'roll'=>$roll,
                    'sub_id'=>$sub_id,
                    'score'=>$score
                ];
                $this->db->insert('completion',$data);
            }
        endforeach;
    }

    public function get_rank($sub_id){
        return $this->db->where('sub_id',$sub_id)->order_by('score','desc')->get('completion')->result();
    }

}

?>  