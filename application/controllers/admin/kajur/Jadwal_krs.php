<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_krs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("jadwal_krs_model");
        $this->load->library('form_validation');
        if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
    }
    

    public function index()
    {
        $data["products"] = $this->jadwal_krs_model->getAll();
        $this->load->view("adminstba/layout/content/jadwal_krs/list", $data);
    }

    public function add()
    {
        $product = $this->jadwal_krs_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("adminstba/layout/content/jadwal_krs/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/kajur/jadwal_krs');
       
        $product = $this->jadwal_krs_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("adminstba/layout/content/jadwal_krs/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->jadwal_mk_model->delete($id)) {
            redirect(site_url('admin/kajur/jadwal_krs'));
        }
    }
}
