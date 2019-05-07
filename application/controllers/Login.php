<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
  }
 
  function index(){
    $this->load->view('adminstba/login_view');
  }
 
  function auth(){
    $email    = $this->input->post('email',TRUE);
    $password = $this->input->post('password',TRUE);
    $validate = $this->login_model->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $user_id  = $data['user_id'];
        $name  = $data['user_name'];
        $email = $data['user_email'];
        $level = $data['user_level'];
        $avatar = $data['avatar'];
        $last_login = $data['last_login'];
        $sesdata = array(
            'last_login'=>date('Y-m-d H:i:s'),
            'user_id'  => $user_id,
            'username'  => $name,
            'email'     => $email,
            'level'     => $level,
            'avatar'     => $avatar,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === '1'){
            redirect('admin/page');
 
        // access login for staff
        }elseif($level === '2'){
            redirect('admin/page/staff');
 
        // access login for author
        }else{
            redirect('admin/page/author');
        }
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('login?warning=Email-dan-Password-tidakditemukan!-Mohon-periksa-kembali');
    }
  }
 
  function logout(){
        date_default_timezone_set("ASIA/JAKARTA");
        $date = array('last_login' => date('Y-m-d H:i:s'));
        $user_id = $this->session->userdata('user_id');
        $this->login_model->logout($date, $user_id);
        $this->session->sess_destroy();
        redirect('login');
  }
 
}