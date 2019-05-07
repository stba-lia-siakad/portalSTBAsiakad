<?php
class Jadwal_model extends CI_Model
{
	function fetch_data()
	{
	$query = $this->db->get("kalender_akademik");
	return $query;
	}
}

