<div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title">Data Jam</h4>
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
                                        <?php echo anchor(site_url('admin/baak/jam/create'),'<i class="fa fa-plus"></i> Tambah', 'class="btn btn-primary"'); ?>
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
                                        <th style="color: white;">Jam Mulai</th>
                                        <th style="color: white;">Jam Akhir</th>
                                        <th style="color: white;">Aksi</th>
                                    </tr>
                                </thead>
                                    <?php
                                    foreach ($jam_data as $jam)
                                    {
                                    ?>
                                    <tr>
                                        <td width="80px">
                                            <?php echo ++$start ?>
                                        </td>
                                        <td>
                                            <?php echo $jam->jam_mulai ?>
                                        </td>
                                        <td>
                                            <?php echo $jam->jam_akhir ?>
                                        </td>
                                        
                                        <td style="text-align:center" width="200px">
                                            
                                            <a class="btn btn-warning" href="<?= site_url('admin/baak/jam/update/'.$jam->id_jam)?>"><i class="fa fa-pen"></i></a>
                                            <a class="btn btn-danger"  onclick="javasciprt: return confirm('Anda yakin akan menghapus data Jam? ')"  href="<?= site_url('admin/baak/jam/delete/'.$jam->id_jam)?>"><i class="fa fa-trash"></i></a>
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
