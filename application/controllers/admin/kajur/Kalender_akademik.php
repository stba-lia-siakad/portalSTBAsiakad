<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kalender_akademik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kalender_Akademik_Model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kalender_akademik/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kalender_akademik/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kalender_akademik/index';
            $config['first_url'] = base_url() . 'kalender_akademik/index';
        }

        $config['per_page'] = 10000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kalender_Akademik_Model->total_rows($q);
        $kalender_akademik = $this->Kalender_Akademik_Model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kalender_akademik_data' => $kalender_akademik,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
                'judul' => 'Kalender_akademik',
                'content' => 'adminstba/layout/content/kalender_akademik/tb_kalender_akademik_list',
	       );
        $this->load->view('adminstba/layout/layout',$data);
    }

    public function read($id_kegiatan) 
    {
        $row = $this->Kalender_Akademik_Model->get_by_id($id_kegiatan);
        if ($row) {
            $data = array(
		'id_kegiatan' => $row->id_kegiatan,
		'nama_kegiatan' => $nama_kegiatan,
		'tanggal_kegiatan_m' => $row->tanggal_kegiatan_m,
        'tanggal_kegiatan_m' => $row->tanggal_kegiatan_s,
	    );
            $this->load->view('admin/kajur/kalender_akademik/tb_kalender_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kajur/kalender_akademik'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => '<i class="fa fa-save"></i> Tambah',
            'action' => site_url('admin/kajur/kalender_akademik/create_action'),
            'id_kegiatan' => set_value('id_kegiatan'),
            'nama_kegiatan' => set_value('nama_kegiatan'),
            'tanggal_kegiatan_m' => set_value('tanggal_kegiatan_m'),
            'tanggal_kegiatan_s' => set_value('tanggal_kegiatan_s'),
            'judul' => 'Kalender akademik',
            'content' => 'adminstba/layout/content/kalender_akademik/tb_kalender_akademik_form',
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
                'nama_kegiatan' => $this->input->post('nama_kegiatan',TRUE),
                'tanggal_kegiatan_m' => $this->input->post('tanggal_kegiatan_m',TRUE),
                'tanggal_kegiatan_s' => $this->input->post('tanggal_kegiatan_s',TRUE),
            );

            $this->Kalender_Akademik_Model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil menambahkan Kegiatan');
            redirect(site_url('admin/kajur/kalender_akademik'));
        }
    }
    
    public function update($id_kegiatan) 
    {
        $row = $this->Kalender_Akademik_Model->get_by_id($id_kegiatan);

        if ($row) {
            $data = array(
                'button' => '<i class="fa fa-pen"></i> Ubah',
                'action' => site_url('admin/kajur/kalender_akademik/update_action'),
                'id_kegiatan' => set_value('id', $row->id_kegiatan),
                'nama_kegiatan' => set_value('nama_kegiatan', $row->nama_kegiatan),
                'tanggal_kegiatan_m' => set_value('tanggal_kegiatan_m', $row->tanggal_kegiatan_m),
                'tanggal_kegiatan_s' => set_value('tanggal_kegiatan_s', $row->tanggal_kegiatan_s),
                'judul' => 'Kalender akademik',
                'content' => 'adminstba/layout/content/kalender_akademik/tb_kalender_akademik_form',
	       );
        $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kajur/kalender_akademik'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kegiatan', TRUE));
        } else {
            $data = array(
                'nama_kegiatan' => $this->input->post('nama_kegiatan',TRUE),
                'tanggal_kegiatan_m' => $this->input->post('tanggal_kegiatan_m',TRUE),
                'tanggal_kegiatan_s' => $this->input->post('tanggal_kegiatan_s',TRUE),
            );

            $this->Kalender_Akademik_Model->update($this->input->post('id_kegiatan', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil memperbarui data');
            redirect(site_url('admin/kajur/id_kegiatan'));
        }
    }
    
    public function delete($id_kegiatan) 
    {
        $row = $this->Kalender_Akademik_Model->get_by_id($id_kegiatan);

        if ($row) {
            $this->Kalender_Akademik_Model->delete($id_kegiatan);
            $this->session->set_flashdata('message', 'Berhasil menghapus data');
            redirect(site_url('admin/kajur/kalender_akademik'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/kajur/kalender_akademik'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('nama_kegiatan', 'nama_kegiatan', 'trim');
	$this->form_validation->set_rules('tanggal_kegiatan_m', 'tanggal_kegiatan_m', 'trim');
	$this->form_validation->set_rules('tanggal_kegiatan_s', 'tanggal_kegiatan_s', 'trim');
	$this->form_validation->set_rules('id_kegiatan', 'id_kegiatan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}