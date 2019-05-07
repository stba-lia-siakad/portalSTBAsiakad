<?php
class KeuanganDaftarDetail_model extends CI_Model
{
	function fetch_data()
	{
	$query = $this->db->query('
		SELECT * FROM tbl_jenispembayaran 
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan 
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_jenispembayaran.semester=tbl_semester.id_semester');	
	return $query;
	}
	function jurusan_list()
	{
	$query = $this->db->query('
		SELECT * FROM tbl_jenispembayaran 
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan 
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_jenispembayaran.semester=tbl_semester.id_semester group by id_jurusan');	
	return $query;
	}
	function semester_list($id,$th)
	{
	$query = $this->db->query("
		SELECT * FROM tbl_jenispembayaran 
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan 
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_jenispembayaran.semester=tbl_semester.id_semester
		where tbl_jurusan.id_jurusan='$id' and tbl_semester.th_ajaran='$th' group by id_semester ");	
	return $query;
	}
	function tahun_list($id)
	{
	$query = $this->db->query("
		SELECT * FROM tbl_jenispembayaran 
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan 
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_jenispembayaran.semester=tbl_semester.id_semester
		where tbl_jurusan.id_jurusan='$id' group by th_ajaran ");	
	return $query;
	}
	function detail_list($id_jurusan, $nama_semester)
	{
	$query = $this->db->query("
		SELECT * FROM tbl_jenispembayaran 
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan 
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_jenispembayaran.semester=tbl_semester.id_semester
		where tbl_semester.nama_semester='$nama_semester' and tbl_jurusan.id_jurusan='$id_jurusan' ");	
	return $query;
	}
	function input_list($nim)
	{
	$query = $this->db->query("
		SELECT * FROM `tbl_mahasiswa` 
		JOIN tbl_jurusan on  tbl_jurusan.id_jurusan=tbl_mahasiswa.jurusan
		JOIN tbl_jenispembayaran on tbl_jenispembayaran.jurusan=tbl_jurusan.id_jurusan
		JOIN tbl_jenjang on tbl_jenjang.id_jenjang= tbl_jurusan.jenjang
		JOIN tbl_semester on tbl_semester.id_semester = tbl_jenispembayaran.semester
		where tbl_jenispembayaran.jurusan = (select jurusan FROM tbl_mahasiswa where nim = '$nim') 
		and tbl_jenispembayaran.semester = (select semester FROM tbl_mahasiswa where nim = '$nim') group by jenis_pembayaran 
		order by tbl_jenispembayaran.jenis_pembayaran");	
	return $query;
	}
	
	function daftar_jurusan()
	{
	$query = $this->db->query('
		SELECT * FROM tbl_jurusan 
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang ');	
	return $query;
	}


	function daftar_semester()
	{
	$query = $this->db->query('
		SELECT * FROM tbl_semester ');	
	return $query;
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	/*{
	$query = $this->db->query('
		SELECT * FROM tbl_jurusan 
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang ');	
	return $query;
	}	*/
	function edit($id)
	{$query = $this->db->query("
		SELECT * FROM tbl_jenispembayaran 
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan 
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_jenispembayaran.semester=tbl_semester.id_semester 
		where tbl_jenispembayaran.id_pembayaran='$id' ");	
	return $query;
	}
	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function cari_data($id)
	{
	$query = $this->db->query("
		SELECT * FROM tbl_jenispembayaran 
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan 
		join tbl_jenjang on tbl_jurusan.jenjang=tbl_jenjang.id_jenjang 
		join tbl_semester on tbl_jenispembayaran.semester=tbl_semester.id_semester
		where id_pembayaran like '%$id%' 
		or tbl_jenjang.nama_jenjang like '%$id%' 
		or tbl_jurusan.nama_jurusan like '%$id%' 
		or tbl_jenispembayaran.jenis_pembayaran like '%$id%' 
		or tbl_jenispembayaran.jumlah like '%$id%'
		or tbl_semester.th_ajaran like '%$id%'
		");	
	return $query;
	}
	function daftar_pembayaran()
	{
	$query = $this->db->query('
		SELECT * FROM tbl_jenispembayaran 
		join tbl_jurusan on tbl_jenispembayaran.jurusan = tbl_jurusan.id_jurusan 
		group by jenis_pembayaran');	
	return $query;
	}
}

