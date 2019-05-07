<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jam extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jam_model');
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
            $config['base_url'] = base_url() . 'jam/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jam/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jam/index';
            $config['first_url'] = base_url() . 'jam/index';
        }

        $config['per_page'] = 10000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jam_model->total_rows($q);
        $jam = $this->Jam_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jam_data' => $jam,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
                'judul' => 'Jam',
                'content' => 'adminstba/layout/content/jam/tb_jam_list',
	       );
        $this->load->view('adminstba/layout/layout',$data);
    }

    public function read($id_jam) 
    {
        $row = $this->Jam_model->get_by_id($id_jam);
        if ($row) {
            $data = array(
		'id_jam' => $row->id_jam,
		'jam_mulai' => $row->jam_mulai,
		'jam_akhir' => $row->jam_akhir,
	    );
            $this->load->view('admin/baak/jam/tb_jam_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/baak/jam'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => '<i class="fa fa-save"></i> Tambah',
            'action' => site_url('admin/baak/jam/create_action'),
            'id_jam' => set_value('id_jam'),
            'jam_mulai' => set_value('jam_mulai'),
            'jam_akhir' => set_value('jam_akhir'),
            'judul' => 'Jam',
            'content' => 'adminstba/layout/content/jam/tb_jam_form',
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
                'jam_mulai' => $this->input->post('jam_mulai',TRUE),
                'jam_akhir' => $this->input->post('jam_akhir',TRUE),
            );

            $this->Jam_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil menambahkan Jam');
            redirect(site_url('admin/baak/Jam'));
        }
    }
    
    public function update($id_jam) 
    {
        $row = $this->Jam_model->get_by_id($id_jam);

        if ($row) {
            $data = array(
                'button' => '<i class="fa fa-pen"></i> Ubah',
                'action' => site_url('admin/baak/jam/update_action'),
                'id_jam' => set_value('id', $row->id_jam),
                'jam_mulai' => set_value('jam_mulai', $row->jam_mulai),
                'jam_akhir' => set_value('jam_akhir', $row->jam_akhir),
                'judul' => 'Jam',
                'content' => 'adminstba/layout/content/jam/tb_jam_form',
	       );
        $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/baak/jam'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jam', TRUE));
        } else {
            $data = array(
                'jam_mulai' => $this->input->post('jam_mulai',TRUE),
                'jam_akhir' => $this->input->post('jam_akhir',TRUE),
            );

            $this->Jam_model->update($this->input->post('id_jam', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil memperbarui data');
            redirect(site_url('admin/baak/jam'));
        }
    }
    
    public function delete($id_jam) 
    {
        $row = $this->Jam_model->get_by_id($id_jam);

        if ($row) {
            $this->Jam_model->delete($id_jam);
            $this->session->set_flashdata('message', 'Berhasil menghapus data');
            redirect(site_url('admin/baak/jam'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/baak/jam'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jam_mulai', 'jam_mulai', 'trim');
	$this->form_validation->set_rules('jam_akhir', 'jam_akhir', 'trim');
	$this->form_validation->set_rules('id_jam', 'id_jam', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
