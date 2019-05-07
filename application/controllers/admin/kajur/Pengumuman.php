<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pengumuman');
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
            $config['base_url'] = base_url() . 'pengumuman/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pengumuman/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pengumuman/index';
            $config['first_url'] = base_url() . 'pe/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_Pengumuman->total_rows($q);
        $c_pengumuman = $this->M_Pengumuman->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'c_pengumuman_data' => $c_pengumuman,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul' => 'Berita',
            'content' => 'adminstba/layout/content/Pengumuman/tbl_pengumuman_list',
        );
        $this->load->view('adminstba/layout/layout',$data);
    }

    public function read($id) 
    {
        $row = $this->M_Pengumuman->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Detail Data Pengumuman',
                'id_dosen' => $row->id_dosen,
                'nidn' => $row->nidn,
                'nama' => $row->nama,
                'gender' => $row->gender,
                'alamat' => $row->alamat,
                'id_jabatan' => $row->id_jabatan,
                'agama' => $row->agama,
                'tempat_lahir' => $row->tempat_lahir,
                'tgl_lahir' => $row->tgl_lahir,
                'id_status' => $row->id_status,
                'img_file' => $row->img_file, 
                'jabatan' => $this->db->query("select * from tb_jabatan")->result(),
                'status' => $this->db->query("select * from tb_status_dosen")->result(),
                'judul' => 'Tambah Dosen',
                'content' => 'adminstba/layout/content/dosen/tbl_dosen_read',
	       );
        $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Tambah Data Dosen',
            'button' => '<i class="fa fa-save"></i> Simpan',
            'action' => site_url('admin/baak/dosen/create_action'),
            'id_dosen' => set_value('id_dosen'),
            'nidn' => set_value('nidn'),
            'nik' => set_value('nik'),
            'nama' => set_value('nama'),
            'gender' => set_value('gender'),
            'institusi_a' => set_value('institusi_a'),
            'nowa' => set_value('nowa'),
            'riwayat_p' => set_value('riwayat_p'),
            'alamat' => set_value('alamat'),
            'id_jabatan' => set_value('id_jabatan'),
            'id_status' => set_value('id_status'),
            'tempat_lahir' => set_value('tempat_lahir'),
            'tgl_lahir' => set_value('tgl_lahir'),
            'agama' => set_value('agama'),
            'img_file' => set_value('img_file'),
            'jabatan' => $this->db->query("select * from tb_jabatan")->result(),
            'status' => $this->db->query("select * from tb_status_dosen")->result(),
            'judul' => 'Tambah Dosen',
            'content' => 'adminstba/layout/content/dosen/tbl_dosen_form',
	);
        $this->load->view('adminstba/layout/layout',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $img=$this->input->post('nidn');
            $data = array(
                'nidn' => $this->input->post('nidn',TRUE),
                'nik' => $this->input->post('nik',TRUE),
                'nama' => $this->input->post('nama',TRUE),
                'gender' => $this->input->post('gender',TRUE),
                'institusi_a' => $this->input->post('institusi_a',TRUE),
                'nowa' => $this->input->post('nowa',TRUE),
                'riwayat_p' => $this->input->post('riwayat_p',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'id_jabatan' => $this->input->post('id_jabatan',TRUE),
                'agama' => $this->input->post('agama',TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
                'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                'img_file' => $this->input->post('nidn',TRUE).'.jpg',
            );
            move_uploaded_file($_FILES["img_file"]["tmp_name"], './assets/images/img_dosen/'.$img.'.jpg');
            $this->M_dosen->insert($data);
            
            $datains = array(
                'nomor_induk' => $this->input->post('nidn',TRUE),
                'pass' => md5($this->input->post('nidn',TRUE)),
                'status' => 'dosen',
            );
            $this->db->insert('tbl_akun', $datains);
            $this->session->set_flashdata('message', 'Berhasil menambahakan data dosen');
            redirect(site_url('admin/baak/dosen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_dosen->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Ubah Data Dosen',
                'button' => '<i class="fa fa-pen"></i> Ubah',
                'action' => site_url('dosen/update_action'),
                'id_dosen' => set_value('id_dosen', $row->id_dosen),
                'nidn' => set_value('nidn', $row->nidn),
                'nik' => set_value('nidn', $row->nik),
                'nama' => set_value('nama', $row->nama),
                'gender' => set_value('gender', $row->gender),
                'institusi_a' => set_value('institusi_a', $row->institusi_a),
                'nowa' => set_value('nowa', $row->nowa),
                'riwayat_p' => set_value('riwayat_p', $row->riwayat_p),
                'alamat' => set_value('alamat', $row->alamat),
                'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
                'id_status' => set_value('id_status', $row->id_status),
                'agama' => set_value('agama', $row->agama),
                'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
                'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
                'jabatan' => $this->db->query("select * from tb_jabatan")->result(),
                'status' => $this->db->query("select * from tb_status_dosen")->result(),
                'judul' => 'Ubah Dosen',
                'content' => 'adminstba/layout/content/dosen/tbl_dosen_form',
            );
            $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/baak/dosen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dosen', TRUE));
        } else {
            if($_FILES['img_file']){

                $img=$this->input->post('nidn');
                $data = array(
                    'nidn' => $this->input->post('nidn',TRUE),
                    'nama' => $this->input->post('nama',TRUE),
                    'gender' => $this->input->post('gender',TRUE),
                    'alamat' => $this->input->post('alamat',TRUE),
                    'id_jabatan' => $this->input->post('id_jabatan',TRUE),
                    'agama' => $this->input->post('agama',TRUE),
                    'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
                    'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                    'img_file' => $this->input->post('nidn',TRUE).'.jpg',
                );
                unlink('./assets/images/img_dosen/'.$img.'.jpg');
                move_uploaded_file($_FILES["img_file"]["tmp_name"], './assets/images/img_dosen/'.$img.'.jpg');
                $this->M_dosen->update($this->input->post('id_dosen', TRUE), $data);   
            }else{
                $img=$this->input->post('nidn');
                $data = array(
                    'nidn' => $this->input->post('nidn',TRUE),
                    'nama' => $this->input->post('nama',TRUE),
                    'gender' => $this->input->post('gender',TRUE),
                    'alamat' => $this->input->post('alamat',TRUE),
                    'id_jabatan' => $this->input->post('id_jabatan',TRUE),
                    'agama' => $this->input->post('agama',TRUE),
                    'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
                    'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                );
                $this->M_dosen->update($this->input->post('id_dosen', TRUE), $data);   
                
            }
            $this->session->set_flashdata('message', 'Data berhasil diperbaharui');
            redirect(site_url('dosen'));
        }
    }
    
     public function delete($berita_id) 
    {
        $row = $this->M_Pengumuman->get_by_id($berita_id);

        if ($row) {
            $this->M_Pengumuman->delete($berita_id);
            $this->session->set_flashdata('message', 'Berhasil menghapus data');
            redirect(site_url('admin/kajur/pengumuman'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/kajur/pengumuman'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('nidn', 'nidn', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('gender', 'gender', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('id_jabatan', 'id jabatan', 'trim|required');
	$this->form_validation->set_rules('id_status', 'id status', 'trim|required');
	$this->form_validation->set_rules('id_dosen', 'id_dosen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file dosen.php */
/* Location: ./application/controllers/C_dosen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-25 17:01:23 */
/* http://harviacode.com */
