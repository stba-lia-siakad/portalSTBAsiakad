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
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <title>DataTables example - Print button</title>
  <link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
  <link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=8ffc0b31bc8d9ff82fbb94689dd1d7ff">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
  <style type="text/css" class="init">
  
  </style>
  <script type="text/javascript" src="/media/js/site.js?_=994321fabf3873df746bb8bbccd1886a"></script>
  <script type="text/javascript" src="/media/js/dynamic.php?comments-page=extensions%2Fbuttons%2Fexamples%2Fprint%2Fsimple.html" async></script>
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../../../examples/resources/demo.js"></script>
  <script type="text/javascript" class="init">
  


$(document).ready(function() {
  $('#example').DataTable( {
    dom: 'Bfrtip',
    buttons: [
      'print'
    ]
  } );
} );



  </script>
  
        <table id="example" class="display" style="width:100%">

                                    <thead>
                                      <tr>
                                        <th>Matakuliah</th>
                                        <th>Prodi</th>
                                        <th>Semester</th>
                                        <th>Kelas</th>
                                        <th>Dosen</th>
                                        <th>Ruang</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
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
                                <ul class="tabs"> </div>
      </div>
    </div>
  </div>
  
</body>
</html>