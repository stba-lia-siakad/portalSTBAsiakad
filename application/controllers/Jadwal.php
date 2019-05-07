<?php
class Jadwal extends CI_Controller {

	function __construct(){
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

		if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
	}

	function index(){
        $ruang=$this->db->query("SELECT * FROM tb_ruangan")->result();
        $jam=$this->db->query("SELECT * FROM tbl_jam")->result();
        $hari=$this->db->query("SELECT * FROM tbl_hari")->result();
        $smt_aktif=$this->db->query("SELECT * FROM setup_aktif")->row();
        $prodi=$this->db->query("SELECT * FROM tb_jurusan b JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang`")->result();
        if($this->session->userdata('level')=='dosen'){
            $dosen=$this->db->query("select * from tbl_dosen where nidn='".$this->session->userdata('login_data')->nomor_induk."'")->row();
            $mk_daftar=$this->db->query("SELECT * FROM tb_matakuliah a 
            JOIN tb_jurusan b ON a.`id_jurusan`=b.`id_jurusan`
            JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang`
            JOIN setup_smt d ON d.`id_smt`=a.`semester`
            join tbl_kelas_mk x on x.id_mk=a.id_mk
            JOIN tbl_ploting e ON e.`ploting_id_matakuliah`=x.`id`
            JOIN tbl_dosen f ON e.`ploting_id_dosen`=f.`id_dosen`
            JOIN tbl_jadwal_mk g ON x.`id`=g.`id_mk`
            JOIN tbl_jam h ON h.`id_jam`=g.`id_jam`
            JOIN tbl_hari i ON i.`id_hari`=g.`id_hari`
            JOIN tb_ruangan j ON j.`id`=g.`id_ruang`
            WHERE ploting_id_dosen='$dosen->id_dosen' and status='1' and a.semester='$smt_aktif->smt' and a.tahun_ajaran='$smt_aktif->ta' and ploting_status='Y' order by i.id_hari,h.id_jam")->result();
        }else if ($this->session->userdata('level')=='kajur' || $this->session->userdata('level')=='baak'){
            $mk_daftar=$this->db->query("SELECT * FROM tb_matakuliah a 
            JOIN tb_jurusan b ON a.`id_jurusan`=b.`id_jurusan`
            JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang`
            JOIN setup_smt d ON d.`id_smt`=a.`semester`
            join tbl_kelas_mk x on x.id_mk=a.id_mk
            JOIN tbl_ploting e ON e.`ploting_id_matakuliah`=x.`id`
            JOIN tbl_dosen f ON e.`ploting_id_dosen`=f.`id_dosen`
            JOIN tbl_jadwal_mk g ON x.`id`=g.`id_mk`
            JOIN tbl_jam h ON h.`id_jam`=g.`id_jam`
            JOIN tbl_hari i ON i.`id_hari`=g.`id_hari`
            JOIN tb_ruangan j ON j.`id`=g.`id_ruang`
            WHERE status='1' and a.semester='$smt_aktif->smt' and a.tahun_ajaran='$smt_aktif->ta' and ploting_status='Y' order by id_jadwal_mk desc,nama_jenjang,nama_jurusan,nama_mk")->result();
        }else{
            $mk_daftar=$this->db->query("SELECT * FROM tb_matakuliah a 
            JOIN tb_jurusan b ON a.`id_jurusan`=b.`id_jurusan`
            JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang`
            JOIN setup_smt d ON d.`id_smt`=a.`semester`
            join tbl_kelas_mk x on x.id_mk=a.id_mk
            JOIN tbl_ploting e ON e.`ploting_id_matakuliah`=x.`id`
            JOIN tbl_dosen f ON e.`ploting_id_dosen`=f.`id_dosen`
            LEFT JOIN tbl_jadwal_mk g ON x.`id`=g.`id_mk`
            LEFT JOIN tbl_jam h ON h.`id_jam`=g.`id_jam`
            LEFT JOIN tbl_hari i ON i.`id_hari`=g.`id_hari`
            LEFT JOIN tb_ruangan j ON j.`id`=g.`id_ruang`
            WHERE status='1' and a.semester='$smt_aktif->smt' and a.tahun_ajaran='$smt_aktif->ta' and ploting_status='Y' order by id_jadwal_mk desc,nama_jenjang,nama_jurusan,nama_mk")->result();
        }
//        echo '<pre>';
//        var_dump($mk_daftar);
//        die();
		$data = array(
            'mk_daftar' => $mk_daftar,
            'ruang' => $ruang,
            'jam' => $jam,
            'hari' => $hari,
            'prodi' => $prodi,
            'judul' => 'Jadwal Matakuliah',
            'content' => 'adminstba/layout/content/jadwal/index',
        );
        $this->load->view('adminstba/layout/layout',$data);
	}
	    
	function single_plot(){
        $id_ruangan=$this->input->post("id_ruangan");
        $id_jam=$this->input->post("id_jam");
        $id_hari=$this->input->post("id_hari");
        $id_mk=$this->input->post("id_mk");
        $check_data=$this->db->query("select * from tbl_jadwal_mk where id_ruang='$id_ruangan' and id_jam='$id_jam' and id_hari='$id_hari'")->num_rows();
        if($check_data>0){
            $this->session->set_userdata('input_status', 'exist');
        }else{
            $data = array(
                    'id_mk' => $id_mk,
                    'id_jam' => $id_jam,
                    'id_hari' => $id_hari,
                    'id_ruang' => $id_ruangan
            );
            $this->db->insert('tbl_jadwal_mk', $data);
            $this->session->set_userdata('input_status', 'success');
        }
        redirect('jadwal/index');
        
	}
	function deny($id){
        $this->db->where('id_jadwal_mk', $id);
        $this->db->delete('tbl_jadwal_mk');
        redirect('jadwal/index');
	}

}
