<?php
class Jadwal_model2 extends CI_Model
{
	function fetch_dataak()
	{
	$query = $this->db->get("kalender_pembayaran");
	return $query;
	}
}

