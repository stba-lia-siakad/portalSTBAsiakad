<div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title"><?php echo $title?></h4>
                 <p class="category">STBA LIA Yogyakarta</p>
             <hr/>
         </br>
    </div>
    <div class="page">
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
                                <form name="myform" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="varchar">NIM
                                            <?php echo form_error('nim') ?></label>
                                        <input type="number" <?php if($nim){echo 'readonly';} ?> class="form-control" name="nim" id="nim" placeholder="NIM" value="<?php echo $nim; ?>" required autofocus/>
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">NIK
                                            <?php echo form_error('nik')?></label>
                                            <input type="number" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?php echo $nik; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Nama
                                            <?php echo form_error('nama_mhs') ?></label>
                                        <input type="text" class="form-control" name="nama_mhs" id="nama_mhs" placeholder="Nama" value="<?php echo $nama_mhs; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Tempat Lahir
                                            <?php echo form_error('tempat_lahir_mhs') ?></label>
                                        <input type="text" class="form-control" name="tempat_lahir_mhs" id="tempat_lahir_mhs" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir_mhs; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Tanggal Lahir
                                            <?php echo form_error('tgl_lahir_mhs') ?></label>
                                        <input type="date" class="form-control" name="tgl_lahir_mhs" id="tgl_lahir_mhs" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir_mhs; ?>" />
                                    </div>
                                 
                                    <div class="form-group">
                                        <label for="enum">Jenis Kelamin
                                            <?php echo form_error('gender_mhs') ?></label>
                                        <select class="form-control" name="gender_mhs">
                                            <option selected value="L" <?php if($gender_mhs=='L'){ echo 'selected';} ?>>Laki - laki</option>
                                            <option value="P" <?php if($gender_mhs=='P'){ echo 'selected';} ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Asal SMA/MA/MK/SMK
                                            <?php echo form_error('asal_sma') ?></label>
                                        <input type="text" class="form-control" name="asal_sma" id="asal_sma" placeholder="Asal SMA/MA/MK/SMK" value="<?php echo $asal_sma; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="enum">Agama
                                            <?php echo form_error('agama_mhs') ?></label>
                                        <select class="form-control" name="agama_mhs">
                                            <option selected value="Islam" <?php if($agama_mhs=='Islam'){ echo 'selected';} ?>>Islam</option>
                                            <option value="Kristen" <?php if($agama_mhs=='Kristen'){ echo 'selected';} ?>>Kristen</option>
                                            <option value="Katolik" <?php if($agama_mhs=='Katolik'){ echo 'selected';} ?>>Katolik</option>
                                            <option value="Budha" <?php if($agama_mhs=='Budha'){ echo 'selected';} ?>>Budha</option>
                                            <option value="Hindu" <?php if($agama_mhs=='Hindu'){ echo 'selected';} ?>>Hindu</option>
                                            <option value="Kong Hu Chu" <?php if($agama_mhs=='Kong Hu Chu'){ echo 'selected';} ?>>Kong Hu Chu</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="int">Status Masuk
                                            <?php echo form_error('id_st_msk') ?></label>
                                        
                                        <select class="form-control" name="id_st_msk" id="id_st_msk" onchange="enabledisabletext()">
                                            <option selected value="1" <?php if($id_st_msk=='1'){ echo 'selected';} ?>>Baru</option>
                                            <option value="2" <?php if($id_st_msk=='2'){ echo 'selected';} ?>>Pindahan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="enum">Asal Universitas
                                            <?php echo form_error('asal_universitas') ?></label>
                                    <input class="form-control" disabled="" type="text" name="asal_universitas" id="asal_universitas" value="<?php echo $asal_universitas; ?>" /></div>
                                    
                                    
                                    <script language="javascript">
                                    function enabledisabletext()
                                    {
                                        if(document.myform.id_st_msk.value=='1')
                                        {
                                        document.myform.asal_universitas.disabled=true;
                                        document.myform.asal_universitas.value='';
                                        }
                                        if(document.myform.id_st_msk.value=='2')
                                        {
                                        document.myform.asal_universitas.disabled=false;
                                        document.myform.asal_universitas.value=$asal_universitas;
                                        }
                                    }
                                    </script>
                                    <div class="form-group">
                                        <label for="varchar">Nama Ibu Kandung
                                            <?php echo form_error('nama_ibu_kandung')?>
                                        </label>
                                        <input type="text" class="form-control" name="nama_ibu_kandung" id="nama_ibu_kandung" placeholder="Nama Ibu Kandung" value="<?php echo $nama_ibu_kandung ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="tinyint">SKS Diakui
                                            <?php echo form_error('sks_diakui') ?></label>
                                        <input type="number" class="form-control" name="sks_diakui" id="sks_diakui" placeholder="Sks Diakui" value="<?php echo $sks_diakui; ?>" />
                                    </div>
                                    

                                     <div class="form-group">
                                        <label for="int">Angkatan
                                            <?php echo form_error('angkatan') ?></label>
                                        
                                        <select class="form-control" name="angkatan">
                                            <option>- Angkatan -</option>
                                            <option value="1" <?php if($angkatan=='1'){ echo 'selected';} ?>>2017</option>
                                            <option value="2" <?php if($angkatan=='2'){ echo 'selected';} ?>>2018</option>
                                            <option selected value="3" <?php if($angkatan=='3'){ echo 'selected';} ?>>2019</option>
                                            <option value="4" <?php if($angkatan=='4'){ echo 'selected';} ?>>2020</option>
                                            <option value="5" <?php if($angkatan=='5'){ echo 'selected';} ?>>2021</option>
                                            <option value="6" <?php if($angkatan=='6'){ echo 'selected';} ?>>2022</option>
                                            <option value="7" <?php if($angkatan=='7'){ echo 'selected';} ?>>2023</option>
                                            <option value="8" <?php if($angkatan=='8'){ echo 'selected';} ?>>2024</option>
                                            <option value="9" <?php if($angkatan=='9'){ echo 'selected';} ?>>2025</option>
                                            <option value="10" <?php if($angkatan=='10'){ echo 'selected';} ?>>2026</option>
                                            <option value="11" <?php if($angkatan=='11'){ echo 'selected';} ?>>2027</option>
                                            <option value="12" <?php if($angkatan=='12'){ echo 'selected';} ?>>2028</option>
                                            <option value="13" <?php if($angkatan=='13'){ echo 'selected';} ?>>2029</option>
                                            <option value="14" <?php if($angkatan=='14'){ echo 'selected';} ?>>2030</option>
                                            <option value="15" <?php if($angkatan=='15'){ echo 'selected';} ?>>2031</option>
                                            <option value="16" <?php if($angkatan=='16'){ echo 'selected';} ?>>2032</option>
                                            <option value="17" <?php if($angkatan=='17'){ echo 'selected';} ?>>2033</option>
                                            <option value="18" <?php if($angkatan=='18'){ echo 'selected';} ?>>2034</option>
                                            <option value="19" <?php if($angkatan=='19'){ echo 'selected';} ?>>2035</option>
                                            <option value="20" <?php if($angkatan=='20'){ echo 'selected';} ?>>2036</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="int">Jurusan
                                            <?php echo form_error('id_jenjang') ?></label>
                                        <select name="id_jenjang" class="form-control">
                                            <?php
                                            $text='';
                                            foreach($jurusans as $data){
                                                if($id_jenjang==$data->id_jurusan){
                                                    $text='selected';
                                                }
                                            ?>
                                            <option <?= $text ?> value="<?= $data->id_jurusan ?>"><?= $data->nama_jenjang.' - '.$data->nama_jurusan ?></option>
                                            <?php
                                            $text='';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="int">Beasiswa
                                            <?php echo form_error('id_beasiswa') ?></label>
                                        <select class="form-control" name="id_beasiswa">
                                            <?php
                                            foreach($beasiswa as $data){
                                                $text='';
                                                if($data->id_beasiswa==$id_beasiswa){
                                                    $text='selected';
                                                }
                                            ?>
                                            <option <?= $text ?> value="<?= $data->id_beasiswa ?>"><?= $data->nama_beasiswa ?></option>
                                            <?php
                                                
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="int">Nomor WA
                                            <?php echo form_error('nowa') ?></label>
                                    <input type="int" name="nowa" class="form-control" value="<?php echo $nowa ?>" placeholder="Nomor WA"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="int">Email
                                            <?php echo form_error('email') ?></label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $email ?>" placeholder="Email"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="int">Minat dan Hobi
                                            <?php echo form_error('mdh') ?></label>
                                    <input type="text" name="mdh" class="form-control" value="<?php echo $mdh ?>" placeholder="Minat dan Hobi"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="int">Prestasi
                                            <?php echo form_error('prestasi') ?></label>
                                    <input type="text" name="prestasi" class="form-control" value="<?php echo $prestasi ?>" placeholder="Prestasi"/>
                                    </div>
                                    <div> <label for="int">Alamat Asal
                                            <?php echo form_error('alamat_a') ?></label>
                                            <textarea id="alamat_a" name="alamat_a" class="form-control" required><?php echo $alamat_a ?></textarea><br/></div>
                                    <div> <label for="int">Alamat Sekarang
                                            <?php echo form_error('alamat_s') ?></label>
                                            <textarea id="alamat_s" name="alamat_s" class="form-control" required><?php echo $alamat_s ?></textarea><br/></div>
                                    <div class="form-group">
                                        <label for="varchar">Foto
                                            <?php echo form_error('img_file') ?></label>
                                        <input type="file" class="form-control" name="img_file" id="img_file" accept="image/jpeg"/>
                                    </div>

                                    
                                    <!-----------------
                                    <div class="form-group">
                                        <label for="varchar">Foto Mhs
                                            <?php echo form_error('foto_mhs') ?></label>
                                        <input type="text" class="form-control" name="foto_mhs" id="foto_mhs" placeholder="Foto Mhs" value="<?php echo $foto_mhs; ?>" />
                                    </div>
                                    ----------------------->
                                    <br/>
                                    <br/>
                                    <p class="pull-right">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo $button ?></button>
                                    <a href="<?php echo site_url('admin/baak/mahasiswa') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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