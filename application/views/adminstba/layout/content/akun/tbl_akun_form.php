<div class="page" style="background-color:rgb(201, 201, 201)">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xxl-12">
                <div id="teamCompletedWidget" class="card card-shadow example-responsive">
                    <div class="card-block p-20 pb-25">
                        <div class="row pb-40" data-plugin="matchHeight">
                            <div class="col-md-6">
                                <div class="counter text-left pl-10">
                                    <div class="counter-label"><i class="fa fa-key" aria-hidden="true"></i> Akun</div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-md-12">
                                <br>
                                <form action="<?php echo $action; ?>" method="post">
                                    <div class="form-group">
                                        <label for="varchar">Nomor Induk
                                            <?php echo form_error('nomor_induk') ?></label>
                                        <input type="text" <?php if($nomor_induk){echo 'readonly';} ?> class="form-control" name="nomor_induk" id="nomor_induk" placeholder="Nomor Induk" value="<?php echo $nomor_induk; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Password
                                            <?php echo form_error('pass') ?></label>
                                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Pass" value="" />
                                    </div>
                                    <?php
                                    if($status=='mahasiswa'){
                                    ?>
                                    <div class="form-group">
                                        <label for="varchar">Status
                                            <?php echo form_error('status') ?></label>
                                            <select name="status" class="form-control">
                                                <option value="mahasiswa" <?php if($status=='mahasiswa') echo 'selected' ?>>MAHASISWA</option>
                                            </select>
                                    </div>
                                    <?php
                                    }else if($status=='dosen'){
                                    ?>
                                    <div class="form-group">
                                        <label for="varchar">Status
                                            <?php echo form_error('status') ?></label>
                                            <select name="status" class="form-control">
                                                <option value="kajur" <?php if($status=='kajur') echo 'selected' ?>>KAJUR</option>
                                                <option value="dosen" <?php if($status=='dosen') echo 'selected' ?>>DOSEN</option>
                                            </select>
                                    </div>
                                    <?php
                                    }else{
                                    ?>
                                    <div class="form-group">
                                        <label for="varchar">Status
                                            <?php echo form_error('status') ?></label>
                                            <select name="status" class="form-control">
                                                <option value="baak" <?php if($status=='baak') echo 'selected' ?>>BA AK</option>
                                                <option value="kajur" <?php if($status=='kajur') echo 'selected' ?>>KAJUR</option>
                                                <option value="admin" <?php if($status=='admin') echo 'selected' ?>>ADMIN</option>
                                            </select>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo $button ?></button>
                                    <a href="<?php echo site_url('akun') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
