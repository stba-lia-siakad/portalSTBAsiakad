<div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title">Tambah Data Beasiswa</h4>
                 <p class="category">STBA LIA Yogyakarta</p>
             <hr/>
         </br>
    </div>
    <div class="page" ">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xxl-12">
                    <div class="card-block p-20 pb-25">
                        <div class="row pb-40" data-plugin="matchHeight">
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-md-12">
                                <br>
                                <form action="<?php echo $action; ?>" method="post">
                                    <div class="form-group">
                                        <label for="varchar">Nama Beasiswa
                                            <?php echo form_error('nama_beasiswa') ?></label>
                                        <input type="text" class="form-control" name="nama_beasiswa" id="nama_beasiswa" placeholder="Nama Beasiswa" value="<?php echo $nama_beasiswa; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Keterangan
                                            <?php echo form_error('keterangan') ?></label>
                                        <textarea class="form-control" rows="3" name="keterangan" id="alamat" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
                                    </div>


                                    
                                    <input type="hidden" name="id" value="<?php echo $id_beasiswa; ?>" />
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo $button ?></button>
                                    <a href="<?php echo site_url('admin/baak/beasiswa') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </form>
                                <br/>

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

