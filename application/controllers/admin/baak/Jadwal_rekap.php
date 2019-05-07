
<?php

class Jadwal_rekap extends CI_Controller
{
	
	public function index(){
		$this->load->model("KeuanganRekap_model");
		$data["fetch_data"] = $this->KeuanganRekap_model->fetch_data();
		$this->load->view("adminstba/keuangan/keuangan_rekap", $data);
	}
	public function kelas($id_ruang=""){
		$this->load->model("Jadwal_rekap_model");
		$data["fetch_data"] = $this->Jadwal_rekap_model->kelas($id_ruang);
		$this->load->view("adminstba/layout/content/jadwal/jadwal_rekap", $data);
	}
	public function list_genap(){
		$this->load->model("KeuanganRekap_model");
		$data["fetch_data"] = $this->KeuanganRekap_model->list_genap();
		$this->load->view("adminstba/keuangan/keuangan_rekap", $data);
	}
	public function SPA(){
		$this->load->model("KeuanganRekap_model");
		$data["SPA"] = $this->KeuanganRekap_model->SPA();
		$this->load->view("adminstba/keuangan/keuangan_dataSPA", $data);
	}
	public function SPPTetap(){
		$this->load->model("KeuanganRekap_model");
		$data["SPPTetap"] = $this->KeuanganRekap_model->SPPTetap();
		$this->load->view("adminstba/keuangan/keuangan_dataSPPTetap", $data);
	}
	public function SPPVariabel(){
		$this->load->model("KeuanganRekap_model");
		$data["SPPVariabel"] = $this->KeuanganRekap_model->SPPVariabel();
		$this->load->view("adminstba/keuangan/keuangan_dataSPPVariabel", $data);
	}
	public function input_pembayaran(){
		$this->load->model("KeuanganRekap_model");
		$data["mahasiswa"] = $this->KeuanganRekap_model->mahasiswa();
		$this->load->view("adminstba/keuangan/keuangan_input", $data);
	}
	//input nim
	/*public function input_pembayaran(){
		$this->load->model("KeuanganDaftarDetail_model");
		$data["daftar_pembayaran"] = $this->KeuanganDaftarDetail_model->daftar_pembayaran();
		$this->load->view("adminstba/keuangan/keuangan_inputList", $data);
	}*/
	//input data yang dibayarkan
	public function list_pembayaran(){
		$this->load->model("KeuanganDaftarDetail_model");
		$nim = $this->input->post('nim');
		$data["input_list"] = $this->KeuanganDaftarDetail_model->input_list($nim);
		$this->load->view("adminstba/keuangan/Keuangan_inputPembayaran", $data);
	}
	public function edit_data($id){
		$this->load->model("KeuanganRekap_model");
		$data["edit_data"] = $this->KeuanganRekap_model->edit_data($id);
		$this->load->view("adminstba/keuangan/Keuangan_editRekap", $data);
	}

	//cek data yang dibayarkan
	public function cek_bayar(){
		$this->load->model("KeuanganRekap_model");
		$nim = $this->input->post('nim');
		$id_pembayaran = $this->input->post('id_pembayaran');
		$data["mahasiswa"] = $this->KeuanganRekap_model->mahasiswa_id($nim);
		$data["cek_tambah"] = $this->KeuanganRekap_model->cek_tambah($id_pembayaran);
		$this->load->view("adminstba/keuangan/Keuangan_cekInput", $data);
	
	}
	public function tambah_aksi(){
		$this->load->model("KeuanganRekap_model");
		$nim = trim($this->input->post('nim'));
		$id_pembayaran = trim($this->input->post('id_pembayaran'));
		$tgl_bayar = $this->input->post('tgl_bayar');
 		$jumlah_dibayarkan = $this->input->post('jumlah');
 		$total = $this->input->post('total');
 		$tipe_bayar = $this->input->post('tipe_bayar');
 		$sks = $this->input->post('sks');
 		$note = $this->input->post('note');
		if ($tipe_bayar == 'SPP Variabel') {
			$total = $sks*$total;
		}
		
 		if($jumlah_dibayarkan == $total){
 			$status='2';
 			$izin = '1';
 			
 			if($tipe_bayar == 'SPA'){
 			$data2 = array(
			'nim' => $nim,
			'izin_krs' => $izin,
			'spa' => $status);
 			}else if ($tipe_bayar == 'SPP Variabel') {
			$data2 = array(
			'spp_variabel' => $status);
 			}else if ($tipe_bayar == 'SPP Tetap') {
			$data2 = array(
			'spp_tetap' => $status);
 			}else{
			$data2 = array(
			'nim' => $nim
			);	
			};
		}else{
			$status='1';
 			$izin = 0;
 			
 			if($tipe_bayar == 'SPA'){
 			$data2 = array(
			'nim' => $status,
			'izin_krs' => $izin,
			'spa' => $status);
 			}else if ($tipe_bayar == 'SPP Variabel') {
			$data2 = array(
			'spp_variabel' => $status);
 			}else if ($tipe_bayar == 'SPP Tetap') {
			$data2 = array(
			'spp_tetap' => $status);
 			}else{
			$data2 = array(
			'nim' => $nim
			);};
		}
		
 		






		$data = array(
			'nim' => $nim,
			'tipe_pembayaran' => $id_pembayaran,
			'tanggal' => $tgl_bayar,
			'status_bayar' => $status,
			'jumlah_dibayarkan' => $jumlah_dibayarkan,
			'catatan' => $note,
			'sks' =>$sks
			);
            
          $result = $this->KeuanganRekap_model->input_data($data,'tbl_rekappembayaran');   
          $result2 = $this->KeuanganRekap_model->update_status($nim, $data2,'tbl_keuangan_status');    
                
/*          echo "$jumlah_dibayarkan, $tipe_bayar, $total $status";
*/                redirect('admin/keuangan/keuangan_rekap');
                
	}
	public function update(){
		$this->load->model("KeuanganRekap_model");

		$id = $this->input->post('id_rekap');
		$nim = $this->input->post('nim');
		$total = $this->input->post('total');
		$jumlah_dibayarkan = $this->input->post('jumlah_dibayarkan');
		$tanggal = date("Y-m-d");
		$tipe_bayar = $this->input->post('tipe_bayar');
		echo "$total";
		echo "$jumlah_dibayarkan";
		if ($jumlah_dibayarkan==$total) {
			$jumlah = $jumlah_dibayarkan;
			$status = 2;

			}
			else{
			$jumlah = $jumlah_dibayarkan;
			$status = 1;
		};
		$catatan = $this->input->post('catatan');
	 	
		$data = array(
			'status_bayar' => $status,
			'jumlah_dibayarkan' => $jumlah,
			'catatan'	=> $catatan,
			'tanggal' => $tanggal
		);
	 
		$where = array(
			'id_rekap' => $id
		);

		if($jumlah_dibayarkan == $total){
 			$status='2';
 			$izin = '1';
 			
 			if($tipe_bayar == 'SPA'){
 			$data2 = array(
			'nim' => $nim,
			'izin_krs' => $izin,
			'spa' => $status);
 			}else if ($tipe_bayar == 'SPP Variabel') {
			$data2 = array(
			'spp_variabel' => $status);
 			}else if ($tipe_bayar == 'SPP Tetap') {
			$data2 = array(
			'spp_tetap' => $status);
 			}else{
			$data2 = array(
			'nim' => $nim
			);	
			};
		}else{
			$status='1';
 			$izin = 0;
 			
 			if($tipe_bayar == 'SPA'){
 			$data2 = array(
			'nim' => $status,
			'izin_krs' => $izin,
			'spa' => $status);
 			}else if ($tipe_bayar == 'SPP Variabel') {
			$data2 = array(
			'spp_variabel' => $status);
 			}else if ($tipe_bayar == 'SPP Tetap') {
			$data2 = array(
			'spp_tetap' => $status);
 			}else{
			$data2 = array(
			'nim' => $nim
			);};
		}

		$result = $this->KeuanganRekap_model->update($where,$data,'tbl_rekappembayaran');
        $result2 = $this->KeuanganRekap_model->update_status($nim, $data2,'tbl_keuangan_status');    
        redirect('admin/keuangan/keuangan_rekap');

	}
	public function cetak_data($id){
		$this->load->model("KeuanganRekap_model");
		$data["cetak_data"] = $this->KeuanganRekap_model->cetak_data($id);
		$this->load->view("adminstba/keuangan/keuangan_cetakRekap", $data);
	}
	public function cari_data(){
		$this->load->model("KeuanganRekap_model");
		$id = $this->input->post('cari');
		$data["fetch_data"] = $this->KeuanganRekap_model->cari_data($id);
		$this->load->view("adminstba/keuangan/keuangan_Rekap", $data);
	}
	public function cari_SPA(){
		$this->load->model("KeuanganRekap_model");
		$id = $this->input->post('cari');
		$data["SPA"] = $this->KeuanganRekap_model->cari_SPA($id);
		$this->load->view("adminstba/keuangan/keuangan_dataSPA", $data);
	}
	public function cari_SPPVariabel(){
		$this->load->model("KeuanganRekap_model");
		$id = $this->input->post('cari');
		$data["SPPVariabel"] = $this->KeuanganRekap_model->cari_SPPVariabel($id);
		$this->load->view("adminstba/keuangan/keuangan_dataSPPVariabel", $data);
	}
	public function cari_SPPTetap(){
		$this->load->model("KeuanganRekap_model");
		$id = $this->input->post('cari');
		$data["SPPTetap"] = $this->KeuanganRekap_model->cari_SPPTetap($id);
		$this->load->view("adminstba/keuangan/keuangan_dataSPPTetap", $data);
	}
	public function belum_lunas(){
		$this->load->model("KeuanganRekap_model");
		$data["belum_lunas"] = $this->KeuanganRekap_model->belum_lunas();
		$this->load->view("adminstba/keuangan/keuangan_belumLunas", $data);
	}

	public function laporan_pembayaran(){
		$this->load->view("adminstba/keuangan/keuangan_laporanPembayaran");
	}	
	public function laporan(){
		$this->load->model("KeuanganRekap_model");
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');
		$data["fetch_data"] = $this->KeuanganRekap_model->index_laporan($awal, $akhir);
		$this->load->view("adminstba/keuangan/keuangan_rekapLaporan", $data);
	}
	public function data_pembayaran(){
		$this->load->model("KeuanganRekap_model");
		$data["data_laporan"] = $this->KeuanganRekap_model->data_pembayaran();
		$this->load->view("adminstba/keuangan/keuangan_dataLaporan", $data);
	}
	public function izin_krs($id=null){
		$this->load->model("KeuanganRekap_model");
		$data["data_laporan"] = $this->KeuanganRekap_model->data_pembayaran();
		$id = $this->input->post('id');
		$izin = $this->input->post('izin');
		
		if ($izin == 1) {
			$izin = 0;
			}
			else{
			$izin = 1;
		};
	 	
		$data = array(
			'izin_krs' => $izin
		);
	 
		$where = array(
			'id' => $id
		);

		$result2 = $this->KeuanganRekap_model->update_status($where, $data,'tbl_keuangan_status');
		redirect('admin/keuangan/keuangan_rekap/data_pembayaran');
	}

}