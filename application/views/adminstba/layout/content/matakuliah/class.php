<div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title">Jadwal KRS</h4>
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
                                    <div class="counter-label">Matakuliah :
                                        <?php echo "(".$kode_mk.")".$nama_mk; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-md-12">
                                <br>
                                <table class="table">
                                    <tr>
                                        <td>Kode MK</td>
                                        <td>
                                            <?php echo $kode_mk; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama MK</td>
                                        <td>
                                            <?php echo $nama_mk; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Prasyarat</td>
                                        <td>
                                            <?php echo $prasyarat->nama_mk; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kelompok MK</td>
                                        <td>
                                            <?php echo $kel_mk->nama_kel_mk; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>SKS</td>
                                        <td>
                                            <?php echo $sks_mk; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jurusan</td>
                                        <td>
                                            <?php echo $jurusans->nama_jenjang.' - '.$jurusans->nama_jurusan; ?>
                                        </td>
                                    </tr>
                                </table>
                                <a href="<?php echo site_url('admin/kajur/matakuliah/add_class/'.$id_mk) ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kelas</a>
                                <br>
                                <br>
                                <table class="table table-bordered" style="margin-bottom: 10px">
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php
                                    $i=1;
                                    foreach($kelas as $data){
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $data->nama_kelas ?></td>
                                        <td>
                                            <a class="btn btn-danger"  onclick="javasciprt: return confirm('Anda yakin akan menghapus data kelas? ')"  href="<?= site_url('admin/kajur/matakuliah/kelas_delete?id='.$data->id.'&mk='.$id_mk)?>"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </table>
                                <a href="<?php echo site_url('admin/kajur/plot_kelas') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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
