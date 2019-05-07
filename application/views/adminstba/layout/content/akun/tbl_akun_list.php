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
                                <div class="row" style="margin-bottom: 10px">
                                    <div class="col-md-4">
                                        <?php echo anchor(site_url('akun/create'),'<i class="fa fa-plus"></i> Tambah', 'class="btn btn-primary"'); ?>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div style="margin-top: 8px" id="message">
                                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-1 text-right">
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <form action="<?php echo site_url('akun/index'); ?>" class="form-inline" method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                                <span class="input-group-btn">
                                                    <?php 
                                                    if ($q <> '')
                                                    {
                                                        ?>
                                                    <a href="<?php echo site_url('mahasiswa'); ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                                    <?php
                                                    }
                                                    ?>
                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="table table-bordered" style="margin-bottom: 10px">
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Induk</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    foreach ($akun_data as $akun)
                                    {
                                        ?>
                                    <tr>
                                        <td width="80px">
                                            <?php echo ++$start ?>
                                        </td>
                                        <td>
                                            <?php echo $akun->nomor_induk ?>
                                        </td>
                                        <td>
                                            <?php 
                                            if($akun->status=='mahasiswa'){
                                                $data='';
                                                $data=$this->db->query("select * from tbl_mahasiswa where nim='$akun->nomor_induk'")->row();
                                                echo $data->nama_mhs;
                                            }else if($akun->status=='dosen'){
                                                $data='';
                                                $data=$this->db->query("select * from tbl_dosen where nidn='$akun->nomor_induk'")->row();
                                                echo $data->nama;
                                            }else{
                                                $data='';
                                                $data=$this->db->query("select * from tbl_akun_detail where nomor_induk='$akun->nomor_induk'")->row();
                                                echo $data->nama;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $akun->status ?>
                                        </td>
                                        <td style="text-align:center" width="200px">
                                            <a class="btn btn-primary" href="<?= site_url('akun/update/'.$akun->id)?>"><i class="fa fa-key"></i></a>
                                            <?php 
                                            if($akun->status=='kajur' || $akun->status=='baak' || $akun->status=='admin'){
                                            ?>
                                            <a class="btn btn-default" href="<?= site_url('akun/profile/'.$akun->id)?>"><i class="fa fa-user"></i></a>
                                            <a class="btn btn-danger"  onclick="javasciprt: return confirm('Anda yakin akan menghapus data akun? ')"  href="<?= site_url('akun/delete/'.$akun->nomor_induk)?>"><i class="fa fa-trash"></i></a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-primary">Total Record :
                                            <?php echo $total_rows ?></a>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <?php echo $pagination ?>
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
