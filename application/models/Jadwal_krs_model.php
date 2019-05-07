<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_krs_model extends CI_Model
{
    private $_table = "tbl_jadwal_krs";

    public $id_jadwal_krs;
    public $tgl_awl_krs;
    public $tgl_akr_krs;
    public $keterangan;
    

    public function rules()
    {
        return [
            ['field' => 'id_jadwal_krs',
            'label' => 'Id_jadwal_krs',
            'rules' => 'required'],

            ['field' => 'tgl_awl_krs',
            'label' => 'Tgl_awl_krs',
            'rules' => 'required'],

            ['field' => 'tgl_akr_krs',
            'label' => 'Tgl_akr_krs',
            'rules' => 'required'],

            ['field' => 'keterangan',
            'label' => 'Keterangan',
            'rules' => 'required']            
            

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_jadwal_krs" => $id_jadwal_krs])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kode_mk = $post["kode_mk"];
        $this->nama_mk = $post["nama_mk"];
        $this->sks_mk = $post["sks_mk"];
        $this->semester = $post["semester"];
        $this->syarat = $post["syarat"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_mk = $post["id_mk"];
        $this->kode_mk = $post["kode_mk"];
        $this->nama_mk = $post["nama_mk"];
        $this->sks_mk = $post["sks_mk"];
        $this->semester = $post["semester"];
        $this->syarat = $post["syarat"];
        $this->db->update($this->_table, $this, array('id_mk' => $post['id_jadwal_krs']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_mk" => $id_mk));
    }
}
