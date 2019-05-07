<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Beasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Beasiswa_model');
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
            $config['base_url'] = base_url() . 'room/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'room/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'room/index';
            $config['first_url'] = base_url() . 'room/index';
        }

        $config['per_page'] = 10000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Beasiswa_model->total_rows($q);
        $room = $this->Beasiswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'beasiswa_data' => $room,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
                'judul' => 'Beasiswa',
                'content' => 'adminstba/layout/content/beasiswa/tb_beasiswa_list',
	       );
        $this->load->view('adminstba/layout/layout',$data);
    }

    public function read($id_beasiswa) 
    {
        $row = $this->beasiswa_model->get_by_id($id_beasiswa);
        if ($row) {
            $data = array(
		'id_beasiswa' => $row->id_beasiswa,
		'nama_beasiswa' => $row->nama_beasiswa,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('admin/baak/beasiswa/tb_beasiswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('room'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => '<i class="fa fa-save"></i> Tambah',
            'action' => site_url('admin/baak/beasiswa/create_action'),
            'id_beasiswa' => set_value('id_beasiswa'),
            'nama_beasiswa' => set_value('nama_beasiswa'),
            'keterangan' => set_value('keterangan'),
            'judul' => 'beasiswa',
            'content' => 'adminstba/layout/content/beasiswa/tb_beasiswa_form',
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
                'nama_beasiswa' => $this->input->post('nama_beasiswa',TRUE),
                'keterangan' => $this->input->post('keterangan',TRUE),
            );

            $this->Beasiswa_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil menambahkan Beasiswa');
            redirect(site_url('admin/baak/Beasiswa'));
        }
    }
    
    public function update($id_beasiswa) 
    {
        $row = $this->Beasiswa_model->get_by_id($id_beasiswa);

        if ($row) {
            $data = array(
                'button' => '<i class="fa fa-pen"></i> Ubah',
                'action' => site_url('admin/baak/room/update_action'),
                'id_beasiswa' => set_value('id', $row->id_beasiswa),
                'nama_beasiswa' => set_value('nama_beasiswa', $row->nama_beasiswa),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'judul' => 'Beasiswa',
                'content' => 'adminstba/layout/content/beasiswa/tb_beasiswa_form',
	       );
        $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/baak/room'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_beasiswa', TRUE));
        } else {
            $data = array(
                'nama_beasiswa' => $this->input->post('nama_beasiswa',TRUE),
                'keterangan' => $this->input->post('keterangan',TRUE),
            );

            $this->Beasiswa_model->update($this->input->post('id_beasiswa', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil memperbarui data');
            redirect(site_url('admin/baak/beasiswa'));
        }
    }
    
    public function delete($id_beasiswa) 
    {
        $row = $this->Beasiswa_model->get_by_id($id_beasiswa);

        if ($row) {
            $this->Beasiswa_model->delete($id_beasiswa);
            $this->session->set_flashdata('message', 'Berhasil menghapus data');
            redirect(site_url('admin/baak/Beasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/baak/Beasiswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_beasiswa', 'nama_beasiswa', 'trim');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim');
	$this->form_validation->set_rules('id_beasiswa', 'id_beasiswa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Room.php */
/* Location: ./application/controllers/Room.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-25 20:14:57 */
/* http://harviacode.com */
