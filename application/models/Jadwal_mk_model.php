<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_mk_model extends CI_Model
{
    private $_table = "jadwal_mk";

    public $id_jenjang;
    public $nama_jenjang;
    public $Jumlah;
    

    public function rules()
    {
        return [
            ['field' => 'id_jadwal',
            'label' => 'Id_jadwal',
            'rules' => 'required'],

            ['field' => 'mk',
            'label' => 'Mk',
            'rules' => 'required'],

            ['field' => 'jam',
            'label' => 'Jam',
            'rules' => 'required'],

            ['field' => 'hari',
            'label' => 'Hari',
            'rules' => 'required'],

            ['field' => 'ruang',
            'label' => 'Ruang',
            'rules' => 'required']
            

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_jenjang" => $id_jenjang])->row();
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
