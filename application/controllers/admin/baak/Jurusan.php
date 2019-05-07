<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jurusan_model');
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
            $config['base_url'] = base_url() . 'jurusan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jurusan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jurusan/index';
            $config['first_url'] = base_url() . 'jurusan/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jurusan_model->total_rows($q);
        $jurusan = $this->Jurusan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jurusan_data' => $jurusan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'jenjangs' => $this->db->query("select * from tb_jenjang")->result(),
                'judul' => 'Jurusan',
                'content' => 'adminstba/layout/content/jurusan/tb_jurusan_list',
           );
        $this->load->view('adminstba/layout/layout',$data);
    }

    public function read($id) 
    {
        $row = $this->Jurusan_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_jurusan' => $row->id_jurusan,
        'nama_jurusan' => $row->nama_jurusan,
        'id_jenjang' => $row->id_jenjang,
                'judul' => 'Jurusan',
                'content' => 'adminstba/layout/content/jurusan/tb_jurusan_read',
           );
        $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jurusan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => '<i class="fa fa-save"></i> Simpan',
            'action' => site_url('jurusan/create_action'),
        'id_jurusan' => set_value('id_jurusan'),
        'nama_jurusan' => set_value('nama_jurusan'),
        'id_jenjang' => set_value('id_jenjang'),
            'jenjangs' => $this->db->query("select * from tb_jenjang")->result(),
                'judul' => 'Jurusan',
                'content' => 'adminstba/layout/content/jurusan/tb_jurusan_form',
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
        'nama_jurusan' => $this->input->post('nama_jurusan',TRUE),
        'id_jenjang' => $this->input->post('id_jenjang',TRUE),
        );

            $this->Jurusan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jurusan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jurusan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => '<i class="fa fa-pencil"></i> Ubah',
                'action' => site_url('jurusan/update_action'),
        'id_jurusan' => set_value('id_jurusan', $row->id_jurusan),
        'nama_jurusan' => set_value('nama_jurusan', $row->nama_jurusan),
        'id_jenjang' => set_value('id_jenjang', $row->id_jenjang),
            'jenjangs' => $this->db->query("select * from tb_jenjang")->result(),
                'judul' => 'Jurusan',
                'content' => 'adminstba/layout/content/jurusan/tb_jurusan_form',
           );
        $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jurusan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jurusan', TRUE));
        } else {
            $data = array(
        'nama_jurusan' => $this->input->post('nama_jurusan',TRUE),
        'id_jenjang' => $this->input->post('id_jenjang',TRUE),
        );

            $this->Jurusan_model->update($this->input->post('id_jurusan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jurusan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jurusan_model->get_by_id($id);

        if ($row) {
            $this->Jurusan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jurusan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jurusan'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('nama_jurusan', 'nama jurusan', 'trim|required');
    $this->form_validation->set_rules('id_jenjang', 'id jenjang', 'trim|required');

    $this->form_validation->set_rules('id_jurusan', 'id_jurusan', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jurusan.php */
/* Location: ./application/controllers/Jurusan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-25 21:26:51 */
/* http://harviacode.com */