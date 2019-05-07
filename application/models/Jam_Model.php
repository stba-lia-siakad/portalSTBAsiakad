<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jam_model extends CI_Model
{

    public $table = 'tbl_jam';
    public $id_jam = 'id_jam';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id_jam, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id_jam)
    {
        $this->db->where($this->id_jam, $id_jam);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_jam', $q);
	$this->db->or_like('jam_mulai', $q);
	$this->db->or_like('jam_akhir', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id_jam, $this->order);
        $this->db->like('id_jam', $q);
	$this->db->or_like('jam_mulai', $q);
	$this->db->or_like('jam_akhir', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id_jam, $data)
    {
        $this->db->where($this->id_jam, $id_jam);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id_jam)
    {
        $this->db->where($this->id_jam, $id_jam);
        $this->db->delete($this->table);
    }

}

/* End of file Room_model.php */
/* Location: ./application/models/Room_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-11-25 20:14:57 */
/* http://harviacode.com */