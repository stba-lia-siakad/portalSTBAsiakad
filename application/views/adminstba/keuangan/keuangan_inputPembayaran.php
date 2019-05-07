<?php 
  $nim=$_POST['nim'];
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
                                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/keuangan/Keuangan_rekap/cek_bayar') ?>" method="Post">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h5> NIM </h5></label>

                                        <div class="col-sm-5">
                                            <input type="text" id="form-field-1" placeholder="NIM" class="form-control" readonly="" name="nim" value="<?php echo($nim) ?>" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"><h5> Jenis Pembayaran </h5></label>

                                        <div class="col-sm-5">
                                            <select class="form-control" name="id_pembayaran" required="">
                                                
                                                <?php
                                                      if($input_list->num_rows() > 0)
                                                      {
                                                          foreach ($input_list->result() as $row) {
                                                      ?>
                                                        <option value="<?php echo($row->id_pembayaran)?>"><?php  echo 
                                                              " $row->nama_jurusan - $row->nama_jenjang -  $row->nama_pembayaran  - $row->th_ajaran  -   Semester $row->nama_semester" ?></option>
                                                      <?php }
                                                      } 
                                              ?>

                                            </select>
                                            
                                        </div>
                                    </div>
                                    
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