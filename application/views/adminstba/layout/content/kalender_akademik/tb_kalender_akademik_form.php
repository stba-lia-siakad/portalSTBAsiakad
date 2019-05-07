<div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title">Kalender Akademik</h4>
                 <p class="category">STBA LIA Yogyakarta</p>
             <hr/>
         </br>
    </div>
    <div class="page" ">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xxl-12">
                <div id="teamCompletedWidget" class="card card-shadow example-responsive">
                    <div class="card-block p-20 pb-25">
                        <div class="row pb-40" data-plugin="matchHeight">
                            <div class="col-md-6">
                                <div class="counter text-left pl-10">
                                    <div class="counter-label"><i class="fa fa-building" aria-hidden="true"></i> Ruangan</div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-md-12">
                                <br>
                                <form action="<?php echo $action; ?>" method="post">
                                    <div class="form-group">
                                        <label for="varchar">Nama Kegiatan
                                            <?php echo form_error('nama_kegiatan') ?></label>
                                        <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" placeholder="Nama Kegiatan" value="<?php echo $nama_kegiatan; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Tanggal Mulai
                                            <?php echo form_error('tanggal_kegiatan_m') ?></label>
                                        <input type="date" class="form-control" name="tanggal_kegiatan_m" id="tanggal_kegiatan_m" placeholder="Tanggal mulai" value="<?php echo $tanggal_kegiatan_m; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Tanggal Selesai
                                            <?php echo form_error('tanggal_kegiatan_s') ?></label>
                                        <input type="date" class="form-control" name="tanggal_kegiatan_s" id="tanggal_kegiatan_s" placeholder="Tanggal Selesai" value="<?php echo $tanggal_kegiatan_s; ?>" />
                                    </div>
                                    
                                    <input type="hidden" name="id" value="<?php echo $id_kegiatan; ?>" />
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo $button ?></button>
                                    <a href="<?php echo site_url('admin/baak/room') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </form>
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
<br/>
<br/>
<br/>
<br/>
<br/>

