<?php
class M_barang extends CI_Model{
     
    function show_barang(){
        $hasil=$this->db->query("SELECT * FROM tbl_barang");
        return $hasil;
    }
 
    function simpan_barang($kode_barang,$nama_barang,$satuan,$harga){
        $hasil=$this->db->query("INSERT INTO tbl_barang (barang_id,barang_nama,barang_satuan,barang_harga) VALUES ('$kode_barang','$nama_barang','$satuan','$harga')");
        return $hasil;
    }
     
}