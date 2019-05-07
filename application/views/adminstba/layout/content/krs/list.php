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
                                <form action="<?= site_url('krs/krs_save') ?>" method="post">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <br>
                                    <br>
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
                                        </thead>
                                        <tbody>
                                            <input type="hidden" name="nim" value="<?= $nim ?>"/>
                                            <?php
                                            $i=1;
                                            foreach($mk_daftar as $data){
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="id_mk[]" value="<?= $data->id_kelas ?>"/>
                                                </td>
                                                <td><?= '('.$data->kode_mk.') '.$data->nama_mk ?></td>
                                                <td><?= $data->sks_mk ?></td>
                                                <td><?= $data->semester_prodi ?></td>
                                                <td><?= $data->nama_kelas ?></td>
                                                <td><?= $data->hari ?> <?= $data->jam_mulai ?>-<?= $data->jam_akhir ?> </td>
                                                <td><?= $data->nama_ruangan ?></td>
                                                <td><?= $data->nama ?></td>
                                            </tr>
                                            <?php
                                                $i++;
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
