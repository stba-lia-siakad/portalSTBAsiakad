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
                                                <input type="text" class="form-control" name='nim' id="inputPassword2" placeholder="NIM">
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
                                        : -
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-1">
                                         &nbsp; &nbsp; &nbsp; Prodi
                                    </div>
                                    <div class="col-lg-8">
                                        : -
                                    </div>
                                </div>
                                <br>
                                <br>
                                
                                <table class="table table-bordered" style="margin-bottom: 10px">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama MK</th>
                                        <th>SKS</th>
                                        <th>Semester</th>
                                        <th>Jadwal</th>
                                        <th>Ruang</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="7" align="center">Masukan NIM</td>
                                        </tr>
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
