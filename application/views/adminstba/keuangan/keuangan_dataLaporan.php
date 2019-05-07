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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h3 class="title">Data Pembayaran Mahasiswa</h3>
                                <p class="category">STBA LIA</p>
                                 
                            </div>
                            <div class="header">
                               
                            </div>

                           <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <th>Nomor</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Izin KRS</th>
                                        <th>SPA</th>
                                        <th>SPP Tetap</th>
                                        <th>SPP Variabel</th>
                                        <th>Wisuda</th>
                                        <th>Kemahasiswaan</th>
                                        <th>Praktikum</th>
                                    </thead>
                                    <tbody>
                                      <?php
                                              $no=1;
                                              if($data_laporan->num_rows() > 0)
                                              {
                                                  foreach ($data_laporan->result() as $row) {
                                              ?>
                                                  <tr>
                                                      <td><?php echo $no;?></td>
                                                      <td><?php echo $row->nim;?></td>
                                                      <td><?php echo $row->nama_mhs;?></td>
                                                      <td><?php ?>
                                                          <form action="<?php echo site_url('admin/keuangan/Keuangan_rekap/izin_krs')?>" method="POST">
                                                          <input type="text" name="id" value="<?php echo( $row->id )?>" hidden="" >  
                                                          <input type="text" name="izin" value="<?php echo( $row->izin_krs )?>" hidden="">
                                                          <?php 
                                                          if($row->izin_krs == 0){?>
                                                           <input type="submit" class="btn btn-fill btn-warning" value="X"> 
                                                          <?php }
                                                          else if ($row->izin_krs == 1){?>
                                                          <input type="submit" class="btn btn-fill btn-success" value="ACC"> 
                                                          <?php }?>
                                                          </form>
                                                        
                                                      </td>
                                                      <td>
                                                        <?php
                                                          $row->spa;
                                                          if($row->spa == 0)
                                                          echo "Belum Bayar";
                                                          else if($row->spa == 1)
                                                          echo "Belum Lunas";
                                                          else 
                                                          echo "Lunas";
                                                        ?>
                                                      </td>
                                                      <td>
                                                        <?php
                                                          $row->spp_tetap;
                                                          if($row->spp_tetap == 0)
                                                          echo "Belum Bayar";
                                                          else if($row->spp_tetap == 1)
                                                          echo "Belum Lunas";
                                                          else 
                                                          echo "Lunas";
                                                       ?>
                                                      </td>
                                                      <td>
                                                        <?php
                                                          $row->spp_variabel;
                                                          if($row->spp_variabel == 0)
                                                          echo "Belum Bayar";
                                                          else if($row->spp_variabel == 1)
                                                          echo "Belum Lunas";
                                                          else 
                                                          echo "Lunas";
                                                       ?>
                                                      </td>
                                                      <td>
                                                        <?php
                                                          $row->wisuda;
                                                          if($row->wisuda == 0)
                                                          echo "Belum Bayar";
                                                          else if($row->wisuda == 1)
                                                          echo "Belum Lunas";
                                                          else 
                                                          echo "Lunas";
                                                       ?>
                                                      </td>
                                                      <td>
                                                        <?php
                                                          $row->kemahasiswaan;
                                                          if($row->kemahasiswaan == 0)
                                                          echo "Belum Bayar";
                                                          else if($row->kemahasiswaan == 1)
                                                          echo "Belum Lunas";
                                                          else 
                                                          echo "Lunas";
                                                       ?>
                                                      </td>
                                                      <td>
                                                        <?php
                                                          $row->praktikum;
                                                          if($row->praktikum == 0)
                                                          echo "Belum Bayar";
                                                          else if($row->praktikum == 1)
                                                          echo "Belum Lunas";
                                                          else 
                                                          echo "Lunas";
                                                       ?>
                                                      </td>
                                                      
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

            

