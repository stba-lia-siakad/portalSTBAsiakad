<div class="page" style="background-color:rgb(201, 201, 201)">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xxl-12">
                <div id="teamCompletedWidget" class="card card-shadow example-responsive">
                    <div class="card-block p-20 pb-25">
                        <div class="row pb-40" data-plugin="matchHeight">
                            <div class="col-md-6">
                                <div class="counter text-left pl-10">
                                    <div class="counter-label"><i class="fa fa-check" aria-hidden="true"></i>
                                        <?= $judul ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-lg-12">
                                <br>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <form class="form-inline" action="<?= site_url('krs/search') ?>" method="get">
                                            <div class="form-group mx-sm-3 mb-2">
                                                <label for="inputPassword2" class="sr-only">Password</label> &nbsp; &nbsp; &nbsp;NIM &nbsp;
                                                <input type="text" class="form-control" name='nim' id="inputPassword2" value="<?= $mhs->nim ?>" placeholder="NIM">
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i> Cari</button>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-1">
                                        &nbsp; &nbsp; &nbsp; Nama
                                    </div>
                                    <div class="col-lg-8">
                                        :
                                        <?= $mhs->nama_mhs ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-1">
                                        &nbsp; &nbsp; &nbsp; Prodi
                                    </div>
                                    <div class="col-lg-8">
                                        :
                                        <?= $mhs->nama_jenjang.' '.$mhs->nama_jurusan ?>
                                    </div>
                                </div>
                                <br>
                                <?php
                                    if($this->session->userdata('login_data')->status!='kajur' && $this->session->userdata('login_data')->status!='admin'){
                                ?>
                                <a class="btn btn-primary" href="<?= site_url('krs/list_krs?nim='.$mhs->nim) ?>"><i class="fa fa-plus"></i> Tambahkan KRS</a>
                                <br>
                                <br>
                                <?php    
                                    }
                                ?>

                                <table class="table table-bordered" style="margin-bottom: 10px">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama MK</th>
                                        <th>SKS</th>
                                        <th>Semester</th>
                                        <th>Kelas</th>
                                        <th>Jadwal</th>
                                        <th>Ruang</th>
                                        <th>Dosen</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
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
                                                <?= '('.$data->kode_mk.') '.$data->nama_mk ?>
                                            </td>
                                            <td>
                                                <?= $data->sks_mk ?>
                                            </td>
                                            <td>
                                                <?= $data->semester_prodi ?>
                                            </td>
                                            <td>
                                                <?= $data->nama_kelas ?>
                                            </td>
                                            <td>
                                                <?= $data->hari ?>
                                                <?= $data->jam_mulai ?> -
                                                <?= $data->jam_akhir ?>
                                            </td>
                                            <td>
                                                <?= $data->nama_ruangan ?>
                                            </td>
                                            <td>
                                                <?= $data->nama ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($data->status_krs=='Y'){
                                                ?>
                                                <div class="alert alert-success">ACC</div>
                                                <?php
                                                }else{
                                                ?>
                                                <div class="alert alert-danger">Non ACC</div>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($this->session->userdata('login_data')->status!='admin' && $this->session->userdata('login_data')->status!='baak'){
                                                    if($data->status_krs=='Y'){
                                                    ?>
                                                    <a class="btn btn-warning" href="<?= site_url('krs/krs_deny?id='.$data->id_krs.'&nim='.$data->nim) ?>"><i class="fa fa-times"></i></a>
                                                    <a class="btn btn-danger" href="<?= site_url('krs/krs_delete?id='.$data->id_krs.'&nim='.$data->nim) ?>"><i class="fa fa-trash"></i></a>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <a class="btn btn-primary" href="<?= site_url('krs/krs_acc?id='.$data->id_krs.'&nim='.$data->nim) ?>"><i class="fa fa-check"></i></a>
                                                    <a class="btn btn-danger" href="<?= site_url('krs/krs_delete?id='.$data->id_krs.'&nim='.$data->nim) ?>"><i class="fa fa-trash"></i></a>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <br>
                                <?php
                                if($this->input->get('ta')){
                                    ?>
                                    <a href="<?= site_url('krs/cetak?nim='.$mhs->nim.'&ta='.$this->input->get("ta").'&smt='.$this->input->get("id_smt")) ?>" class="btn btn-primary"><i class="fa fa-print"></i> Cetak KRS</a>
                                    <?php
                                }else{
                                    ?>
                                    <a href="<?= site_url('krs/cetak?nim='.$mhs->nim) ?>" class="btn btn-primary"><i class="fa fa-print"></i> Cetak KRS</a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
