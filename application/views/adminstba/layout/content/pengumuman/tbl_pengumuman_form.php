<div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title"><?php echo $title?></h4>
                 <p class="category">STBA LIA Yogyakarta</p>
             <hr/>
         </br>
    </div>
    <div class="page" >
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xxl-12">
                <div id="teamCompletedWidget">
                    <div class="card-block p-20 pb-25">
                        <div class="row pb-40" data-plugin="matchHeight">
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-md-12">
                                <br>
                                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="varchar">NIDN
                                            <?php echo form_error('nidn') ?></label>
                                        <input <?php if($nidn){echo 'readonly';} ?> type="number" class="form-control" name="nidn" id="nidn" placeholder="Nidn" value="<?php echo $nidn; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">NIK
                                            <?php echo form_error('nik') ?></label>
                                        <input type="number" class="form-control" name="nik" id="tempat_lahir" placeholder="NIK" value="<?php echo $nik; ?>" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="varchar">Nama
                                            <?php echo form_error('nama') ?></label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="enum">Jenis Kelamin
                                            <?php echo form_error('gender') ?></label>
                                        <select class="form-control" name="gender">
                                            <option value="L" <?php if($gender=='L'){ echo 'selected';} ?>>Laki - laki</option>
                                            <option value="P" <?php if($gender=='P'){ echo 'selected';} ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Institusi Asal
                                            <?php echo form_error('institusi_a') ?></label>
                                        <input type="text" class="form-control" name="institusi_a" id="institusi_a" placeholder="Institusi Asal" value="<?php echo $institusi_a; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Nomor WA
                                            <?php echo form_error('nowa') ?></label>
                                        <input type="number" class="form-control" name="nowa" id="int" placeholder="Nomor WA" value="<?php echo $nowa; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Riwayat Pendidikan
                                            <?php echo form_error('jenis_beasiswa') ?></label>
                                        <input type="text" class="form-control" name="riwayat_p" id="riwayat_p" placeholder="Riwayat Pendidikan" value="<?php echo $riwayat_p; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat
                                            <?php echo form_error('alamat') ?></label>
                                        <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Tempat Lahir
                                            <?php echo form_error('tempat_lahir') ?></label>
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Tanggal Lahir
                                            <?php echo form_error('tgl_lahir') ?></label>
                                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $tgl_lahir; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="enum">Agama
                                            <?php echo form_error('agama') ?></label>
                                        <select class="form-control" name="agama">
                                            <option value="Islam" <?php if($agama=='Islam'){ echo 'selected';} ?>>Islam</option>
                                            <option value="Kristen" <?php if($agama=='Kristen'){ echo 'selected';} ?>>Kristen</option>
                                            <option value="Katolik" <?php if($agama=='Katolik'){ echo 'selected';} ?>>Katolik</option>
                                            <option value="Budha" <?php if($agama=='Budha'){ echo 'selected';} ?>>Budha</option>
                                            <option value="Hindu" <?php if($agama=='Hindu'){ echo 'selected';} ?>>Hindu</option>
                                            <option value="Kong Hu Chu" <?php if($agama=='Kong Hu Chu'){ echo 'selected';} ?>>Kong Hu Chu</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="int">Jabatan
                                            <?php echo form_error('id_jabatan') ?></label>
                                        <select class="form-control" name="id_jabatan">
                                            <?php
                                            foreach($jabatan as $data){
                                                $text='';
                                                if($data->id_jabatan==$id_jabatan){
                                                    $text='selected';
                                                }
                                            ?>
                                            <option <?= $text ?> value="<?= $data->id_jabatan ?>"><?= $data->nama_jabatan ?></option>
                                            <?php
                                                
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Foto
                                            <?php echo form_error('img_file') ?></label>
                                        <input type="file" class="btn btn-default btn-primary" name="img_file" id="img_file" accept="image/jpeg"/>
                                    </div>
                                    <input type="hidden" name="id_status" value="1"/>
                                    <input type="hidden" name="id_dosen" value="<?php echo $id_dosen; ?>" />
                                    <br>
                                    <p class="pull-right">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo $button ?></button>
                                    <a href="<?php echo site_url('admin/baak/dosen') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                    </p>
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
