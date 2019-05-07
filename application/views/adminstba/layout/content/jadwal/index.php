    <div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title">Jadwal Matakuliah</h4>
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
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-md-12">
                                <?php
                                if($this->session->userdata('input_status')){
                                    if($this->session->userdata('input_status')=='exist'){
                                ?>
                                <div class="aler alert-warning"><br><p style="margin-left:20px"><i class="fa fa-circle-alert"></i> Maaf jadwal sudah dipakai !</p><br></div>
                                <?php
                                    }else{
                                ?>
                                <div class="aler alert-primary"><br><i class="fa fa-square-check"></i> Berhasil menambahkan !<br></div>
                                <?php   
                                    }
                                    $this->session->unset_userdata("input_status");
                                }
                                ?>
                                <br>
                                
                                <br>
                                <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                
                                    <thead style="background-color: #4091e2;">
                                        <th style="color: white;">No</th>
                                        <th style="color: white;">Matakuliah</th>
                                        <th style="color: white;">Prodi</th>
                                        <th style="color: white;">Tahun Ajaran</th>
                                        <th style="color: white;">Semester</th>
                                        <th style="color: white;">Kelas</th>
                                        <th style="color: white;">Dosen</th>
                                        <th style="color: white;">Ruang</th>
                                        <th style="color: white;">Hari</th>
                                        <th style="color: white;">Jam</th>
                                        <?php
                                        if($this->session->userdata('level')!='kajur' && $this->session->userdata('level')!='dosen' && $this->session->userdata('level')!='baak'){
                                        ?>
                                        <th>Aksi</th>
                                        <?php    
                                        }
                                        ?>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        foreach($mk_daftar as $data){
                                            
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $i ?>
                                            </td>
                                            <td>
                                                <?= "(".$data->kode_mk.") ".$data->nama_mk ?>
                                            </td>
                                            <td>
                                                <?= $data->nama_jenjang." ".$data->nama_jurusan ?>
                                            </td>
                                            <td>
                                                <?= $data->tahun_ajaran ?>
                                            </td>
                                            <td>
                                                <?= $data->semester_prodi ?>
                                            </td>
                                            <td>
                                                <?= $data->nama_kelas ?>
                                            </td>
                                            <td>
                                                <?= '('.$data->nidn.') '.$data->nama ?>
                                            </td>
                                            <form action="<?= site_url('jadwal/single_plot') ?>" method="post">
                                                <td>
                                                    <?php
                                                if($data->id_jadwal_mk){
                                                ?>
                                                    <?= $data->nama_ruangan ?>
                                                    <?php
                                                }else{
                                                ?>
                                                    <select class="form-control" name="id_ruangan" required>
                                                        <option value="">- Pilih Ruangan -</option>
                                                        <?php
                                                    foreach($ruang as $data_r){
                                                    ?>
                                                        <option value="<?= $data_r->id ?>">
                                                            <?= $data_r->nama_ruangan ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>
                                                    <?php
                                                }
                                                ?>
                                                </td>
                                                <td>
                                                    <?php
                                                if($data->id_jadwal_mk){
                                                ?>
                                                    <?= $data->hari ?>
                                                    <?php
                                                }else{
                                                ?>
                                                    <select class="form-control" name="id_hari" required>
                                                        <option value="">- Pilih Hari -</option>
                                                        <?php
                                                    foreach($hari as $data_r){
                                                    ?>
                                                        <option value="<?= $data_r->id_hari ?>">
                                                            <?= $data_r->hari ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>
                                                    <?php
                                                }
                                                ?>
                                                </td>
                                                <td>

                                                    <?php
                                                if($data->id_jadwal_mk){
                                                ?>
                                                    <?= $data->jam_mulai.' - '.$data->jam_akhir ?>
                                                    <?php
                                                }else{
                                                ?>
                                                    <select class="form-control" name="id_jam" required>
                                                        <option value="">- Pilih Jam -</option>
                                                        <?php
                                                    foreach($jam as $data_r){
                                                    ?>
                                                        <option value="<?= $data_r->id_jam ?>">
                                                            <?= $data_r->jam_mulai.' - '.$data_r->jam_akhir ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>
                                                    <?php
                                                }
                                                ?>
                                                </td>
                                                <?php
                                                if($this->session->userdata('level')!='kajur'  && $this->session->userdata('level')!='dosen' && $this->session->userdata('level')!='baak'){
                                                ?>
                                                <td>
                                                    <?php
                                                if($data->id_jadwal_mk){
                                                ?>
                                                    <a class="btn btn-warning" href="<?= site_url('jadwal/deny/'.$data->id_jadwal_mk)?>"><i class="fa fa-trash"></i></a>
                                                    <?php
                                                }else{
                                                ?>
                                                    <input type="hidden" name="id_mk" value="<?= $data->ploting_id_matakuliah ?>" />
                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i></button>
                                                    <?php
                                                }
                                                ?>

                                                </td>
                                                <?php 
                                                }
                                                ?>
                                            </form>
                                        </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
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
</div>
