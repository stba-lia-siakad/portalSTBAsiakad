<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Plot_model extends CI_Model
{

    public $table = 'tb_matakuliah';
    public $id = 'tb_matakuliah.id_mk';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {

        $ta_aktif=$this->db->query("select * from setup_aktif")->row();
        $this->db->like('semester',$ta_aktif->smt);
        $this->db->like('tahun_ajaran',$ta_aktif->ta);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $ta_aktif=$this->db->query("select * from setup_aktif")->row();
        $this->db->where($this->id, $id);
        $this->db->like('semester',$ta_aktif->smt);
        $this->db->like('tahun_ajaran',$ta_aktif->ta);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $ta_aktif=$this->db->query("select * from setup_aktif")->row();
        $this->db->from($this->table);
        $this->db->join('tbl_kelas_mk', 'tb_matakuliah.id_mk = tbl_kelas_mk.id_mk', 'left');
        $this->db->where('semester',$ta_aktif->smt);
        $this->db->where('tahun_ajaran',$ta_aktif->ta);
        $this->db->group_start();
        $this->db->like('tb_matakuliah.id_mk', $q);
    	$this->db->or_like('kode_mk', $q);
    	$this->db->or_like('nama_mk', $q);
    	$this->db->or_like('id_prasyarat', $q);
    	$this->db->or_like('id_kel_mk', $q);
    	$this->db->or_like('sks_mk', $q);
    	$this->db->or_like('id_jurusan', $q);
    	$this->db->or_like('status', $q);
    	$this->db->or_like('semester_prodi', $q);
        $this->db->group_end();
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $ta_aktif=$this->db->query("select * from setup_aktif")->row();
        $this->db->select('*,count(tbl_kelas_mk.id) as jml_kelas,tb_matakuliah.id_mk as id_makul');
        $this->db->order_by('jml_kelas', $this->order);

        $this->db->where('semester',$ta_aktif->smt);
        $this->db->where('tahun_ajaran',$ta_aktif->ta);

        $this->db->group_start();
        $this->db->like('tb_matakuliah.id_mk', $q);
    	$this->db->or_like('kode_mk', $q);
    	$this->db->or_like('nama_mk', $q);
    	$this->db->or_like('id_prasyarat', $q);
    	$this->db->or_like('id_kel_mk', $q);
    	$this->db->or_like('sks_mk', $q);
    	$this->db->or_like('id_jurusan', $q);
    	$this->db->or_like('status', $q);
    	$this->db->or_like('semester_prodi', $q);
        $this->db->group_end();
    	$this->db->limit($limit, $start);
        $this->db->join('tbl_kelas_mk', 'tb_matakuliah.id_mk = tbl_kelas_mk.id_mk', 'left');
        $this->db->group_by("tb_matakuliah.id_mk");
        // $this->db->get($this->table)->result();
        // var_dump($this->db->last_query());
        // die();
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Plot_model.php */
/* Location: ./application/models/Plot_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-03 23:45:35 */
/* http://harviacode.com */