<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_model');
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
        $config['total_rows'] = $this->Nilai_model->total_rows($q);
        $room = $this->Nilai_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'nilai_data' => $room,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
                'judul' => 'Nilai',
                'content' => 'adminstba/layout/content/nilai/tb_nilai_list',
	       );
        $this->load->view('adminstba/layout/layout',$data);
    }

    public function read($id_nilai) 
    {
        $row = $this->Nilai_model->get_by_id($id_nilai);
        if ($row) {
            $data = array(
		'id_nilai' => $row->id_nilai,
		'nilai_huruf' => $row->nilai_huruf,
		'nilai_angka' => $row->nilai_angka,
	    );
            $this->load->view('admin/baak/nilai/tb_nilai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('room'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => '<i class="fa fa-save"></i> Tambah',
            'action' => site_url('admin/baak/nilai/create_action'),
            'id_nilai' => set_value('id_nilai'),
            'nilai_huruf' => set_value('nilai_huruf'),
            'nilai_angka' => set_value('nilai_angka'),
            'judul' => 'Nilai',
            'content' => 'adminstba/layout/content/nilai/tb_nilai_form',
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
                'nilai_huruf' => $this->input->post('nilai_huruf',TRUE),
                'nilai_angka' => $this->input->post('nilai_angka',TRUE),
            );

            $this->Nilai_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil menambahkan Nilai');
            redirect(site_url('admin/baak/Nilai'));
        }
    }
    
    public function update($id_nilai) 
    {
        $row = $this->Nilai_model->get_by_id($id_nilai);

        if ($row) {
            $data = array(
                'button' => '<i class="fa fa-pen"></i> Ubah',
                'action' => site_url('admin/baak/room/update_action'),
                'id_nilai' => set_value('id', $row->id_nilai),
                'nilai_huruf' => set_value('nilai_huruf', $row->nilai_huruf),
                'nilai_angka' => set_value('nilai_angka', $row->nilai_angka),
                'judul' => 'Nilai',
                'content' => 'adminstba/layout/content/nilai/tb_nilai_form',
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
            $this->update($this->input->post('id_nilai', TRUE));
        } else {
            $data = array(
                'nilai_huruf' => $this->input->post('nilai_huruf',TRUE),
                'nilai_angka' => $this->input->post('nilai_angka',TRUE),
            );

            $this->Jam_model->update($this->input->post('id_nilai', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil memperbarui data');
            redirect(site_url('admin/baak/nilai'));
        }
    }
    
    public function delete($id_nilai) 
    {
        $row = $this->Nilai_model->get_by_id($id_nilai);

        if ($row) {
            $this->Nilai_model->delete($id_nilai);
            $this->session->set_flashdata('message', 'Berhasil menghapus data');
            redirect(site_url('admin/baak/nilai'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/baak/nilai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nilai_huruf', 'nilai_huruf', 'trim');
	$this->form_validation->set_rules('nilai_angka', 'nilai_angka', 'trim');
	$this->form_validation->set_rules('id_nilai', 'id_nilai', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Room.php */
/* Location: ./application/controllers/Room.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-25 20:14:57 */
/* http://harviacode.com */
