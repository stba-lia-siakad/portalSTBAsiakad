<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ploting_model extends CI_Model
{
    private $_table = "tbl_ploting";

    public $id_ploting;
    public $ploting_id_matakuliah;
    public $ploting_id_dosen;
    public $ploting_date;
    public $ploting_id_akun;
    public $ploting_status;
    

    public function rules()
    {
        return [
            ['field' => 'id_ploting',
            'label' => 'Id_ploting',
            'rules' => 'required'],

            ['field' => 'ploting_id_matakuliah',
            'label' => 'Ploting_id_matakuliah',
            'rules' => 'required'],

            ['field' => 'ploting_id_dosen',
            'label' => 'Ploting_id_dosen',
            'rules' => 'required'],

            ['field' => 'ploting_date',
            'label' => 'Ploting_date',
            'rules' => 'required'],

            ['field' => 'ploting_id_akun',
            'label' => 'Ploting_id_akun',
            'rules' => 'required'],

            ['field' => 'ploting_status',
            'label' => 'Ploting_status',
            'rules' => 'required']            
            

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_ploting" => $id_ploting])->row();
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
