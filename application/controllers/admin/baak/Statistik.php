
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller{
	function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }

    }
	public function index(){
		$data['title'] = "Jumlah Mahasiswa Per-Tahun";		
		$this->load->view('adminstba/layout/content/statistik/statistik_view',$data, FALSE);
	}

	public function getData(){
		$this->load->model('Statistik_model');
		$data = $this->Statistik_model->getMahasiswa();
		echo json_encode($data);
		
	}

}


