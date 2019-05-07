<?php

class Home extends CI_Controller
{
	function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
	public function index(){
		$this->load->model("Jadwal_model");
		$data["fetch_data"] = $this->Jadwal_model->fetch_data();
		$this->load->model("Jadwal_model2");
		$data["fetch_dataak"] = $this->Jadwal_model2->fetch_dataak();
		$this->load->view("adminstba/overview", $data);
	}
	
}

