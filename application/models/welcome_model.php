<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class welcome_model extends CI_Model {

    function login_authentication($formdata){
        $roll = $formdata['roll']; $dob = $formdata['dob'];
        $data = $this->db->query("SELECT s.sub_id,s.sub_name,s.duration,c.status,c.name,c.roll,c.image FROM subject s JOIN candidate c on s.sub_id=c.sub_id WHERE c.roll=$roll and c.dob='$dob'")->row_array();
        return $data;
    }

}

?>  