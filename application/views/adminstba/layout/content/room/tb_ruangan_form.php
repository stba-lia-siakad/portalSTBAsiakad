<div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title">Ruangan</h4>
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
                                        <label for="varchar">Nama Ruangan
                                            <?php echo form_error('nama_ruangan') ?></label>
                                        <input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan" placeholder="Nama Ruangan" value="<?php echo $nama_ruangan; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Kapasitas
                                            <?php echo form_error('kapasitas') ?></label>
                                        <input type="number" class="form-control" name="kapasitas" id="kapasitas" placeholder="Kapasitas" value="<?php echo $kapasitas; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="enum">Tipe Ruangan
                                            <?php echo form_error('tipe_ruangan') ?></label>
                                        <select name="tipe_ruangan" class="form-control">
                                            <option>- Tipe -</option>
                                            <option <?php if($tipe_ruangan=='Laboratorium'){echo 'selected';} ?> value="Laboratorium">Laboratorium</option>
                                            <option <?php if($tipe_ruangan=='Kelas'){echo 'selected';} ?> value="Kelas">Kelas</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo $button ?></button>
                                    <a href="<?php echo site_url('admin/baak/room') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                    <br/>
                                    <br/>
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
<br/>
<br/>
