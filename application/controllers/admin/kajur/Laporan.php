<?php

class Laporan extends CI_Controller
{
	function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('admin/login');
    }
  }
	public function index(){
		$this->load->view("adminstba/layout/content/laporan");
	}
	
}

