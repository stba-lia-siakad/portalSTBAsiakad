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
                            	<div class="row">
                            		<div class="col-lg-6">
	                            		<form action="">
										  <div class="form-group row">
										    <label for="inputPassword" class="col-sm-3 col-form-label">Prodi</label>
										    <div class="col-sm-6">
                                                <select class="form-control" name="prodi">
                                                    <option value="">- Pilih Prodi -</option>
                                                    <?php
                                                    foreach ($jurusans as $data) {
                                                    ?>
                                                    <option value="<?= $data->id_jurusan ?>" <?php if($data->id_jurusan==$prodi){ echo "selected";}?>><?= $data->nama_jenjang.' '.$data->nama_jurusan ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
										    </div>
										  </div>
										  <div class="form-group row" style="margin-top:-10px">
										    <label for="inputPassword" class="col-sm-3 col-form-label">Tahun Ajaran</label>
										    <div class="col-sm-6">
	                                          <select class="form-control" name="ta">
	                                              <option>-Pilih Tahun Ajaran-</option>
	                                              <option value="2019" <?php if($id_ta=='2019'){echo 'selected';}?>>2019/2020</option>
	                                              <option value="2018" <?php if($id_ta=='2018'){echo 'selected';}?>>2018/2019</option>
	                                              <option value="2017" <?php if($id_ta=='2017'){echo 'selected';}?>>2017/2018</option>
	                                              <option value="2016" <?php if($id_ta=='2016'){echo 'selected';}?>>2016/2017</option>
	                                              <option value="2015" <?php if($id_ta=='2015'){echo 'selected';}?>>2015/2016</option>
	                                              <option value="2014" <?php if($id_ta=='2014'){echo 'selected';}?>>2014/2015</option>
	                                              <option value="2013" <?php if($id_ta=='2013'){echo 'selected';}?>>2013/2014</option>
	                                              <option value="2012" <?php if($id_ta=='2012'){echo 'selected';}?>>2012/2013</option>
	                                              <option value="2011" <?php if($id_ta=='2011'){echo 'selected';}?>>2011/2012</option>
	                                          </select>
										    </div>
										  </div>
										  <div class="form-group row" style="margin-top:-10px">
										    <label for="inputPassword" class="col-sm-3 col-form-label">Semester</label>
										    <div class="col-sm-6">
										      	<select class="form-control" name="smt">
		                                              <option>-Pilih Semester-</option>
		                                              <option value="1"<?php if($id_smt=='1'){echo 'selected';}?>>Ganjil</option>
		                                              <option value="2"<?php if($id_smt=='2'){echo 'selected';}?>>Genap</option>
		                                              <option value="3"<?php if($id_smt=='3'){echo 'selected';}?>>Antara</option>
		                                         </select>
										    </div>
										  <div class="form-group row" style="margin-top:-10px">
										    <div class="col-sm-6">
										    	<button class="btn btn-primary">Cari <i class="fa fa-search"></i></button>
										    </div>
										  </div>
										</form>
                            		</div>
                            	</div>
                                <br>
                                <table class="table table-bordered" style="margin-bottom: 10px">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Semester</th>
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
                                                <?= $data->nama_mhs ?>
                                            </td>
                                            <td>
                                                <?= $data->tahun_ajaran ?>
                                            </td>
                                            <td>
                                                <?= $data->semester_prodi ?>
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
                                            	<a target="_blank" class="btn btn-primary" href="<?= site_url('krs/search?nim='.$data->nim.'&ta='.$id_ta.'&id_smt='.$id_smt) ?>"><i class="fa fa-list"></i></a> 
                                            	<a target="_blank" class="btn btn-primary" href="<?= site_url('/krs/cetak?nim='.$data->nim.'&ta='.$id_ta.'&id_smt='.$id_smt) ?>"><i class="fa fa-print"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                
                                <br>
                            </div>
                                <center>
                             		<a target="_blank" class="btn btn-primary" href="<?= site_url('/krs/cetakallby?prodi='.$prodi.'&ta='.$id_ta.'&smt='.$id_smt) ?>"><i class="fa fa-print"></i> Cetak Semua</a>   	
                                </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
