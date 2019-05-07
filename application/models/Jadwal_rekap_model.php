<?php
class Jadwal_rekap_model extends CI_Model
{
	function fetch_data()
	{
	$query = $this->db->query('
		SELECT * FROM tbl_rekappembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester 
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		');	
	return $query;
	}
	function kelas($id_ruang="")
	{
	$where="";

	if($id_ruang){
		$where.=" AND tbl_jadwal_mk.id_ruang = $id_ruang ";
	}
	$query = $this->db->query("
		SELECT * FROM tb_matakuliah
		JOIN tb_jurusan ON tb_matakuliah.id_jurusan=tb_jurusan.id_jurusan
		JOIN tb_jenjang ON tb_jurusan.id_jenjang=tb_jenjang.id_jenjang 
		JOIN setup_smt ON setup_smt.id_smt=tb_matakuliah.semester
		JOIN tbl_kelas_mk ON tbl_kelas_mk.id_mk=tb_matakuliah.id_mk
		JOIN tbl_ploting ON tbl_ploting.ploting_id_matakuliah=tbl_kelas_mk.id
		JOIN tbl_dosen ON tbl_ploting.ploting_id_dosen=tbl_dosen.id_dosen
		JOIN tbl_jadwal_mk ON tbl_kelas_mk.id=tbl_jadwal_mk.id_mk
		JOIN tbl_jam ON tbl_jam.id_jam=tbl_jadwal_mk.id_jam
		JOIN tbl_hari ON tbl_hari.id_hari=tbl_jadwal_mk.id_hari
		JOIN tb_ruangan ON tb_ruangan.id=tbl_jadwal_mk.id_ruang  
		where 1 $where");	
	return $query;
	}
	function belum_lunas()
	{
	$query = $this->db->query("
		SELECT * FROM tbl_rekappembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester 
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang
		join tbl_keuangan_status on tbl_mahasiswa.nim= tbl_keuangan_status.nim 
		where status_bayar = 1; 
		");	
	return $query;
	}
	function list_genap()
	{
	$query = $this->db->query('
		SELECT * FROM tbl_rekappembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester 
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		where tbl_semester.nama_semester%2 = 0;
		');	
	return $query;
	}
	function SPA()
	{
	$query = $this->db->query("
		SELECT * FROM tbl_rekappembayaran 
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester where jenis_pembayaran='SPA'");	
	return $query;
	}
	function SPPTetap()
	{
	$query = $this->db->query("
		SELECT * FROM tbl_rekappembayaran 
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester where jenis_pembayaran='SPP Tetap'");	
	return $query;
	}
	function SPPVariabel()
	{
	$query = $this->db->query("
		SELECT * FROM tbl_rekappembayaran 
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester where jenis_pembayaran='SPP Variabel'");
	return $query;
	}

	function mahasiswa()
	{
	$query = $this->db->query("
		SELECT * FROM tbl_mahasiswa 
		");	
	return $query;
	}

	function cek_tambah($id_pembayaran)
	{
	$query = $this->db->query("
		SELECT * FROM tbl_jenispembayaran 
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan 
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_jenispembayaran.semester=tbl_semester.id_semester 
		where tbl_jenispembayaran.id_pembayaran='$id_pembayaran'");	
	return $query;
	}
	function mahasiswa_id($nim){
		$query = $this->db->query(" SELECT * FROM `tbl_mahasiswa` where nim= '$nim' ");	
	return $query;
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function edit_data($id)
	{
	$query = $this->db->query("
		SELECT * FROM tbl_rekappembayaran 
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester
		where id_rekap='$id'
		");	
	return $query;
	}

	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function cetak_data($id)
	{
	$query = $this->db->query("
		SELECT * FROM tbl_rekappembayaran 
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester
		where id_rekap='$id'
		");	
	return $query;
	}
	function cari_data($id)
	{
	$query = $this->db->query("
		SELECT * FROM tbl_rekappembayaran 
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester
		where id_rekap like '%$id%' 
		or tbl_rekappembayaran.nim like '%$id%' 
		or tbl_jenjang.nama_jenjang like '%$id%' 
		or tbl_mahasiswa.nama_mahasiswa like '%$id%'
		or tbl_jurusan.nama_jurusan like '%$id%' 
		or tbl_jenispembayaran.jenis_pembayaran like '%$id%' 
		or tbl_rekappembayaran.status like '%$id%' 
		or tbl_rekappembayaran.tanggal like '%$id%' 
		or tbl_jenispembayaran.jumlah like '%$id%'
		or tbl_rekappembayaran.catatan like '%$id%'
		or tbl_semester.th_ajaran like '%$id%'
		");	
	return $query;
	}

	function index_laporan($awal,$akhir)
	{
	$query = $this->db->query("
		SELECT * FROM tbl_rekappembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester 
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		where tanggal between '$awal' and '$akhir'"); 
		
	return $query;
	}

	function update_status($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function data_pembayaran()
	{
	$query = $this->db->query('
		SELECT * FROM tbl_keuangan_status 
		join tbl_mahasiswa on tbl_keuangan_status.nim = tbl_mahasiswa.nim
		join tbl_jurusan on tbl_mahasiswa.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		');	
	return $query;
	}
	/*function cari_SPA($id)
	{
	$query = $this->db->query("
		SELECT * FROM tbl_rekappembayaran 
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester
		where id_rekap like '%$id%' 
		or tbl_rekappembayaran.nim like '%$id%' 
		or tbl_jenjang.nama_jenjang like '%$id%' 
		or tbl_mahasiswa.nama_mahasiswa like '%$id%'
		or tbl_jurusan.nama_jurusan like '%$id%' 
		or tbl_jenispembayaran.jenis_pembayaran like '%$id%' 
		or tbl_rekappembayaran.status like '%$id%' 
		or tbl_rekappembayaran.tanggal like '%$id%' 
		or tbl_jenispembayaran.jumlah like '%$id%'
		or tbl_rekappembayaran.catatan like '%$id%'
		or tbl_semester.th_ajaran like '%$id%' 
		and jenis_pembayaran='SPA'
		");	
	}
	function cari_SPPTteap($id)
	{
	$query = $this->db->query("
		SELECT * FROM tbl_rekappembayaran 
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester
		where id_rekap like '%$id%' 
		or tbl_rekappembayaran.nim like '%$id%' 
		or tbl_jenjang.nama_jenjang like '%$id%' 
		or tbl_mahasiswa.nama_mahasiswa like '%$id%'
		or tbl_jurusan.nama_jurusan like '%$id%' 
		or tbl_jenispembayaran.jenis_pembayaran like '%$id%' 
		or tbl_rekappembayaran.status like '%$id%' 
		or tbl_rekappembayaran.tanggal like '%$id%' 
		or tbl_jenispembayaran.jumlah like '%$id%'
		or tbl_rekappembayaran.catatan like '%$id%'
		or tbl_semester.th_ajaran like '%$id%' 
		and jenis_pembayaran='SPP Tetap'
		");	
	return $query;
	}
	function cari_SPPVariabel($id)
	{
	$query = $this->db->query("
		SELECT * FROM tbl_rekappembayaran 
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester
		where id_rekap like '%$id%' 
		or tbl_rekappembayaran.nim like '%$id%' 
		or tbl_jenjang.nama_jenjang like '%$id%' 
		or tbl_mahasiswa.nama_mahasiswa like '%$id%'
		or tbl_jurusan.nama_jurusan like '%$id%' 
		or tbl_jenispembayaran.jenis_pembayaran like '%$id%' 
		or tbl_rekappembayaran.status like '%$id%' 
		or tbl_rekappembayaran.tanggal like '%$id%' 
		or tbl_jenispembayaran.jumlah like '%$id%'
		or tbl_rekappembayaran.catatan like '%$id%'
		or tbl_semester.th_ajaran like '%$id%' 
		and jenis_pembayaran='SPP Variabel'
		");	
	}*/	
	/*pnyaku nek buat input kek gini
	kayane karna dia belum ambil data dari form ga to?
	*/
	/*public function save()
    {
        $post = $this->input->post();
        $this->idbarang = $post["idbarang"];
        $this->idkategori = $post["idkategori"];
        $this->namabarang = $post["namabarang"];
        $this->image = $this->_uploadImage();
        $this->idmerk = $post["idmerk"];
        $this->idsupplier = $post["idsupplier"];

        $this->db->insert($this->_table, $this);
    }*/

}

/*<?php
class KeuanganRekap_model extends CI_Model
{
	function fetch_data()
	{
	$query = $this->db->query('
		SELECT * FROM tbl_rekappembayaran 
		join tbl_mahasiswa on tbl_rekappembayaran.nim = tbl_mahasiswa.nim
		join tbl_jenispembayaran on tbl_rekappembayaran.tipe_pembayaran=tbl_jenispembayaran.id_pembayaran 
		join tbl_semester on tbl_semester.id_semester=tbl_jenispembayaran.semester 
		join tbl_jurusan on tbl_mahasiswa.jurusan=tbl_jurusan.id_jurusan
		join tbl_jenjang on tbl_mahasiswa.jenjang=tbl_jenjang.id_jenjang');	
	return $query;
	}
}
*/
