<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik_model extends CI_Model {
	public function getMahasiswa(){
		$sql = "SELECT b.name as nama_angkatan, count(a.angkatan) as jumlah from tbl_mahasiswa as a left join angkatan as b on b.id=a.angkatan GROUP BY a.angkatan ORDER BY nama_angkatan ASC";
		return $this->db->query($sql)->result();
	}
}