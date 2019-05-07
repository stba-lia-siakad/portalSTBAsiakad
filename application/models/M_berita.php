<?php
class M_berita extends CI_Model{
	public $table = 'tbl_berita';
    public $id = 'berita_id';
    public $order = 'DESC';

	function simpan_berita($jdl,$berita,$gambar,$pj){
		$hsl=$this->db->query("INSERT INTO tbl_berita (berita_judul,berita_isi,berita_image,pj) VALUES ('$jdl','$berita','$gambar','$pj')");
		return $hsl;
	}

	function get_berita_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_berita WHERE berita_id='$kode'");
		return $hsl;
	}

	function get_all_berita(){
		$hsl=$this->db->query("SELECT * FROM tbl_berita ORDER BY berita_id DESC");
		return $hsl;
	}
	function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->group_start();
        $this->db->or_like('berita_id', $q);
        $this->db->or_like('berita_judul', $q);
        $this->db->or_like('berita_isi', $q);
        $this->db->or_like('berita_image', $q);
        $this->db->or_like('pj', $q);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    function total_rows($q = NULL) {
        $this->db->group_start();
        $this->db->or_like('berita_id', $q);
        $this->db->or_like('berita_judul', $q);
        $this->db->or_like('berita_isi', $q);
        $this->db->or_like('berita_image', $q);
        $this->db->or_like('pj', $q);
        $this->db->group_end();
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}