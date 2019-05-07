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
                              
                                <a href="<?php echo site_url('admin/keuangan/Keuangan_rekap/') ?>"><button class="btn btn-fill"></i> Kembali</button></a>
                                 
                            </div>
                            <div class="col-md-offset-3 col-md-9">
  
                            <div class="header" style="padding-bottom: 20px">
                                <h4 class="title">EDIT DATA PEMBAYARAN</h4>
                            </div>
                        </div>
                            <div class="content">
                                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/keuangan/Keuangan_rekap/update') ?>" method="Post">
                                         <?php
                                                      if($edit_data->num_rows() > 0)
                                                      {
                                                          foreach ($edit_data->result() as $row) {
                                                      ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Id Rekap </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="id_rekap" value="<?php echo($row->id_rekap) ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> NIM </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="nim" value="<?php echo($row->nim) ?>" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Jenis Pembayaran </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="jenis_bayar" value="<?php echo($row->jenis_pembayaran) ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Tahun Ajaran </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="th_ajaran" value="<?php echo($row->th_ajaran) ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Semester </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="" class="form-control" readonly="" name="semester" value="<?php echo($row->nama_semester) ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Total Biaya </h5></label>
                                        <?php if($row->jenis_pembayaran =='SPP Variabel'){
                                                          $total = ($row->jumlah*$row->sks);
                                                          
                                                        }else{
                                                          $total = $row->jumlah;
                                                          ;}
                                                        ?>
                                        <div class="col-sm-5">
                                            <input type="number" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="total" value="<?php echo($total) ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Status </h5></label>

                                        <div class="col-sm-5">
                                             <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="status" value="<?php 
                                                        if($row->status_bayar == 0)
                                                          echo "Belum Bayar";
                                                          else if($row->status_bayar == 1)
                                                          echo "Belum Lunas";
                                                          else
                                                            echo "Lunas";
                                             ?>" />
                                            
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Kekurangan </h5></label>
                                        <?php
                                                        if($row->jenis_pembayaran == 'SPP Variabel')
                                                          $kurang = abs(($row->jumlah*$row->sks)-$row->jumlah_dibayarkan);
                                                        else
                                                          $kurang = abs(($row->jumlah)-$row->jumlah_dibayarkan);
                                                      ?>
                                                      
                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="kurang" value="<?php echo($kurang) ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Jumlah Dibayarkan </h5></label>

                                        <div class="col-sm-5">
                                            <input type="number" id="form-field-1" placeholder="Jumlah Dibayarkan" class="form-control"  name="jumlah_dibayarkan" required="" max="<?php echo $total ?>" value="<?php echo($row->jumlah_dibayarkan) ?>" 

                                            <?php 
                                                if($row->status_bayar == 2)
                                                    echo "readonly";
                                                else
                                            ?> 
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> Catatan </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control"  name="catatan" value="<?php echo($row->catatan) ?>" />
                                        </div>
                                    </div>
                                <?php };
                            };
                                                      ?>
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