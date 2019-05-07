<!doctype html>
<html lang="en">
<head>
  <style type="text/css">
    .table table-hover{width: 200%}
/* This is to remove the arrow of select element in IE */
select::-ms-expand {  display: none; }
select{
    -webkit-appearance: none;
-moz-appearance: none;
appearance: none;
border: none; /* If you want to remove the border as well */
background: #4091e2;
}
@-moz-document url-prefix(){
  .ui-select{border: 1px solid #000; border-radius: 4px; box-sizing: border-box; position: relative; overflow: hidden;}
  .ui-select select { width: 110%; background-position: right 30px center !important; border: none !important;}
}

  </style>
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
                        <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <div class="card">
                            <div class="header">
                                <h4 class="title">Jadwal Matakuliah</h4>
                                <p class="category">STBA LIA Yogyakarta</p>
                                 <hr/>
                            </div>
                            <div class="header">
                                
                                <table class="col-md-12">
                                    <tr>

                                        
                                        
                                    </tr>
                                </table>   
                                
                            </div>

                        <div class="table-responsive">
                            <table id="table_format" class="table table-hover" width="100%" cellspacing="0">

                                    <thead style="background-color: #4091e2;">
                                      <tr>
                                        <th style="color: #fff;"><b>MATAKULIAH</b></th>
                                        <th style="color: #fff;"><b>PRODI</b></th>
                                        <th style="color: #fff;"><b>SEMESTER</b></th>
                                        <th style="color: #fff;"><b>KELAS</b></th>
                                        <th style="color: #fff;"><b>DOSEN</b></th>
                                        <th style="color: #fff;"><b>RUANG</b></th>
                                        <th style="color: #fff;"><b>HARI</b></th>
                                        <th style="color: #fff;"><b>JAM</b></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                              $no=1;
                                              if($fetch_data->num_rows() > 0)
                                              {
                                                  foreach ($fetch_data->result() as $row) {
                                              ?>
                                                  <tr>
                                                      <td><?php echo $row->nama_mk;?></td>
                                                      <td><?php echo $row->nama_jurusan;?></td>
                                                      <td><?php echo $row->semester_prodi;?></td>
                                                      <td><?php echo $row->nama_kelas;?></td>
                                                      <td><?php echo $row->nama;?></td>
                                                      <td><?php echo $row->nama_ruangan;?></td>
                                                      <td><?php echo $row->hari;?></td>
                                                      <td><?php echo $row->jam_mulai.' - '.$row->jam_akhir;?></td>
                                                      
                                                      
                                                  </tr>
                                              <?php $no++;
                                                  }
                                              }
                                              else
                                              {
                                      ?>
                                                  <tr>
                                                      <td colspan="3">No data Found</td>
                                                  </tr>
                                      <?php
                                              }
                                      ?>
<!--                                         <?php $n=1; foreach ($as as $rekap): ?>
 -->                                        <tr>
                                            <<!-- td><?php echo $n; ?></td>
                                            <td><?php echo $rekap->nim ?></td>
                                            <td><?php echo $rekap->nama ?></td>
                                            <td><?php echo $rekap->prodi ?></td>
                                            <td><?php echo $rekap->jenjang ?></td>
                                            <td><?php echo $rekap->jenisP ?></td>
                                            <td><?php echo $rekap->tanggalBayar ?></td>
                                            <td><?php echo $rekap->jumlah ?></td> -->
                                            
                                        </tr>
<!--                                         <?php $n++; endforeach; ?>
 -->                                    </tbody>

                                </table>
                                  <p class="pull-right">
                                <a href="javascript:window.print()"><button style="background-color: #4091e2;" class="btn btn-fill "><i class="pe-7s-print"></i></button></a>
                                  </p>
                               
                                <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
              
                                <script src="<?php echo base_url('assets/js/ddtf.js') ?>"></script>
                                <script>
                                jQuery('#table_format').ddTableFilter();
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

            

