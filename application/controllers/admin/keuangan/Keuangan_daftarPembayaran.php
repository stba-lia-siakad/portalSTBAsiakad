
<?php

class Keuangan_daftarPembayaran extends CI_Controller
{
	
	public function index(){
		$this->load->model("KeuanganDaftarDetail_model");
		$data["jurusan_list"] = $this->KeuanganDaftarDetail_model->jurusan_list();
		$this->load->view("adminstba/keuangan/keuangan_daftarJurusan", $data);
	}

	public function index_semester($id = null){
		$this->load->model("KeuanganDaftarDetail_model");
		$id_jurusan = $this->input->post('id_jurusan');
		$th_ajaran = $this->input->post('th_ajaran');
		$data["semester_list"] = $this->KeuanganDaftarDetail_model->semester_list($id_jurusan,$th_ajaran);
		$this->load->view("adminstba/keuangan/keuangan_daftarsemester", $data);
	}
	public function index_tahun($id = null){
		$this->load->model("KeuanganDaftarDetail_model");
		$data["tahun_list"] = $this->KeuanganDaftarDetail_model->tahun_list($id);
		$this->load->view("adminstba/keuangan/keuangan_daftarTahun", $data);
	}
	public function detail($id = null){
		$this->load->model("KeuanganDaftarDetail_model");
		$id_jurusan = $this->input->post('id_jurusan');
		$nama_semester = $this->input->post('nama_semester');
		$data["fetch_data"] = $this->KeuanganDaftarDetail_model->detail_list($id_jurusan, $nama_semester);
		echo "$id_jurusan $nama_semester";
		$this->load->view("adminstba/keuangan/Keuangan_daftarDetail", $data);
	}
	public function tambah(){
		$this->load->model("KeuanganDaftarDetail_model");
		$data["daftar_jurusan"] = $this->KeuanganDaftarDetail_model->daftar_jurusan();
		$data["daftar_semester"] = $this->KeuanganDaftarDetail_model->daftar_semester();
		$this->load->view("adminstba/keuangan/Keuangan_tambahDaftar", $data);
	}

	public function tambah_aksi(){
		$this->load->model("KeuanganDaftarDetail_model");
		$jurusan = $this->input->post('jurusan');
		$semester = $this->input->post('semester');
		$tipe_bayar = $this->input->post('tipe_bayar');
		$jumlah = $this->input->post('jumlah');
		$nama_pembayaran = $this->input->post('nama_pembayaran');
		$data = array(
			'jurusan' => $jurusan,
			'semester' => $semester,
			'jenis_pembayaran' => $tipe_bayar,
			'jumlah' => $jumlah,
			'nama_pembayaran' => $nama_pembayaran
			);
			
            
            $result = $this->KeuanganDaftarDetail_model->input_data($data,'tbl_jenispembayaran');   
                if( $result > 0)
                {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambahkan');
                }
                
                redirect('admin/keuangan/keuangan_daftarpembayaran');
	}
	public function edit_data($id = null){
		$this->load->model("KeuanganDaftarDetail_model");
		$data["edit"] = $this->KeuanganDaftarDetail_model->edit($id);
		$data["daftar_jurusan"] = $this->KeuanganDaftarDetail_model->daftar_jurusan();
		$data["daftar_semester"] = $this->KeuanganDaftarDetail_model->daftar_semester();

		$this->load->view("adminstba/keuangan/keuangan_editPembayaran", $data);
	}
	public function update(){
		$this->load->model("KeuanganDaftarDetail_model");
		$id = $this->input->post('id_pembayaran');
		$jurusan = $this->input->post('id_jurusan');
		$semester = $this->input->post('id_semester');
		$jenis_pembayaran = $this->input->post('tipe_bayar');
		$nama_pembayaran = $this->input->post('nama_pembayaran');

		$jumlah = $this->input->post('total');
	 
		$data = array(
			'jurusan' => $jurusan,
			'semester' => $semester,
			'nama_pembayaran' => $nama_pembayaran,
			'jenis_pembayaran'	=> $jenis_pembayaran,
			'jumlah'	=> $jumlah
		);
	 
		$where = array(
			'id_pembayaran' => $id
		);
		$result = $this->KeuanganDaftarDetail_model->update($where,$data,'tbl_jenispembayaran');
        redirect('admin/keuangan/Keuangan_daftarPembayaran');

	}
	public function cari_data(){
		$this->load->model("KeuanganDaftarDetail_model");
		$id = $this->input->post('cari');
		$data["fetch_data"] = $this->KeuanganDaftarDetail_model->cari_data($id);
		$this->load->view("adminstba/keuangan/Keuangan_daftarDetail", $data);
	}
	
}

