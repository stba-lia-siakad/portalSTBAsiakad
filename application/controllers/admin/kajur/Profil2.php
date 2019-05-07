<?php

class Profil2 extends CI_Controller
{
	function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('admin/login');
    }
  }
	public function index(){
		
		$data['pageTitle'] = 'Profile';
   		$data['pageContent'] = $this->load->view('adminstba/layout/content/profil.php', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('adminstba/layout/layout', $data);
	}
	
}

