<?php
class Krs extends CI_Controller {

	function __construct(){
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

		if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
	}

	function index(){
		$data = array(
            'judul' => 'Input KRS',
            'content' => 'adminstba/layout/content/krs/index',
        );
        $this->load->view('adminstba/layout/layout',$data);
	}
    function search(){
        $nim=$this->input->get("nim");
        $smt_aktif=$this->db->query("SELECT * FROM setup_aktif")->row();
        if($this->input->get("ta") || $this->input->get("smt")){
            $smt_aktif->smt=$this->input->get("id_smt");
            $smt_aktif->ta=$this->input->get("ta").'/'.(intval($this->input->get("ta")+1));

        }
        
        $mhs=$this->db->query("SELECT * FROM tbl_mahasiswa a join tb_jurusan b on a.id_jenjang=b.id_jurusan JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang` where nim='$nim'")->row();
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
        JOIN tbl_krs k ON k.`id_matakuliah`=x.`id`
        JOIN tbl_mahasiswa l ON l.`nim`=k.`nim`
        WHERE l.nim='$nim' and a.status='1' and a.semester='$smt_aktif->smt' and a.tahun_ajaran='$smt_aktif->ta' and ploting_status='Y' order by id_jadwal_mk desc,nama_jenjang,nama_jurusan,nama_mk")->result();
        
        $data = array(
            'judul' => 'Input KRS',
            'content' => 'krs/search',
            'mk_daftar' => $mk_daftar,
            'mhs' => $mhs,
        );
        $this->load->view('layout/layout',$data);
    }
    function daftar(){
        if($this->input->get()){
            $smt_aktif=$this->db->query("SELECT * FROM setup_aktif")->row();
            $prodi=$this->input->get('prodi');
            $id_ta=$this->input->get('ta');
            $ta=$id_ta.'/'.($id_ta+1);
            $id_smt=$this->input->get('smt');
            //$mhs=$this->db->query("SELECT * FROM tbl_mahasiswa a join tb_jurusan b on a.id_jenjang=b.id_jurusan JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang` where nim='$nim'")->row();
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
            JOIN tbl_krs k ON k.`id_matakuliah`=x.`id`
            JOIN tbl_mahasiswa l ON l.`nim`=k.`nim`
            WHERE a.status='1' and a.semester='$id_smt' and a.tahun_ajaran='$ta' and b.id_jurusan='$prodi' group by l.nim,a.tahun_ajaran,a.semester order by id_jadwal_mk desc,nama_jenjang,nama_jurusan,nama_mk")->result();

        }else{
            $smt_aktif=$this->db->query("SELECT * FROM setup_aktif")->row();
            //$mhs=$this->db->query("SELECT * FROM tbl_mahasiswa a join tb_jurusan b on a.id_jenjang=b.id_jurusan JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang` where nim='$nim'")->row();
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
            JOIN tbl_krs k ON k.`id_matakuliah`=x.`id`
            JOIN tbl_mahasiswa l ON l.`nim`=k.`nim`
            WHERE a.status='1' and a.semester='$smt_aktif->smt' and a.tahun_ajaran='$smt_aktif->ta'  group by l.nim,a.tahun_ajaran,a.semester order by id_jadwal_mk desc,nama_jenjang,nama_jurusan,nama_mk")->result();
            $prodi='';
            $explode=explode('/', $smt_aktif->ta);
            $id_ta=$explode[0];
            $id_smt=$smt_aktif->smt;
        }
        $data = array(
            'judul' => 'Daftar KRS',
            'content' => 'krs/daftar',
            'mk_daftar' => $mk_daftar,
            'prodi' => $prodi,
            'id_ta' => $id_ta,
            'id_smt' => $id_smt,
            'jurusans' => $this->db->query("select * from tb_jurusan a join tb_jenjang b on a.id_jenjang=b.id_jenjang")->result(),
            //'mhs' => $mhs,
        );
        $this->load->view('layout/layout',$data);
    }
	function list_krs(){
        $nim=$this->input->get("nim");
        $smt_aktif=$this->db->query("SELECT * FROM setup_aktif")->row();
        $mhs=$this->db->query("SELECT *,c.id_jenjang as jenjang,b.id_jurusan as jurusan FROM tbl_mahasiswa a join tb_jurusan b on a.id_jenjang=b.id_jurusan JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang` where nim='$nim'")->row();
        $mk_daftar=$this->db->query("SELECT *,x.id as id_kelas FROM tb_matakuliah a 
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
        WHERE b.id_jurusan='$mhs->jurusan' and a.status='1' and a.semester='$smt_aktif->smt' and a.tahun_ajaran='$smt_aktif->ta' and ploting_status='Y' order by id_jadwal_mk desc,nama_jenjang,nama_jurusan,nama_mk")->result();

		$data = array(
            'judul' => 'List KRS',
            'content' => 'krs/list',
            'mk_daftar' => $mk_daftar,
            'nim' => $nim,
        );
        $this->load->view('layout/layout',$data);
	}
    
	function krs_save(){
        $nim=$this->input->post('nim');
        $id_mk=$this->input->post('id_mk');
        foreach($id_mk as $data){
            $data = array(
                    'nim' => $nim,
                    'id_matakuliah' => $data,
                    'status_krs' => 'Y',
            );

            $this->db->insert('tbl_krs', $data);
        }
        redirect(base_url("krs/search?nim=".$nim));
    }
    
    function krs_delete(){
        $id=$this->input->get("id");
        $nim=$this->input->get("nim");
        $this->db->where('id_krs', $id);
        $this->db->delete('tbl_krs');
        redirect(base_url("krs/search?nim=".$nim));
    }
    function cetak(){
        $nourut=1;
        $nim=$this->input->get("nim");
        $smt_aktif=$this->db->query("SELECT * FROM setup_aktif")->row();
        if($this->input->get("ta") || $this->input->get("smt")){
            $smt_aktif->smt=$this->input->get("smt");
            $smt_aktif->ta=$this->input->get("ta").'/'.(intval($this->input->get("ta")+1));
        }
        $mhs=$this->db->query("SELECT * FROM tbl_mahasiswa a join tb_jurusan b on a.id_jenjang=b.id_jurusan JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang` where nim='$nim'")->row();
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
        JOIN tbl_krs k ON k.`id_matakuliah`=x.`id`
        JOIN tbl_mahasiswa l ON l.`nim`=k.`nim`
        WHERE l.nim='$nim' and a.status='1' and a.semester='$smt_aktif->smt' and a.tahun_ajaran='$smt_aktif->ta' and ploting_status='Y' order by id_jadwal_mk desc,nama_jenjang,nama_jurusan,nama_mk")->result();
        ?>
<!DOCTYPE html>
        <html>
        <head>
            <title></title>
            <script type="text/javascript">
            window.print();
            </script>
        </head>
        <body>
        <table>
            <tr>
                <td colspan="9"></td>
            </tr>
        </table>
        <table>
            <tr>
                <td colspan="2"><img style="height:50px;width:auto" src="<?= base_url() ?>/assets/images/img-kop.jpg"></td>
                <td colspan="5" align="center"><h2>Sekolah Tinggi Bahasa Asing</h2><h3 style="margin-top:-20px">(STBA) LIA Yogyakarta</h3></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="9" align="center"><h3>KRS Mahasiswa</h3></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td colspan="8">:<?= $mhs->nama_mhs ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td colspan="8">:<?= $mhs->nim ?></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td colspan="8">:<?= $mhs->nama_jenjang.' '.$mhs->nama_jurusan ?></td>
            </tr>
            <tr>
                <td colspan="9"><hr><hr><br></td>
            </tr>
        <tr style="border:1px;outline: thin solid">
            <td style="border:1px;outline: thin solid">NO</td>
            <td style="border:1px;outline: thin solid">Nama MK</td>
            <td style="border:1px;outline: thin solid">SKS</td>
            <td style="border:1px;outline: thin solid">Semester</td>
            <td style="border:1px;outline: thin solid">Kelas</td>
            <td style="border:1px;outline: thin solid">Jadwal</td>
            <td style="border:1px;outline: thin solid">Ruang</td>
            <td style="border:1px;outline: thin solid">Dosen</td>
        </tr>
        <?php
    foreach ($mk_daftar as $data) {
        ?>

        <tr style="border:1px;outline: thin solid">
            <td style="border:1px;outline: thin solid"><?= $nourut ?></td>
            <td style="border:1px;outline: thin solid"><?= '('.$data->kode_mk.') '.$data->nama_mk ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->sks_mk ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->semester_prodi ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->nama_kelas ?></td>
            <td style="border:1px;outline: thin solid">
                                                <?= $data->hari ?>
                                                <?= $data->jam_mulai ?> -
                                                <?= $data->jam_akhir ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->nama_ruangan ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->nama ?></td>
        </tr>
        <?php
            $nourut++;
        }
    }
    function cetakallby(){
        $nourut=1;
        $prodi=$this->input->get("prodi");
        $ta=$this->input->get("ta").'/'.($this->input->get("ta")+1);
        $smt=$this->input->get("smt");
        $smt_var=$this->db->query("SELECT * FROM setup_smt where id_smt='".$smt."'")->row();
        $smt_aktif=$this->db->query("SELECT * FROM setup_aktif")->row();

        if($prodi=="" || $prodi==NULL){
            $q="SELECT * FROM tb_matakuliah a 
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
        JOIN tbl_krs k ON k.`id_matakuliah`=x.`id`
        JOIN tbl_mahasiswa l ON l.`nim`=k.`nim`
        WHERE a.status='1' and a.semester='".$smt."' and a.tahun_ajaran='".$ta."' and ploting_status='Y' group by k.nim order by id_jadwal_mk desc,nama_jenjang,nama_jurusan,nama_mk";
        }else{
            $q="SELECT * FROM tb_matakuliah a 
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
        JOIN tbl_krs k ON k.`id_matakuliah`=x.`id`
        JOIN tbl_mahasiswa l ON l.`nim`=k.`nim`
        WHERE b.`id_jurusan`='".$prodi."' and a.status='1' and a.semester='".$smt."' and a.tahun_ajaran='".$ta."' and ploting_status='Y' group by k.nim order by id_jadwal_mk desc,nama_jenjang,nama_jurusan,nama_mk";
        }
        $mk_list=$this->db->query($q)->result();


        ?>
<!DOCTYPE html>
        <html>
        <head>
            <title></title>
            <script type="text/javascript">
            window.print();
            </script>
        </head>
        <body>
        <?php
        foreach ($mk_list as $tracing_data) {
            $mhs=$this->db->query("SELECT * FROM tbl_mahasiswa a join tb_jurusan b on a.id_jenjang=b.id_jurusan JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang` where nim='$tracing_data->nim'")->row();
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
        JOIN tbl_krs k ON k.`id_matakuliah`=x.`id`
        JOIN tbl_mahasiswa l ON l.`nim`=k.`nim`
        WHERE l.nim='$tracing_data->nim' and a.status='1' and a.semester='$smt' and a.tahun_ajaran='$ta' and ploting_status='Y' order by id_jadwal_mk desc,nama_jenjang,nama_jurusan,nama_mk")->result();
        ?>
        <table  style="page-break-before:always;">
            <tr>
                <td colspan="9"></td>
            </tr>
        </table>
        <table>
            <tr>
                <td colspan="2"><img style="height:50px;width:auto" src="<?= base_url() ?>/assets/images/img-kop.jpg"></td>
                <td colspan="5" align="center"><h2>Sekolah Tinggi Bahasa Asing</h2><h3 style="margin-top:-20px">(STBA) LIA Yogyakarta</h3></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="9" align="center"><h3>KRS Mahasiswa<br>[<?= $ta ?> - <?= $smt_var->smt?>]</h3></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td colspan="8">:<?= $mhs->nama_mhs ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td colspan="8">:<?= $mhs->nim ?></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td colspan="8">:<?= $mhs->nama_jenjang.' '.$mhs->nama_jurusan ?></td>
            </tr>
            <tr>
                <td colspan="9"><hr><hr><br></td>
            </tr>
        <tr style="border:1px;outline: thin solid">
            <td style="border:1px;outline: thin solid">NO</td>
            <td style="border:1px;outline: thin solid">Nama MK</td>
            <td style="border:1px;outline: thin solid">SKS</td>
            <td style="border:1px;outline: thin solid">Semester</td>
            <td style="border:1px;outline: thin solid">Kelas</td>
            <td style="border:1px;outline: thin solid">Jadwal</td>
            <td style="border:1px;outline: thin solid">Ruang</td>
            <td style="border:1px;outline: thin solid">Dosen</td>
        </tr>
        <?php
    foreach ($mk_daftar as $data) {
        ?>

        <tr style="border:1px;outline: thin solid">
            <td style="border:1px;outline: thin solid"><?= $nourut ?></td>
            <td style="border:1px;outline: thin solid"><?= '('.$data->kode_mk.') '.$data->nama_mk ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->sks_mk ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->semester_prodi ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->nama_kelas ?></td>
            <td style="border:1px;outline: thin solid">
                                                <?= $data->hari ?>
                                                <?= $data->jam_mulai ?> -
                                                <?= $data->jam_akhir ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->nama_ruangan ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->nama ?></td>
        </tr>
        <?php
            $nourut++;
        }
        ?>
        </table>
        <?php
            
        }
        ?>
        </body>
        </html>
        <?php

    }
    function cetakby(){
        $nourut=1;
        $nim=$this->input->get("nim");
        $ta=$this->input->get("ta");
        $smt=$this->input->get("smt");
        $smt_var=$this->db->query("SELECT * FROM setup_smt where id_smt='".$smt."'")->row();
        $smt_aktif=$this->db->query("SELECT * FROM setup_aktif")->row();
        $mhs=$this->db->query("SELECT * FROM tbl_mahasiswa a join tb_jurusan b on a.id_jenjang=b.id_jurusan JOIN tb_jenjang c ON b.`id_jenjang`=c.`id_jenjang` where nim='$nim'")->row();
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
        JOIN tbl_krs k ON k.`id_matakuliah`=x.`id`
        JOIN tbl_mahasiswa l ON l.`nim`=k.`nim`
        WHERE l.nim='$nim' and a.status='1' and a.semester='$smt' and a.tahun_ajaran='$ta' and ploting_status='Y' order by id_jadwal_mk desc,nama_jenjang,nama_jurusan,nama_mk")->result();
        ?>
<!DOCTYPE html>
        <html>
        <head>
            <title></title>
            <script type="text/javascript">
            window.print();
            </script>
        </head>
        <body>
        <table>
            <tr>
                <td colspan="9"></td>
            </tr>
        </table>
        <table>
            <tr>
                <td colspan="2"><img style="height:50px;width:auto" src="<?= base_url() ?>/assets/images/img-kop.jpg"></td>
                <td colspan="5" align="center"><h2>Sekolah Tinggi Bahasa Asing</h2><h3 style="margin-top:-20px">(STBA) LIA Yogyakarta</h3></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="9" align="center"><h3>KRS Mahasiswa<br>[<?= $ta ?> - <?= $smt_var->smt?>]</h3></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td colspan="8">:<?= $mhs->nama_mhs ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td colspan="8">:<?= $mhs->nim ?></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td colspan="8">:<?= $mhs->nama_jenjang.' '.$mhs->nama_jurusan ?></td>
            </tr>
            <tr>
                <td colspan="9"><hr><hr><br></td>
            </tr>
        <tr style="border:1px;outline: thin solid">
            <td style="border:1px;outline: thin solid">NO</td>
            <td style="border:1px;outline: thin solid">Nama MK</td>
            <td style="border:1px;outline: thin solid">SKS</td>
            <td style="border:1px;outline: thin solid">Semester</td>
            <td style="border:1px;outline: thin solid">Kelas</td>
            <td style="border:1px;outline: thin solid">Jadwal</td>
            <td style="border:1px;outline: thin solid">Ruang</td>
            <td style="border:1px;outline: thin solid">Dosen</td>
        </tr>
        <?php
    foreach ($mk_daftar as $data) {
        ?>

        <tr style="border:1px;outline: thin solid">
            <td style="border:1px;outline: thin solid"><?= $nourut ?></td>
            <td style="border:1px;outline: thin solid"><?= '('.$data->kode_mk.') '.$data->nama_mk ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->sks_mk ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->semester_prodi ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->nama_kelas ?></td>
            <td style="border:1px;outline: thin solid">
                                                <?= $data->hari ?>
                                                <?= $data->jam_mulai ?> -
                                                <?= $data->jam_akhir ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->nama_ruangan ?></td>
            <td style="border:1px;outline: thin solid"><?= $data->nama ?></td>
        </tr>
        <?php
            $nourut++;
        }
    }
	function krs_acc(){
        $id=$this->input->get("id");
        $nim=$this->input->get("nim");
        $data = array(
                'status_krs' => 'Y',
        );

        $this->db->where('id_krs', $id);
        $this->db->update('tbl_krs', $data);
        redirect(base_url("krs/search?nim=".$nim));
	}
	function krs_deny(){
        $id=$this->input->get("id");
        $nim=$this->input->get("nim");
        $data = array(
                'status_krs' => 'N',
        );

        $this->db->where('id_krs', $id);
        $this->db->update('tbl_krs', $data);
        redirect(base_url("krs/search?nim=".$nim));
	}
	function jadwalkrs(){
        $prodi=$this->db->query("select * from tb_jurusan a join tb_jenjang b on a.id_jenjang=b.id_jenjang join tbl_jadwal_krs c on c.id_jurusan=a.id_jurusan")->result();
		$data = array(
            'judul' => 'Jadwal KRS',
            'content' => 'adminstba/layout/content/krs/jadwal',
            'prodi' => $prodi,
        );
        $this->load->view('adminstba/layout/layout',$data);
	}
	function jadwal_save(){
        $id_jadwal=$this->input->post("id_jadwal_krs");
        $tgl_awal=$this->input->post("date");
        $tgl_akhir=$this->input->post("date_end");
        $data = array(
                'tgl_awl_krs' => $tgl_awal,
                'tgl_akr_krs' => $tgl_akhir
        );

        $this->db->where('id_jadwal_krs', $id_jadwal);
        $this->db->update('tbl_jadwal_krs', $data);
        redirect('krs/jadwal');
	}

}