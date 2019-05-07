<?php
class Awal extends CI_Model
{
	function fetch_data()
	{
	$query = $this->db->get("kalender_akademik");
	return $query;
	}

	function fetch_dataak()
	{
	$query = $this->db->get("kalender_akademik");
	return $query;
	}
}

