<div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title">Ubah Status Mahasiswa</h4>
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
                                <div class="counter text-left pl-10">
                                    <div class="counter-label"><i class="fa fa-users" aria-hidden="true"></i> Mahasiswa</div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-md-12">
                                <br>
                                <form action="<?php echo $action; ?>" method="post">
                                    <div class="form-group">
                                        <label for="varchar">NIM
                                            <?php echo form_error('nim') ?></label>
                                        <input type="text" <?php if($nim){echo 'readonly';} ?> class="form-control" name="nim" id="nim" placeholder="NIM" value="<?php echo $nim; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">NIM
                                            <?php echo form_error('nama') ?></label>
                                        <input type="text" <?php if($nama){echo 'readonly';} ?> class="form-control" name="nama" id="nim" placeholder="NAMA" value="<?php echo $nama; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="int">Status Aktif
                                            <?php echo form_error('id_ket_mhs') ?></label>
                                        <select name="id_ket_mhs" class="form-control">
                                            <option>- Status -</option>
                                            <?php
                                            $text='';
                                            foreach($ket_mhs as $data){
                                                if($id_ket_mhs==$data->id_ket_mhs){
                                                    $text='selected';
                                                }
                                            ?>
                                            <option <?= $text ?> value="<?= $data->id_ket_mhs ?>"><?= $data->nama_ket_mhs ?></option>
                                            <?php
                                            $text='';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo $button ?></button>
                                    <a href="<?php echo site_url('mahasiswa') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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
</br>
