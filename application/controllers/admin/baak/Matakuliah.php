<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Matakuliah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Matakuliah_model');
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
            $config['base_url'] = base_url() . 'matakuliah/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'matakuliah/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'matakuliah/index';
            $config['first_url'] = base_url() . 'matakuliah/index';
        }

        $config['per_page'] = 10000000000000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Matakuliah_model->total_rows($q);
        $matakuliah = $this->Matakuliah_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'matakuliah_data' => $matakuliah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'jurusans' => $this->db->query("select * from tb_jurusan a join tb_jenjang b on a.id_jenjang=b.id_jenjang")->result(),
                'judul' => 'Matakuliah',
                'content' => 'adminstba/layout/content/matakuliah/tb_matakuliah_list',
	       );
        $this->load->view('adminstba/layout/layout',$data);
        
    }
    
    public function kelas($id)
    {
        $row = $this->Matakuliah_model->get_by_id($id);
        if ($row) {
            $data = array(
                    'id_mk' => $row->id_mk,
                    'kode_mk' => $row->kode_mk,
                    'nama_mk' => $row->nama_mk,
                    'id_prasyarat' => $row->id_prasyarat,
                    'id_kel_mk' => $row->id_kel_mk,
                    'sks_mk' => $row->sks_mk,
                    'jurusans' => $this->db->query("select * from tb_jurusan a join tb_jenjang b on a.id_jenjang=b.id_jenjang where id_jurusan='$row->id_jurusan'")->row(),
                    'kelas' => $this->db->query("select * from tbl_kelas_mk where id_mk='$row->id_mk'")->result(),
                    'id_jurusan' => $row->id_jurusan,
                    'kel_mk' => $this->db->query("select * from tbl_kelompok_mk where id_kel_mk='$row->id_kel_mk'")->row(),
                    'prasyarat' => $this->db->query("select * from tbl_prasyarat_mk where id_prasyarat_mk='$row->id_prasyarat'")->row(),
                    'judul' => 'Matakuliah',
                    'content' => 'adminstba/layout/content/matakuliah/class',
            );
            $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('matakuliah'));
        }
    }
    public function add_class($id)
    {
        if($this->input->post()){
            $nama_kelas=$this->input->post('nama_kelas');
            $id_mk=$this->input->post('id_mk');
            $data = array(
                    'id_mk' => $id_mk,
                    'nama_kelas' => $nama_kelas
            );
            $this->db->insert('tbl_kelas_mk', $data);
            redirect(site_url('admin/baak/matakuliah/kelas/'.$id_mk));
        }else{
            $data = array(
                'id'=>$id,
                'mk'=>$this->Matakuliah_model->get_by_id($id),
                'action' => site_url('admin/baak/matakuliah/add_class/'.$id),
                'judul' => 'Tambah Kelas MK',
                'content' => 'adminstba/layout/content/matakuliah/add_class',
            );
            $this->load->view('adminstba/layout/layout',$data);   
        }
    }
    public function kelas_delete()
    {
        $id=$this->input->get('id');
        $mk=$this->input->get('mk');
        $this->db->where('id', $id);
        $this->db->delete('tbl_kelas_mk');
        redirect(site_url('admin/baak/matakuliah/kelas/'.$mk));
    }

    public function read($id) 
    {
        $row = $this->Matakuliah_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_mk' => $row->id_mk,
                'kode_mk' => $row->kode_mk,
                'nama_mk' => $row->nama_mk,
                'id_prasyarat' => $row->id_prasyarat,
                'id_kel_mk' => $row->id_kel_mk,
                'sks_mk' => $row->sks_mk,
                'id_jurusan' => $row->id_jurusan,
                'kel_mk' => $this->db->query("select * from tbl_kelompok_mk where id_kel_mk='$row->id_kel_mk'")->row(),
                'prasyarat' => $this->db->query("select * from tbl_prasyarat_mk where id_prasyarat_mk='$row->id_prasyarat'")->row(),
                'judul' => 'Matakuliah',
                'content' => 'admin/baak/matakuliah/tb_matakuliah_read',
	       );
        $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('matakuliah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => '<i class="fa fa-save"></i> Simpan',
            'action' => site_url('admin/baak/matakuliah/create_action'),
            'id_mk' => set_value('id_mk'),
            'kode_mk' => set_value('kode_mk'),
            'nama_mk' => set_value('nama_mk'),
            'id_prasyarat' => set_value('id_prasyarat'),
            'id_kel_mk' => set_value('id_kel_mk'),
            'sks_mk' => set_value('sks_mk'),
            'id_jurusan' => set_value('id_jurusan'),
            'semester_prodi' => set_value('semester_prodi'),
            'kel_mk' => $this->db->query("select * from tbl_kelompok_mk")->result(),
            'prasyarat' => $this->db->query("select * from tbl_prasyarat_mk")->result(),
            'jurusans' => $this->db->query("select * from tb_jurusan a join tb_jenjang b on a.id_jenjang=b.id_jenjang")->result(),
            'judul' => 'Matakuliah',
            'content' => 'adminstba/layout/content/matakuliah/tb_matakuliah_form',
        );
        $this->load->view('adminstba/layout/layout',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $ta_aktif=$this->db->query("select * from setup_aktif")->row();
            $data = array(
                'kode_mk' => $this->input->post('kode_mk',TRUE),
                'nama_mk' => $this->input->post('nama_mk',TRUE),
                'id_prasyarat' => $this->input->post('id_prasyarat',TRUE),
                'id_kel_mk' => $this->input->post('id_kel_mk',TRUE),
                'sks_mk' => $this->input->post('sks_mk',TRUE),
                'id_jurusan' => $this->input->post('id_jurusan',TRUE),
                'tahun_ajaran' => $ta_aktif->ta,
                'semester' => $ta_aktif->smt,
                'semester_prodi' => $this->input->post('semester_prodi',TRUE),
                
            );

            $this->Matakuliah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/baak/matakuliah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Matakuliah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => '<i class="fa fa-pencil"></i> Ubah',
                'action' => site_url('matakuliah/update_action'),
                'id_mk' => set_value('id_mk', $row->id_mk),
                'kode_mk' => set_value('kode_mk', $row->kode_mk),
                'nama_mk' => set_value('nama_mk', $row->nama_mk),
                'id_prasyarat' => set_value('id_prasyarat', $row->id_prasyarat),
                'id_kel_mk' => set_value('id_kel_mk', $row->id_kel_mk),
                'sks_mk' => set_value('sks_mk', $row->sks_mk),
                'id_jurusan' => set_value('id_jurusan', $row->id_jurusan),
                'semester_prodi' => set_value('semester_prodi',$row->semester_prodi),
                'kel_mk' => $this->db->query("select * from tbl_kelompok_mk")->result(),
                'prasyarat' => $this->db->query("select * from tbl_prasyarat_mk")->result(),
                'jurusans' => $this->db->query("select * from tb_jurusan a join tb_jenjang b on a.id_jenjang=b.id_jenjang")->result(),
                'judul' => 'Matakuliah',
                'content' => 'adminstba/layout/content/matakuliah/tb_matakuliah_form',
	       );
        $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('matakuliah'));
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
                'semester_prodi' => $this->input->post('semester_prodi',TRUE),
	       );
            $this->Matakuliah_model->update($this->input->post('id_mk', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil memperbarui data');
            redirect(site_url('matakuliah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Matakuliah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'status' => '0',
            );
            $this->Matakuliah_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('matakuliah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('matakuliah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_mk', 'kode mk', 'trim|required');
	$this->form_validation->set_rules('nama_mk', 'nama mk', 'trim|required');
//	$this->form_validation->set_rules('id_prasyarat', 'id prasyarat', 'trim|required');
//	$this->form_validation->set_rules('id_kel_mk', 'id kel mk', 'trim|required');
	$this->form_validation->set_rules('sks_mk', 'sks mk', 'trim|required');
	$this->form_validation->set_rules('id_jurusan', 'id jurusan', 'trim|required');

	$this->form_validation->set_rules('id_mk', 'id_mk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Matakuliah.php */
/* Location: ./application/controllers/Matakuliah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-26 01:12:21 */
/* http://harviacode.com */