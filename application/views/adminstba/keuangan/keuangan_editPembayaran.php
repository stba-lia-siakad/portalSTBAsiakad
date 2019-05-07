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
                              
                                <a href="<?php echo site_url('admin/keuangan/Keuangan_daftarPembayaran/') ?>"><button class="btn btn-fill"></i> Kembali</button></a>
                                 
                            </div>
                            <div class="col-md-offset-3 col-md-9">
  
                            <div class="header" style="padding-bottom: 20px">
                                <h4 class="title">EDIT DAFTAR PEMBAYARAN</h4>
                            </div>
                        </div>
                            <div class="content">
                                   <form class="form-horizontal" role="form" action="<?php echo site_url('admin/keuangan/Keuangan_daftarPembayaran/update') ?>" method="Post">
                                      <?php
                                                      if($edit->num_rows() > 0)
                                                      {
                                                          foreach ($edit->result() as $row) {
                                                      ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> id_pembayran </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="id_pembayaran" value="<?php echo($row->id_pembayaran ) ?>" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"><h5> Jurusan </h5></label>

                                        <div class="col-sm-5">
                                            <select class="form-control" name="id_jurusan" required="">
                                                 
                                                 <option value="<?php echo($row->id_jurusan)?>"><?php  echo 
                                                              " $row->nama_jurusan - $row->nama_jenjang " ?></option>
                                      <?php
                                                            };
                                                          };
                                                          ?>
                                                <?php
                                                      if($daftar_jurusan->num_rows() > 0)
                                                      {
                                                          foreach ($daftar_jurusan->result() as $row) {
                                                      ?>
                                                        <option value="<?php echo($row->id_jurusan)?>"><?php  echo 
                                                              " $row->nama_jurusan - $row->nama_jenjang " ?></option>
                                                      <?php }
                                                      } 
                                              ?>

                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"><h5> Semester </h5></label>

                                        <div class="col-sm-5">
                                            <select class="form-control" name="id_semester" required="">
                                                <?php
                                                      if($edit->num_rows() > 0)
                                                      {
                                                          foreach ($edit->result() as $row) {
                                                      ?>
                                                <option value="<?php echo($row->id_semester)?>"><?php  echo 
                                                              " $row->nama_semester - $row->th_ajaran" ?></option>
                                                <?php };};?>
                                                <?php
                                                      if($daftar_semester->num_rows() > 0)
                                                      {
                                                          foreach ($daftar_semester->result() as $row) {
                                                      ?>
                                                        <option value="<?php echo($row->id_semester)?>"><?php  echo 
                                                              " $row->nama_semester - $row->th_ajaran" ?></option>
                                                      <?php }
                                                      } 
                                              ?>

                                            </select>
                                            
                                        </div>
                                    </div>
                                    <?php
                                                      if($edit->num_rows() > 0)
                                                      {
                                                          foreach ($edit->result() as $row) {
                                                      ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Jenis Pembayaran </h5></label>

                                        <div class="col-sm-5">
                                            <select class="form-control" name="tipe_bayar" required="">
                                              <option value="<?php echo($row->jenis_pembayaran ) ?>"><?php echo($row->jenis_pembayaran ) ?></option>
                                              <option value="SPP Variabel">SPP Variabel</option>
                                              <option value="SPP Tetap">SPP Tetap</option>
                                              <option value="SPA">SPA</option>
                                              <option value="Kemahasiswaan">Kemahasiswaan</option>
                                              <option value="Wisuda">Wisuda</option>
                                              <option value="Praktikum">Praktikum</option>
                                              <option value="Kesehatan">Kesehatan</option>
                                              <option value="Lain-lain">Lain-lain</option>
                                            </select>
                                        </div>
                                            
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Nama Pembayaran </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" name="nama_pembayaran" value="<?php echo($row->nama_pembayaran ) ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Jumlah </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" name="total" value="<?php echo($row->jumlah ) ?>" />
                                        </div>
                                    </div>
                                  <?php }}?>
                                    <div class="clearfix">
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


        
</div></div>

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
