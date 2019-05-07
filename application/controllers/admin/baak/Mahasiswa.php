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
        if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }

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

        $config['per_page'] = 10000000;
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
                'title' => 'Detail Data Mahasiswa',
                'nim' => $row->nim,
                'nik' => $row->nik,
                'nama_mhs' => $row->nama_mhs,
                'tempat_lahir_mhs' => $row->tempat_lahir_mhs,
                'tgl_lahir_mhs' => $row->tgl_lahir_mhs,
                'gender_mhs' => $row->gender_mhs,
                'asal_sma' => $row->asal_sma,
                'agama_mhs' => $row->agama_mhs,
                'nama_ibu_kandung' => $row->nama_ibu_kandung,
                'alamat_asal' => $row->alamat_a,
                'alamat_sekarang' => $row->alamat_s,
                'sks_diakui' => $row->sks_diakui,
                'angkatan' => $row->angkatan,
                'id_jenjang' => $row->id_jenjang,
                'id_st_msk' => $row->id_st_msk,
                'asal_universitas' => $row->asal_universitas,
                'img_file' => $row->img_file,
                'beasiswa' => $this->db->query("select * from tbl_beasiswa where id_beasiswa='$row->id_beasiswa'")->row(),
                'jurusans' => $this->db->query("select * from tb_jurusan a join tb_jenjang b on a.id_jenjang=b.id_jenjang where id_jurusan='$row->id_jenjang'")->row(),
//                'foto_mhs' => $row->foto_mhs,
                'judul' => 'Mahasiswa',
                'content' => 'adminstba/layout/content/mahasiswa/tbl_mahasiswa_read',
	       );
        $this->load->view('adminstba/layout/layout',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/baak/mahasiswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Tambah Data Mahasiswa',
            'button' => '<i class="fa fa-save"></i> Simpan',
            'action' => site_url('admin/baak/mahasiswa/create_action'),
            'nim' => set_value('nim'),
            'nik' => set_value('nik'),
            'nama_mhs' => set_value('nama_mhs'),
            'tempat_lahir_mhs' => set_value('tempat_lahir_mhs'),
            'tgl_lahir_mhs' => set_value('tgl_lahir_mhs'),
            'gender_mhs' => set_value('gender_mhs'),
            'asal_sma' => set_value('asal_sma'),
            'agama_mhs' => set_value('agama_mhs'),
            'nama_ibu_kandung' => set_value('nama_ibu_kandung'),
            'sks_diakui' => set_value('sks_diakui'),
            'angkatan' => set_value('angkatan'),
            'id_jenjang' => set_value('id_jenjang'),
            'id_st_msk' => set_value('id_st_msk'),
            'asal_universitas' => set_value('asal_universitas'),
            'status' => set_value('status'),
            'img_file' => set_value('img_file'),
            'id_beasiswa' => set_value('id_beasiswa'),
            'nowa' => set_value('nowa'),
            'email' => set_value('email'),
            'mdh' => set_value('mdh'),
            'prestasi' => set_value('prestasi'), 
            'alamat_a' => set_value('alamat_a'),
            'alamat_s' => set_value('alamat_s'),           
            'foto_mhs' => set_value('foto_mhs'),
            'beasiswa' => $this->db->query("select * from tbl_beasiswa")->result(),
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
            $img=$this->input->post('nim');
            $data = array(
                'nim' => $this->input->post('nim',TRUE),
                'nik' => $this->input->post('nik',TRUE),
                'nama_mhs' => $this->input->post('nama_mhs',TRUE),
                'tempat_lahir_mhs' => $this->input->post('tempat_lahir_mhs',TRUE),                
                'tgl_lahir_mhs' => $this->input->post('tgl_lahir_mhs',TRUE),
                'gender_mhs' => $this->input->post('gender_mhs',TRUE),
                'asal_sma' => $this->input->post('asal_sma',TRUE),
                'agama_mhs' => $this->input->post('agama_mhs',TRUE),
                'nama_ibu_kandung' => $this->input->post('nama_ibu_kandung', TRUE),
                'sks_diakui' => $this->input->post('sks_diakui',TRUE),
                'angkatan' => $this->input->post('angkatan',TRUE),
                'id_jenjang' => $this->input->post('id_jenjang',TRUE),
                'asal_universitas' => $this->input->post('asal_universitas',TRUE),
                'id_st_msk' => $this->input->post('id_st_msk',TRUE),
                'id_beasiswa' => $this->input->post('id_beasiswa',TRUE),
                'nowa' => $this->input->post('nowa',TRUE),
                'email' => $this->input->post('email',TRUE),
                'mdh' => $this->input->post('mdh',TRUE),
                'prestasi' => $this->input->post('prestasi',TRUE),
                 'alamat_a' => $this->input->post('alamat_a',TRUE),
                 'alamat_s' => $this->input->post('alamat_s',TRUE),               
                'img_file' => $this->input->post('nim',TRUE).'.jpg',
            );
            move_uploaded_file($_FILES["img_file"]["tmp_name"], './assets/images/img_mhs/'.$img.'.jpg');
            $this->Mahasiswa_model->insert($data);
                        
            $datains = array(
                'nomor_induk' => $this->input->post('nim',TRUE),
                'pass' => md5($this->input->post('nim',TRUE)),
                'status' => 'mahasiswa',
            );
            $this->db->insert('tbl_akun', $datains);
            $this->session->set_flashdata('message', 'Berhasil menambahkan data');
            redirect(site_url('admin/baak/mahasiswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Ubah Data Mahasiswa',
                'button' => '<i class="fa fa-save"></i> Ubah',
                'action' => site_url('admin/baak/mahasiswa/update_action'),
                'nim' => set_value('nim', $row->nim),
                'nik' => set_value('gender_mhs', $row->nik),
                'nama_mhs' => set_value('nama_mhs', $row->nama_mhs),
                'tempat_lahir_mhs' => set_value('tempat_lahir_mhs', $row->tempat_lahir_mhs),
                'tgl_lahir_mhs' => set_value('tgl_lahir_mhs', $row->tgl_lahir_mhs),
                'gender_mhs' => set_value('gender_mhs', $row->gender_mhs),
                'asal_sma' => set_value('asal_sma', $row->asal_sma),
                'agama_mhs' => set_value('agama_mhs', $row->agama_mhs),
                'nama_ibu_kandung' => set_value('gender_mhs', $row->nama_ibu_kandung),
                'sks_diakui' => set_value('sks_diakui', $row->sks_diakui),
                'angkatan' => set_value('angkatan', $row->angkatan),
                'id_jenjang' => set_value('id_jenjang', $row->id_jenjang),
                'id_beasiswa' => set_value('id_beasiswa', $row->id_beasiswa),
                'asal_universitas' => set_value('asal_universitas', $row->asal_universitas),
                'id_st_msk' => set_value('id_st_msk', $row->id_st_msk),
                'beasiswa' => $this->db->query("select * from tbl_beasiswa")->result(),
                'nowa' => set_value('nowa', $row->nowa),
                'email' => set_value('email', $row->email),
                'mdh' => set_value('mdh', $row->mdh),
                'prestasi' => set_value('prestasi', $row->prestasi),
                'alamat_a' => set_value('alamat_a', $row->alamat_a),
                'alamat_s' => set_value('alamat_s', $row->alamat_s),
                'foto_mhs' => set_value('foto_mhs', $row->foto_mhs),
                'jurusans' => $this->db->query("select * from tb_jurusan a join tb_jenjang b on a.id_jenjang=b.id_jenjang")->result(),
                'judul' => 'Edit Mahasiswa',
                'content' => 'adminstba/layout/content/mahasiswa/tbl_mahasiswa_form',
	       );
        $this->load->view('adminstba/layout/layout',$data);
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

                'nik' => $this->input->post('nik',TRUE),
                'nama_mhs' => $this->input->post('nama_mhs',TRUE),
                'tempat_lahir_mhs' => $this->input->post('tempat_lahir_mhs',TRUE),
                'tgl_lahir_mhs' => $this->input->post('tgl_lahir_mhs',TRUE),
                'gender_mhs' => $this->input->post('gender_mhs',TRUE),
                'asal_sma' => $this->input->post('asal_sma',TRUE),
                'agama_mhs' => $this->input->post('agama_mhs',TRUE),
                'nama_ibu_kandung' => $this->input->post('nama_ibu_kandung',TRUE),
                'sks_diakui' => $this->input->post('sks_diakui',TRUE),
                'angkatan' => $this->input->post('angkatan',TRUE),
                'id_jenjang' => $this->input->post('id_jenjang',TRUE),
                'id_beasiswa' => $this->input->post('id_beasiswa',TRUE),
                'id_st_msk' => $this->input->post('id_st_msk',TRUE),
                'asal_universitas' => $this->input->post('asal_universitas',TRUE),                 
                'nowa' => $this->input->post('nowa',TRUE),
                'email' => $this->input->post('email',TRUE),
                'mdh' => $this->input->post('mdh',TRUE),
                'prestasi' => $this->input->post('prestasi',TRUE),
                'alamat_a' => $this->input->post('alamat_a',TRUE),
                'alamat_s' => $this->input->post('alamat_s',TRUE),
            );
            $this->Mahasiswa_model->update($this->input->post('nim', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil meperbarui data');
            redirect(site_url('admin/baak/mahasiswa'));
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
                'nama' => set_value('nim', $row->nama_mhs),
                'id_ket_mhs' => set_value('id_ket_mhs', $row->id_ket_mhs),
                'ket_mhs' => $this->db->query("select * from tbl_keterangan_mahasiswa")->result(),
                'judul' => 'Mahasiswa',
                'content' => 'adminstba/layout/content/mahasiswa/tbl_mahasiswa_change',
	       );
        $this->load->view('adminstba/layout/layout',$data);
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
        redirect(site_url('admin/baak/mahasiswa'));
        
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
            redirect(site_url('admin/baak/mahasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/baak/mahasiswa'));
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