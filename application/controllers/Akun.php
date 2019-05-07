<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Akun_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'akun/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'akun/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'akun/index';
            $config['first_url'] = base_url() . 'akun/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Akun_model->total_rows($q);
        $akun = $this->Akun_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'akun_data' => $akun,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul' => 'Akun',
            'content' => 'adminstba/layout/content/akun/tbl_akun_list',
        );
        $this->load->view('adminstba/layout/layout',$data);
    }

    public function konfig(){
        if($this->input->post()){
            $id_ta=$this->input->post('id_ta');
            $ta=$this->input->post('ta');
            $smt=$this->input->post('smt');

            $data = array(
                'ta' => $ta,
                'smt' => $smt,
            );
            $this->db->where('id_ta', $id_ta);
            $this->db->update('setup_aktif', $data);
            redirect('akun/konfig');
        }else{
            $ta_aktif=$this->db->query("select * from setup_aktif")->row();
            $data = array(
                'judul' => 'Konfigurasi TA Aktif',
                'content' => 'adminstba/layout/content/akun/konfig',
                'data' => $ta_aktif,
            );
            $this->load->view('adminstba/layout/layout',$data);
        }
    }

    public function read($id) 
    {
        $row = $this->Akun_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nomor_induk' => $row->nomor_induk,
		'pass' => $row->pass,
		'status' => $row->status,
	    );
            $this->load->view('akun/tbl_akun_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('akun'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('akun/create_action'),
            'id' => set_value('id'),
            'nomor_induk' => set_value('nomor_induk'),
            'pass' => set_value('pass'),
            'status' => set_value('status'),
            'judul' => 'Akun',
            'content' => 'akun/tbl_akun_form_plus',
        );
        $this->load->view('layout/layout',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nomor_induk' => $this->input->post('nomor_induk',TRUE),
                'pass' => md5($this->input->post('pass',TRUE)),
                'status' => $this->input->post('status',TRUE),
            );
            $data2 = array(
                'nomor_induk' => $this->input->post('nomor_induk',TRUE),
                'nama' => $this->input->post('nama',TRUE),
            );

            $this->Akun_model->insert($data,$data2);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('akun'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Akun_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => '<i class="fa fa-pencil"></i> Perbarui',
                'action' => site_url('akun/update_action'),
                'id' => set_value('id', $row->id),
                'nomor_induk' => set_value('nomor_induk', $row->nomor_induk),
                'pass' => set_value('pass', $row->pass),
                'status' => set_value('status', $row->status),
                'judul' => 'Akun',
                'content' => 'akun/tbl_akun_form',
            );
            $this->load->view('layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('akun'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            
            $data = array(
                'nomor_induk' => $this->input->post('nomor_induk',TRUE),
                'pass' => md5($this->input->post('pass',TRUE)),
                'status' => $this->input->post('status',TRUE),
	        );

            $this->Akun_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('akun'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Akun_model->get_by_id($id);

        if ($row) {
            $this->Akun_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('akun'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('akun'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomor_induk', 'nomor induk', 'trim|required');
	$this->form_validation->set_rules('pass', 'pass', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Akun.php */
/* Location: ./application/controllers/Akun.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-18 08:09:37 */
/* http://harviacode.com */