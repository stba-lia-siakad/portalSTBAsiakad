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
        $name  = $data['user_name'];
        $email = $data['user_email'];
        $level = $data['user_level'];
        $avatar = $data['avatar'];
        $sesdata = array(
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

        }elseif($level === '3'){
            redirect('admin/page/author');
            
        }elseif($level === '4'){
            redirect('admin/page/keuangan');
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
      $this->session->sess_destroy();
      redirect('login');
  }
 
}