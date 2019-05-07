<?php
class Ploting extends CI_Controller {

	function __construct(){
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

		if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
	}

    

    function index(){
        $smt_aktif=$this->db->query("SELECT * FROM setup_aktif")->row();
        $dosen=$this->db->query("SELECT * FROM tbl_dosen")->result();
        $prodi=$this->db->query("SELECT * FROM tb_jurusan b JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang`")->result();
        if ($this->session->userdata('level')=='1'){
            $mk_daftar=$this->db->query("SELECT *,x.id as id_kelas FROM tb_matakuliah a 
            JOIN tb_jurusan b ON a.`id_jurusan`=b.`id_jurusan`
            JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang`
            JOIN setup_smt d ON d.`id_smt`=a.`semester`
            join tbl_kelas_mk x on x.id_mk=a.id_mk
            JOIN tbl_ploting e ON e.`ploting_id_matakuliah`=x.`id`
            JOIN tbl_dosen f ON e.`ploting_id_dosen`=f.`id_dosen`
            WHERE status='1' and a.semester='$smt_aktif->smt' and a.tahun_ajaran='$smt_aktif->ta' order by ploting_status desc,nama_jenjang,nama_jurusan,nama_mk")->result();
        }else{
            $mk_daftar=$this->db->query("SELECT *,x.id as id_kelas FROM tb_matakuliah a 
            JOIN tb_jurusan b ON a.`id_jurusan`=b.`id_jurusan`
            JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang`
            JOIN setup_smt d ON d.`id_smt`=a.`semester`
            join tbl_kelas_mk x on x.id_mk=a.id_mk
            LEFT JOIN tbl_ploting e ON e.`ploting_id_matakuliah`=x.`id`
            LEFT JOIN tbl_dosen f ON e.`ploting_id_dosen`=f.`id_dosen`
            WHERE status='1' and a.semester='$smt_aktif->smt' and a.tahun_ajaran='$smt_aktif->ta' order by ploting_status desc,nama_jenjang,nama_jurusan,nama_mk")->result();
        }
        
        $data = array(
            'mk_daftar' => $mk_daftar,
            'dosen' => $dosen,
            'prodi' => $prodi,
            'judul' => 'Ploting Dosen',
            'content' => 'adminstba/layout/content/ploting/index',
        );
        $this->load->view('adminstba/layout/layout',$data);
    }
    
    
	function search(){
        $id_jurusan=$this->input->get("prodi");
        $mk=$this->input->get("mk");
        if($mk!=""){
            $text_sql="(b.id_jurusan='$id_jurusan' or a.nama_mk like '%$mk%')";
        }else{
            $text_sql="(b.id_jurusan='$id_jurusan')";
        }
        $smt_aktif=$this->db->query("SELECT * FROM setup_aktif")->row();
        $dosen=$this->db->query("SELECT * FROM tbl_dosen")->result();
        $prodi=$this->db->query("SELECT * FROM tb_jurusan b JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang`")->result();
        $mk_daftar=$this->db->query("SELECT *,x.id as id_kelas FROM tb_matakuliah a 
        JOIN tb_jurusan b ON a.`id_jurusan`=b.`id_jurusan`
        JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang`
        JOIN setup_smt d ON d.`id_smt`=a.`semester`
        join tbl_kelas_mk x on x.id_mk=a.id_mk
        LEFT JOIN tbl_ploting e ON e.`ploting_id_matakuliah`=x.`id`
        LEFT JOIN tbl_dosen f ON e.`ploting_id_dosen`=f.`id_dosen`
        WHERE status='1' and a.semester='$smt_aktif->smt' and a.tahun_ajaran='$smt_aktif->ta' and ".$text_sql." order by ploting_status desc,nama_jenjang,nama_jurusan,nama_mk")->result();
		$data = array(
            'mk_daftar' => $mk_daftar,
            'dosen' => $dosen,
            'prodi' => $prodi,
            'judul' => 'Ploting Dosen',
            'content' => 'ploting/index',
        );
        $this->load->view('layout/layout',$data);
	}
    
	function single_plot(){
        $id_mk=$this->input->post("id_mk");
        $id_dosen=$this->input->post("id_dosen");
        $id_user=$this->session->userdata("login_data")->nomor_induk;
        $data = array(
                'ploting_id_matakuliah' => $id_mk,
                'ploting_id_dosen' => $id_dosen,
                'ploting_date' => date("Y/m/d G:i:s", time()),
                'ploting_id_akun' => $id_user
        );
        $this->db->insert('tbl_ploting', $data);
        redirect('ploting/index');
        
	}
	function delete($id){
        $this->db->where('id_ploting', $id);
        $this->db->delete('tbl_ploting');
        redirect('ploting/index');
	}
	function acc($id){
        $this->db->set('ploting_status', 'Y');
        $this->db->where('id_ploting', $id);
        $this->db->update('tbl_ploting');
        redirect('ploting/index');
	}
	function deny($id){
        $this->db->set('ploting_status', 'N');
        $this->db->where('id_ploting', $id);
        $this->db->update('tbl_ploting');
        redirect('ploting/index');
	}

}
