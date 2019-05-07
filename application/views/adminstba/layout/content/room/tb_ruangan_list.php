<div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title">Data Ruangan</h4>
                 <p class="category">STBA LIA Yogyakarta</p>
             <hr/>
         </br>
    </div>
<div class="page" >
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xxl-12">
                <div id="teamCompletedWidget" class="card card-shadow example-responsive">
                    <div class="card-block p-20 pb-25">
                        <div class="row pb-40" data-plugin="matchHeight">
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-md-12">
                                <br>
                                <div class="row" style="margin-bottom: 10px">
                                    <div class="col-md-4">
                                        <?php echo anchor(site_url('admin/baak/room/create'),'<i class="fa fa-plus"></i> Tambah', 'class="btn btn-primary"'); ?>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <?php if ($this->session->flashdata('message')): ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                    </div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="col-md-1 text-right">
                                    </div>
                                    <div class="col-md-3 text-right">
                                       
                                    </div>
                                </div>
                                <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead  style="background-color: #4091e2;">
                                    <tr>
                                        <th style="color: white;">No</th>
                                        <th style="color: white;">Ruangan</th>
                                        <th style="color: white;">Jenis</th>
                                        <th style="color: white;">Kapasitas</th>
                                        <th style="color: white;">Aksi</th>
                                    </tr>
                                </thead>
                                    <?php
                                    foreach ($room_data as $room)
                                    {
                                    ?>
                                    <tr>
                                        <td width="80px">
                                            <?php echo ++$start ?>
                                        </td>
                                        <td>
                                            <?php echo $room->nama_ruangan ?>
                                        </td>
                                        <td>
                                            <?php echo $room->tipe_ruangan ?>
                                        </td>
                                        <td>
                                            <?php echo $room->kapasitas ?>
                                        </td>
                                        <td style="text-align:center" width="200px">
                                            
                                            <a class="btn btn-warning" href="<?= site_url('admin/baak/room/update/'.$room->id)?>"><i class="fa fa-pen"></i></a>
                                            <a class="btn btn-danger"  onclick="javasciprt: return confirm('Anda yakin akan menghapus data ruangan? ')"  href="<?= site_url('admin/baak/room/delete/'.$room->id)?>"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-primary">Total Record :
                                            <?php echo $total_rows ?></a>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <?php echo $pagination ?>
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
        </div>
    </div>
</div>
