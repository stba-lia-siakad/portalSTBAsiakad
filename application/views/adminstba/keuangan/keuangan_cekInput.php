<?php
    $nim = $_POST['nim'];
    $id_pembayaran = $_POST['id_pembayaran'];
    $tanggal = date("Y-m-d");

?>
<!doctype html>
<html lang="en">
<head>
   <?php $this->load->view("adminstba/layout/header/head") ?> 
</head>
<body>

<div class="wrapper">
    
<?php $this->load->view("adminstba/layout/sidelogo/sidelogo") ?>

        
        <div class="sidebar-wrapper">
            <div class="logo">
                <?php if($this->session->userdata('level')==='1'):?>
                  <?php $this->load->view("adminstba/layout/mainlogo/mainlogo") ?>
                <!--ACCESS MENUS FOR STAFF-->
                <?php elseif($this->session->userdata('level')==='2'):?>
                  <?php $this->load->view("adminstba/layout/mainlogo/mainlogoBAK") ?>
                <!--ACCESS MENUS FOR AUTHOR-->
                <?php elseif($this->session->userdata('level')==='4'):?>
                  <?php $this->load->view("adminstba/layout/mainlogo/mainlogoKeuangan") ?>
                <?php else:?>
                  <?php $this->load->view("adminstba/layout/mainlogo/mainlogoBAK") ?>
                <?php endif;?>        
            </div>
         
                <?php if($this->session->userdata('level')==='1'):?>
                  <?php $this->load->view("adminstba/layout/menu/menukajur") ?>
                <!--ACCESS MENUS FOR STAFF-->
                <?php elseif($this->session->userdata('level')==='2'):?>
                  <?php $this->load->view("adminstba/layout/menu/menubaak") ?>
                  
                <?php elseif($this->session->userdata('level')==='4'):?>
                  <?php $this->load->view("adminstba/layout/menu/menuKeuangan") ?>
                <!--ACCESS MENUS FOR AUTHOR-->
                <?php else:?>
                  <?php $this->load->view("adminstba/layout/menu/menubaak") ?>
                <?php endif;?>  
        </div>
    
   <div class="main-panel">
        
        <?php $this->load->view("adminstba/layout/mainpanel/mainpanel") ?>

               <div class="content">
            <div class="container-fluid">
                
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                              
                                <a href="<?php echo site_url('admin/keuangan/Keuangan_rekap/input_pembayaran') ?>"><button class="btn btn-fill"></i> Kembali</button></a>
                                 
                            </div>
                            <div class="col-md-offset-3 col-md-9">
                            <div class="header" style="padding-bottom: 20px">
                                <h4 class="title">INPUT DATA PEMBAYARAN</h4>
                            </div>
                        </div>
                            <div class="content">
                                <form class="form-horizontal" role="form" action="<?php echo site_url('admin/keuangan/Keuangan_rekap/tambah_aksi') ?>" method="Post">
                                    <div class="form-group hidden">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> id_pembayaran </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="id_pembayaran" value=" <?php echo ($id_pembayaran);?> "/>
                                        </div>
                                    </div>
                                    <?php
                                                      if($mahasiswa->num_rows() > 0)
                                                      {
                                                          foreach ($mahasiswa->result() as $row) {
                                                      ?>
                                                        
                                                      
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> NIM </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="nim" value=" <?php echo ($row->nim);?> "/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Nama </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="nama" value="<?php echo $row->nama_mhs;?>" />
                                        </div>
                                    </div>
                                     <?php }
                                                      } 
                                                      
                                             
                                                      if($cek_tambah->num_rows() > 0)
                                                      {
                                                          foreach ($cek_tambah->result() as $row) {
                                                      ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Jurusan </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="jurusan" value="<?php echo $row->nama_jurusan;?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Jenjang </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="jenjang" value="<?php echo $row->nama_jenjang;?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Semester </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control"  readonly="" name="semester" value="<?php echo $row->nama_semester;?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Tahun Ajaran </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="th_ajaran" value="<?php echo $row->th_ajaran;?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Jenis Pembayaran </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="tipe_bayar" value="<?php echo $row->nama_pembayaran;?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Tanggal Pembayaran </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="tgl_bayar" value="<?php echo ($tanggal) ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Biaya <?php if ($row->jenis_pembayaran == 'SPP Variabel') {
                                            echo "Per SKS";
                                        } ?> </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="total" value="<?php echo $row->jumlah;?>" />
                                        </div>
                                    </div>
                                    <?php
                                        if ($row->jenis_pembayaran == 'SPP Variabel') {?>
                                            <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Jumlah SKS </h5></label>

                                        <div class="col-sm-5">
                                            <input type="number" id="form-field-1" placeholder="Jumlah SKS" class="form-control" name="sks" value="" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Jumlah dibayarkan </h5></label>

                                        <div class="col-sm-5">
                                            <input type="number" id="form-field-1" placeholder="Jumlah dibayarkan" class="form-control" name="jumlah" value="" required="" />
                                        </div>
                                    </div>
                                    <?php
                                        }else{
                                    ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Jumlah dibayarkan </h5></label>

                                        <div class="col-sm-5">
                                            <input type="number" id="form-field-1" placeholder="Jumlah dibayarkan" class="form-control" name="jumlah" value="" required="" max="<?php echo $row->jumlah ?>"/>
                                        </div>
                                    </div>
                                <?php };?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Catatan </h5></label>

                                        <div class="col-sm-5">
                                            <textarea type="textarea" id="form-field-1" placeholder="Catatan" class="form-control" name="note" value="" /></textarea>
                                        </div>
                                    </div>
                                    <?php }
                                                      } 
                                                      
                                              ?>
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn btn-info btn-fill" type="submit">
                                                Submit
                                            </button>

                                            
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <footer class="footer">
            <?php $this->load->view("adminstba/layout/footer/footer") ?>
        </footer>

    </div>
</div>


</body>

    <?php $this->load->view("adminstba/layout/footer/js") ?>

</html>
    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                
                icon: 'pe-7s-gift',
                message: "Selamat datang di Admin Panel"

            },{
                type: 'info',
                timer: 2
            });

        });
    </script>
