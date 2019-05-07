<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kalender_pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kalender_Pembayaran_Model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kalender_pembayaran/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kalender_pembayaran/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kalender_pembayaran/index';
            $config['first_url'] = base_url() . 'kalender_pembayaran/index';
        }

        $config['per_page'] = 10000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kalender_Pembayaran_Model->total_rows($q);
        $kalender_pembayaran = $this->Kalender_Pembayaran_Model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kalender_pembayaran_data' => $kalender_pembayaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
                'judul' => 'Kalender_pembayaran',
                'content' => 'adminstba/layout/content/kalender_pembayaran/tb_kalender_pembayaran_list',
	       );
        $this->load->view('adminstba/layout/layout',$data);
    }

    public function read($id_pembayaran) 
    {
        $row = $this->Kalender_Pembayaran_Model->get_by_id($id_pembayaran);
        if ($row) {
            $data = array(
		'id_pembayaran' => $row->id_pembayaran,
		'nama_pembayaran' => $nama_pembayaran,
		'tanggal_kegiatan_m' => $row->tanggal_kegiatan_m,
        'tanggal_kegiatan_m' => $row->tanggal_kegiatan_s,
	    );
            $this->load->view('admin/kajur/kalender_pembayaran/tb_kalender_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kajur/kalender_pembayaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => '<i class="fa fa-save"></i> Tambah',
            'action' => site_url('admin/kajur/kalender_pembayaran/create_action'),
            'id_pembayaran' => set_value('id_pembayaran'),
            'nama_pembayaran' => set_value('nama_pembayaran'),
            'tanggal_kegiatan_m' => set_value('tanggal_kegiatan_m'),
            'tanggal_kegiatan_s' => set_value('tanggal_kegiatan_s'),
            'judul' => 'Kalender pembayaran',
            'content' => 'adminstba/layout/content/kalender_pembayaran/tb_kalender_pembayaran_form',
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
                'nama_pembayaran' => $this->input->post('nama_pembayaran',TRUE),
                'tanggal_kegiatan_m' => $this->input->post('tanggal_kegiatan_m',TRUE),
                'tanggal_kegiatan_s' => $this->input->post('tanggal_kegiatan_s',TRUE),
            );

            $this->Kalender_Pembayaran_Model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil menambahkan Pembayaran');
            redirect(site_url('admin/kajur/kalender_pembayaran'));
        }
    }
    
    public function update($id_pembayaran) 
    {
        $row = $this->Kalender_Pembayaran_Model->get_by_id($id_pembayaran);

        if ($row) {
            $data = array(
                'button' => '<i class="fa fa-pen"></i> Ubah',
                'action' => site_url('admin/kajur/kalender_pembayaran/update_action'),
                'id_pembayaran' => set_value('id', $row->id_pembayaran),
                'nama_pembayaran' => set_value('nama_pembayaran', $row->nama_pembayaran),
                'tanggal_kegiatan_m' => set_value('tanggal_kegiatan_m', $row->tanggal_kegiatan_m),
                'tanggal_kegiatan_s' => set_value('tanggal_kegiatan_s', $row->tanggal_kegiatan_s),
                'judul' => 'Kalender Pembayaran',
                'content' => 'adminstba/layout/content/kalender_pembayaran/tb_kalender_pembayaran_form',
	       );
        $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kajur/kalender_pembayaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembayaran', TRUE));
        } else {
            $data = array(
                'nama_pembayaran' => $this->input->post('nama_pembayaran',TRUE),
                'tanggal_kegiatan_m' => $this->input->post('tanggal_kegiatan_m',TRUE),
                'tanggal_kegiatan_s' => $this->input->post('tanggal_kegiatan_s',TRUE),
            );

            $this->Kalender_Pembayaran_Model->update($this->input->post('id_pembayaran', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil memperbarui data');
            redirect(site_url('admin/kajur/id_pembayaran'));
        }
    }
    
    public function delete($id_pembayaran) 
    {
        $row = $this->Kalender_Pembayaran_Model->get_by_id($id_pembayaran);

        if ($row) {
            $this->Kalender_Pembayaran_Model->delete($id_pembayaran);
            $this->session->set_flashdata('message', 'Berhasil menghapus data');
            redirect(site_url('admin/kajur/kalender_pembayaran'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/kajur/kalender_pembayaran'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('nama_pembayaran', 'nama_pembayaran', 'trim');
	$this->form_validation->set_rules('tanggal_kegiatan_m', 'tanggal_kegiatan_m', 'trim');
	$this->form_validation->set_rules('tanggal_kegiatan_s', 'tanggal_kegiatan_s', 'trim');
	$this->form_validation->set_rules('id_pembayaran', 'id_pembayaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}