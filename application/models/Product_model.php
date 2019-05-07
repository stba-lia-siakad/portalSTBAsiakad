<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "tb_matakuliah";

    public $id_mk;
    public $kode_mk;
    public $nama_mk;
    public $sks_mk;
    public $semester;
    public $syarat;

    public function rules()
    {
        return [
            ['field' => 'id_mk',
            'label' => 'Id_mk',
            'rules' => 'required'],

            ['field' => 'kode_mk',
            'label' => 'Kode_mk',
            'rules' => 'required'],

            ['field' => 'nama_mk',
            'label' => 'Nama_mk',
            'rules' => 'numeric'],
            
            ['field' => 'sks_mk',
            'label' => 'Sks_mk',
            'rules' => 'required'],

            ['field' => 'semester',
            'label' => 'Semester',
            'rules' => 'required'],

            ['field' => 'syarat',
            'label' => 'Syarat',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_mk" => $id])->row();
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
        $this->db->update($this->_table, $this, array('id_mk' => $post['id_mk']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_mk" => $id_mk));
    }
}
