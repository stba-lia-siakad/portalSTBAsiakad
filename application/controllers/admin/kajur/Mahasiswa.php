<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mahasiswa/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mahasiswa/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mahasiswa/index';
            $config['first_url'] = base_url() . 'mahasiswa/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mahasiswa_model->total_rows($q);
        $mahasiswa = $this->Mahasiswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mahasiswa_data' => $mahasiswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'jurusans' => $this->db->query("select * from tb_jurusan a join tb_jenjang b on a.id_jenjang=b.id_jenjang")->result(),
                'ket_mhs' => $this->db->query("select * from tbl_keterangan_mahasiswa")->result(),
                'judul' => 'Mahasiswa',
                'content' => 'adminstba/layout/content/mahasiswa/tbl_mahasiswa_list',
	       );
        $this->load->view('adminstba/layout/layout',$data);
    }

    public function read($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);
        if ($row) {
            $data = array(
                'nim' => $row->nim,
                'nama_mhs' => $row->nama_mhs,
                'tempat_lahir_mhs' => $row->tempat_lahir_mhs,
                'tgl_lahir_mhs' => $row->tgl_lahir_mhs,
                'gender_mhs' => $row->gender_mhs,
                'agama_mhs' => $row->agama_mhs,
                'sks_diakui' => $row->sks_diakui,
                'angkatan' => $row->angkatan,
                'id_jenjang' => $row->id_jenjang,
                'id_st_msk' => $row->id_st_msk,
                'jurusans' => $this->db->query("select * from tb_jurusan a join tb_jenjang b on a.id_jenjang=b.id_jenjang where id_jurusan='$row->id_jenjang'")->row(),
//                'foto_mhs' => $row->foto_mhs,
                'judul' => 'Mahasiswa',
                'content' => 'mahasiswa/tbl_mahasiswa_read',
	       );
        $this->load->view('layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => '<i class="fa fa-save"></i> Simpan',
            'action' => site_url('mahasiswa/create_action'),
            'nim' => set_value('nim'),
            'nama_mhs' => set_value('nama_mhs'),
            'tempat_lahir_mhs' => set_value('tempat_lahir_mhs'),
            'tgl_lahir_mhs' => set_value('tgl_lahir_mhs'),
            'gender_mhs' => set_value('gender_mhs'),
            'agama_mhs' => set_value('agama_mhs'),
            'sks_diakui' => set_value('sks_diakui'),
            'angkatan' => set_value('angkatan'),
            'id_jenjang' => set_value('id_jenjang'),
            'id_st_msk' => set_value('id_st_msk'),
            'status' => set_value('status'),
            'foto_mhs' => set_value('foto_mhs'),
            'jurusans' => $this->db->query("select * from tb_jurusan a join tb_jenjang b on a.id_jenjang=b.id_jenjang")->result(),
                'judul' => 'Mahasiswa',
                'content' => 'adminstba/layout/content/mahasiswa/tbl_mahasiswa_form',
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
                'nim' => $this->input->post('nim',TRUE),
                'nama_mhs' => $this->input->post('nama_mhs',TRUE),
                'tempat_lahir_mhs' => $this->input->post('tempat_lahir_mhs',TRUE),
                'tgl_lahir_mhs' => $this->input->post('tgl_lahir_mhs',TRUE),
                'gender_mhs' => $this->input->post('gender_mhs',TRUE),
                'agama_mhs' => $this->input->post('agama_mhs',TRUE),
                'sks_diakui' => $this->input->post('sks_diakui',TRUE),
                'angkatan' => $this->input->post('angkatan',TRUE),
                'id_jenjang' => $this->input->post('id_jenjang',TRUE),
                'id_st_msk' => $this->input->post('id_st_msk',TRUE),
            );

            $this->Mahasiswa_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil menambahkan data');
            
            $datains = array(
                'nomor_induk' => $this->input->post('nim',TRUE),
                'pass' => md5($this->input->post('nim',TRUE)),
                'status' => 'mahasiswa',
            );
            $this->db->insert('tbl_akun', $datains);
            
            redirect(site_url('admin/baakmahasiswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => '<i class="fa fa-pencil"></i> Ubah',
                'action' => site_url('mahasiswa/update_action'),
                'nim' => set_value('nim', $row->nim),
                'nama_mhs' => set_value('nama_mhs', $row->nama_mhs),
                'tempat_lahir_mhs' => set_value('tempat_lahir_mhs', $row->tempat_lahir_mhs),
                'tgl_lahir_mhs' => set_value('tgl_lahir_mhs', $row->tgl_lahir_mhs),
                'gender_mhs' => set_value('gender_mhs', $row->gender_mhs),
                'agama_mhs' => set_value('agama_mhs', $row->agama_mhs),
                'sks_diakui' => set_value('sks_diakui', $row->sks_diakui),
                'angkatan' => set_value('angkatan', $row->angkatan),
                'id_jenjang' => set_value('id_jenjang', $row->id_jenjang),
                'id_st_msk' => set_value('id_st_msk', $row->id_st_msk),
                'foto_mhs' => set_value('foto_mhs', $row->foto_mhs),
                'jurusans' => $this->db->query("select * from tb_jurusan a join tb_jenjang b on a.id_jenjang=b.id_jenjang")->result(),
                'judul' => 'Mahasiswa',
                'content' => 'mahasiswa/tbl_mahasiswa_form',
	       );
        $this->load->view('layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nim', TRUE));
        } else {
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs',TRUE),
                'tempat_lahir_mhs' => $this->input->post('tempat_lahir_mhs',TRUE),
                'tgl_lahir_mhs' => $this->input->post('tgl_lahir_mhs',TRUE),
                'gender_mhs' => $this->input->post('gender_mhs',TRUE),
                'agama_mhs' => $this->input->post('agama_mhs',TRUE),
                'sks_diakui' => $this->input->post('sks_diakui',TRUE),
                'angkatan' => $this->input->post('angkatan',TRUE),
                'id_jenjang' => $this->input->post('id_jenjang',TRUE),
                'id_st_msk' => $this->input->post('id_st_msk',TRUE),
            );
            $this->Mahasiswa_model->update($this->input->post('nim', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil meperbarui data');
            redirect(site_url('mahasiswa'));
        }
    }
    public function change($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => '<i class="fa fa-refresh"></i> Ubah Status Mahasiswa',
                'action' => site_url('mahasiswa/change_action'),
                'nim' => set_value('nim', $row->nim),
                'id_ket_mhs' => set_value('id_ket_mhs', $row->id_ket_mhs),
                'ket_mhs' => $this->db->query("select * from tbl_keterangan_mahasiswa")->result(),
                'judul' => 'Mahasiswa',
                'content' => 'mahasiswa/tbl_mahasiswa_change',
	       );
        $this->load->view('layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function change_action() 
    {
        
        $data = array(
            'id_ket_mhs' => $this->input->post('id_ket_mhs',TRUE),
        );
        $this->Mahasiswa_model->update($this->input->post('nim', TRUE), $data);
        $this->session->set_flashdata('message', 'Berhasil meperbarui data');
        redirect(site_url('mahasiswa'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'status' => '0',
            );
            $this->Mahasiswa_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mahasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_mhs', 'nama mhs', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir_mhs', 'tempat lahir mhs', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir_mhs', 'tgl lahir mhs', 'trim|required');
	$this->form_validation->set_rules('gender_mhs', 'gender mhs', 'trim|required');
	$this->form_validation->set_rules('agama_mhs', 'agama mhs', 'trim|required');
	$this->form_validation->set_rules('angkatan', 'angkatan', 'trim|required');
	$this->form_validation->set_rules('id_jenjang', 'id jenjang', 'trim|required');
	$this->form_validation->set_rules('id_st_msk', 'id st msk', 'trim|required');

	$this->form_validation->set_rules('nim', 'nim', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-28 01:30:45 */
/* http://harviacode.com */