<div class="page" style="background-color:rgb(201, 201, 201)">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xxl-12">
                <div id="teamCompletedWidget" class="card card-shadow example-responsive">
                    <div class="card-block p-20 pb-25">
                        <div class="row pb-40" data-plugin="matchHeight">
                            <div class="col-md-6">
                                <div class="counter text-left pl-10">
                                    <div class="counter-label"><i class="fa fa-list" aria-hidden="true"></i> Matakuliah :
                                        <?php echo $nama_mk; ?>
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
                                            <?php echo $id_jurusan; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><a href="<?php echo site_url('matakuliah') ?>" class="btn btn-default">Cancel</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
