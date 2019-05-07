<div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title">Ploting Matakuliah</h4>
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
                                
                            </div>
                        </div>
                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-md-12">
                                <br>
                                
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
                                        <th style="color: white;">Status</th>
                                        <th style="color: white;">Aksi</th>
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
                                                <?= $data->nama_mk ?>
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
                                                <?php
                                                if($data->id_ploting){
                                                    if($data->ploting_status=='Y'){
                                                ?>
                                                <?= $data->nidn.' - '.$data->nama ?>
                                                <?php  
                                                    }else{
                                                ?>
                                                <?= $data->nidn.' - '.$data->nama ?>
                                                <?php  
                                                    }
                                                }else{
                                                ?>
                                                <form class="form-inline" action="<?= site_url('ploting/single_plot') ?>" method="post">
                                                    <input type="hidden" value="<?= $data->id_kelas ?>" name="id_mk" />
                                                    <select class="form-control" name="id_dosen" style="border-color:rgba(0,0,0,0.3);width:20em">
                                                        <option>- Dosen -</option>
                                                        <?php
                                                        foreach($dosen as $d_dosen){
                                                        ?>
                                                        <option value="<?= $d_dosen->id_dosen ?>">
                                                            <?= $d_dosen->nama ?>
                                                        </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
                                                </form>
                                                <?php   
                                                }
                                                ?>

                                            
                                            </td>
                                            <td align="center">

                                                <?php
                                                if($data->id_ploting){
                                                    if($data->ploting_status=='Y'){
                                                ?>
                                                <div class="alert alert-success">ACC</div>
                                                <?php  
                                                    }else{
                                                ?>
                                                <div class="alert alert-primary">Belum ACC</div>
                                                <?php  
                                                    }
                                                }else{
                                                ?>
                                                <div class="alert alert-warning">Belum diset</div>
                                                <?php   
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($data->id_ploting){
                                                    if($data->ploting_status=='Y'){
                                                ?>
                                                <a class="btn btn-warning" href="<?= site_url('admin/kajur/ploting/deny/'.$data->id_ploting)?>"><i class="fa fa-times"></i></a>
                                                <?php  
                                                    }else{
                                                ?>
                                                <a class="btn btn-danger" onclick="javasciprt: return confirm('Anda yakin akan menghapus data ploting ini? ')" href="<?= site_url('admin/kajur/ploting/delete/'.$data->id_ploting)?>"><i class="fa fa-trash"></i></a>
                                                <a class="btn btn-primary" href="<?= site_url('admin/kajur/ploting/acc/'.$data->id_ploting)?>"><i class="fa fa-check-circle"></i></a>
                                                <?php  
                                                    }
                                                }else{
                                                ?>

                                                <?php   
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
