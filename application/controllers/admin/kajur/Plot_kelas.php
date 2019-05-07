<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Plot_kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Plot_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'plot_kelas/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'plot_kelas/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'plot_kelas/index';
            $config['first_url'] = base_url() . 'plot_kelas/index';
        }

        $config['per_page'] = 100000000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Plot_model->total_rows($q);
        $plot_kelas = $this->Plot_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'plot_kelas_data' => $plot_kelas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul' => 'Kelas',
            'content' => 'adminstba/layout/content/plot_kelas/tb_matakuliah_list',
           );
        $this->load->view('adminstba/layout/layout',$data);
    }

    public function read($id) 
    {
        $row = $this->Plot_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mk' => $row->id_mk,
		'kode_mk' => $row->kode_mk,
		'nama_mk' => $row->nama_mk,
		'id_prasyarat' => $row->id_prasyarat,
		'id_kel_mk' => $row->id_kel_mk,
		'sks_mk' => $row->sks_mk,
		'id_jurusan' => $row->id_jurusan,
		'tahun_ajaran' => $row->tahun_ajaran,
		'semester' => $row->semester,
		'status' => $row->status,
		'semester_prodi' => $row->semester_prodi,
	    );
            $this->load->view('plot_kelas/tb_matakuliah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kajur/plot_kelas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('plot_kelas/create_action'),
	    'id_mk' => set_value('id_mk'),
	    'kode_mk' => set_value('kode_mk'),
	    'nama_mk' => set_value('nama_mk'),
	    'id_prasyarat' => set_value('id_prasyarat'),
	    'id_kel_mk' => set_value('id_kel_mk'),
	    'sks_mk' => set_value('sks_mk'),
	    'id_jurusan' => set_value('id_jurusan'),
	    'tahun_ajaran' => set_value('tahun_ajaran'),
	    'semester' => set_value('semester'),
	    'status' => set_value('status'),
	    'semester_prodi' => set_value('semester_prodi'),
	);
        $this->load->view('admin/kajur/plot_kelas/tb_matakuliah_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_mk' => $this->input->post('kode_mk',TRUE),
		'nama_mk' => $this->input->post('nama_mk',TRUE),
		'id_prasyarat' => $this->input->post('id_prasyarat',TRUE),
		'id_kel_mk' => $this->input->post('id_kel_mk',TRUE),
		'sks_mk' => $this->input->post('sks_mk',TRUE),
		'id_jurusan' => $this->input->post('id_jurusan',TRUE),
		'tahun_ajaran' => $this->input->post('tahun_ajaran',TRUE),
		'semester' => $this->input->post('semester',TRUE),
		'status' => $this->input->post('status',TRUE),
		'semester_prodi' => $this->input->post('semester_prodi',TRUE),
	    );

            $this->Plot_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/kajur/plot_kelas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Plot_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('plot_kelas/update_action'),
		'id_mk' => set_value('id_mk', $row->id_mk),
		'kode_mk' => set_value('kode_mk', $row->kode_mk),
		'nama_mk' => set_value('nama_mk', $row->nama_mk),
		'id_prasyarat' => set_value('id_prasyarat', $row->id_prasyarat),
		'id_kel_mk' => set_value('id_kel_mk', $row->id_kel_mk),
		'sks_mk' => set_value('sks_mk', $row->sks_mk),
		'id_jurusan' => set_value('id_jurusan', $row->id_jurusan),
		'tahun_ajaran' => set_value('tahun_ajaran', $row->tahun_ajaran),
		'semester' => set_value('semester', $row->semester),
		'status' => set_value('status', $row->status),
		'semester_prodi' => set_value('semester_prodi', $row->semester_prodi),
	    );
            $this->load->view('plot_kelas/tb_matakuliah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('plot_kelas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mk', TRUE));
        } else {
            $data = array(
		'kode_mk' => $this->input->post('kode_mk',TRUE),
		'nama_mk' => $this->input->post('nama_mk',TRUE),
		'id_prasyarat' => $this->input->post('id_prasyarat',TRUE),
		'id_kel_mk' => $this->input->post('id_kel_mk',TRUE),
		'sks_mk' => $this->input->post('sks_mk',TRUE),
		'id_jurusan' => $this->input->post('id_jurusan',TRUE),
		'tahun_ajaran' => $this->input->post('tahun_ajaran',TRUE),
		'semester' => $this->input->post('semester',TRUE),
		'status' => $this->input->post('status',TRUE),
		'semester_prodi' => $this->input->post('semester_prodi',TRUE),
	    );

            $this->Plot_model->update($this->input->post('id_mk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/kajur/plot_kelas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Plot_model->get_by_id($id);

        if ($row) {
            $this->Plot_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/kajur/plot_kelas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kajur/plot_kelas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_mk', 'kode mk', 'trim|required');
	$this->form_validation->set_rules('nama_mk', 'nama mk', 'trim|required');
	$this->form_validation->set_rules('id_prasyarat', 'id prasyarat', 'trim|required');
	$this->form_validation->set_rules('id_kel_mk', 'id kel mk', 'trim|required');
	$this->form_validation->set_rules('sks_mk', 'sks mk', 'trim|required');
	$this->form_validation->set_rules('id_jurusan', 'id jurusan', 'trim|required');
	$this->form_validation->set_rules('tahun_ajaran', 'tahun ajaran', 'trim|required');
	$this->form_validation->set_rules('semester', 'semester', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('semester_prodi', 'semester prodi', 'trim|required');

	$this->form_validation->set_rules('id_mk', 'id_mk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Plot_kelas.php */
/* Location: ./application/controllers/Plot_kelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-03 23:45:35 */
/* http://harviacode.com */