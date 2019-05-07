<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Room extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Room_model');
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

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Room_model->total_rows($q);
        $room = $this->Room_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'room_data' => $room,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
                'judul' => 'Ruangan',
                'content' => 'adminstba/layout/content/room/tb_ruangan_list',
	       );
        $this->load->view('adminstba/layout/layout',$data);
    }

    public function read($id) 
    {
        $row = $this->Room_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_ruangan' => $row->nama_ruangan,
		'tipe_ruangan' => $row->tipe_ruangan,
	    );
            $this->load->view('room/tb_ruangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('room'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => '<i class="fa fa-save"></i> Tambah',
            'action' => site_url('admin/baak/room/create_action'),
            'id' => set_value('id'),
            'nama_ruangan' => set_value('nama_ruangan'),
            'tipe_ruangan' => set_value('tipe_ruangan'),
            'kapasitas' => set_value('kapasitas'),
            'judul' => 'Ruangan',
            'content' => 'adminstba/layout/content/room/tb_ruangan_form',
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
                'nama_ruangan' => $this->input->post('nama_ruangan',TRUE),
                'tipe_ruangan' => $this->input->post('tipe_ruangan',TRUE),
                'kapasitas' => $this->input->post('kapasitas',TRUE),
            );

            $this->Room_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil menambahkan ruangan');
            redirect(site_url('admin/baak/room'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Room_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => '<i class="fa fa-pen"></i> Ubah',
                'action' => site_url('admin/baak/room/update_action'),
                'id' => set_value('id', $row->id),
                'nama_ruangan' => set_value('nama_ruangan', $row->nama_ruangan),
                'tipe_ruangan' => set_value('tipe_ruangan', $row->tipe_ruangan),
                'kapasitas' => set_value('kapasitas', $row->kapasitas),
                'judul' => 'Ruangan',
                'content' => 'adminstba/layout/content/room/tb_ruangan_form',
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
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama_ruangan' => $this->input->post('nama_ruangan',TRUE),
                'tipe_ruangan' => $this->input->post('tipe_ruangan',TRUE),
                'kapasitas' => $this->input->post('kapasitas',TRUE),
            );

            $this->Room_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil memperbarui data');
            redirect(site_url('admin/baak/room'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Room_model->get_by_id($id);

        if ($row) {
            $this->Room_model->delete($id);
            $this->session->set_flashdata('message', 'Berhasil menghapus data');
            redirect(site_url('admin/baak/room'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/baak/room'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_ruangan', 'nama ruangan', 'trim|required');
	$this->form_validation->set_rules('tipe_ruangan', 'tipe ruangan', 'trim|required');
	$this->form_validation->set_rules('kapasitas', 'kapasitas', 'trim|required');
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Room.php */
/* Location: ./application/controllers/Room.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-25 20:14:57 */
/* http://harviacode.com */
