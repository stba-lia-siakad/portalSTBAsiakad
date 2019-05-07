<div class="page" style="background-color:rgb(201, 201, 201)">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xxl-12">
                <div id="teamCompletedWidget" class="card card-shadow example-responsive">
                    <div class="card-block p-20 pb-25">
                        <div class="row pb-40" data-plugin="matchHeight">
                            <div class="col-md-6">
                                <div class="counter text-left pl-10">
                                    <div class="counter-label"><i class="fa fa-clone" aria-hidden="true"></i> Jenjang</div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-md-12">
                                <br>
                                <form action="<?php echo $action; ?>" method="post">
                                    <div class="form-group">
                                        <label for="varchar">Nama Jenjang
                                            <?php echo form_error('nama_jenjang') ?></label>
                                        <input type="text" class="form-control" name="nama_jenjang" id="nama_jenjang" placeholder="Nama Jenjang" value="<?php echo $nama_jenjang; ?>" />
                                    </div>
                                    <input type="hidden" name="id_jenjang" value="<?php echo $id_jenjang; ?>" />
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo $button ?></button>
                                    <a href="<?php echo site_url('jenjang') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
