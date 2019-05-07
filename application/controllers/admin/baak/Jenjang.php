<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenjang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenjang_model');
        $this->load->library('form_validation');
        if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenjang/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenjang/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenjang/index';
            $config['first_url'] = base_url() . 'jenjang/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenjang_model->total_rows($q);
        $jenjang = $this->Jenjang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenjang_data' => $jenjang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul' => 'Jenjang',
            'content' => 'adminstba/layout/content/jenjang/tb_jenjang_list',
        );
        $this->load->view('adminstba/layout/layout',$data);
    }

    public function read($id) 
    {
        $row = $this->Jenjang_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_jenjang' => $row->id_jenjang,
                'nama_jenjang' => $row->nama_jenjang,
                'judul' => 'Jenjang',
                'content' => 'adminstba/layout/content/jenjang/tb_jenjang_read',
            );
            $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenjang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => '<i class="fa fa-save"></i> Simpan',
            'action' => site_url('jenjang/create_action'),
            'id_jenjang' => set_value('id_jenjang'),
            'nama_jenjang' => set_value('nama_jenjang'),
            'judul' => 'Jenjang',
            'content' => 'adminstba/layout/content/jenjang/tb_jenjang_form',
        );
        $this->load->view('adminstba/layout/layout',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_jenjang' => $this->input->post('nama_jenjang',TRUE),
            );

            $this->Jenjang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenjang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenjang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => '<i class="fa fa-pencil"></i> Ubah',
                'action' => site_url('jenjang/update_action'),
                'id_jenjang' => set_value('id_jenjang', $row->id_jenjang),
                'nama_jenjang' => set_value('nama_jenjang', $row->nama_jenjang),
                'judul' => 'Jenjang',
                'content' => 'adminstba/layout/content/jenjang/tb_jenjang_form',
            );
            $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenjang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenjang', TRUE));
        } else {
            $data = array(
                'nama_jenjang' => $this->input->post('nama_jenjang',TRUE),
            );

            $this->Jenjang_model->update($this->input->post('id_jenjang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenjang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenjang_model->get_by_id($id);

        if ($row) {
            $this->Jenjang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenjang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenjang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_jenjang', 'nama jenjang', 'trim|required');

	$this->form_validation->set_rules('id_jenjang', 'id_jenjang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenjang.php */
/* Location: ./application/controllers/Jenjang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-25 21:00:11 */
/* http://harviacode.com */