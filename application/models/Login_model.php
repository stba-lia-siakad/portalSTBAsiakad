<?php
class Login_model extends CI_Model{
 
  function validate($email,$password){
    $this->db->where('user_email',$email);
    $this->db->where('user_password',$password);
    $result = $this->db->get('tbl_users',1);
    return $result;
  }

public function logout($date, $user_id)
    {
        $this->db->where('tbl_users.user_id', $user_id);
        $this->db->update('tbl_users', $date);
    }
 
}