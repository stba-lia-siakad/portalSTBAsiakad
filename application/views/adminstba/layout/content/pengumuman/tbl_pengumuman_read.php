<div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title"><?php echo $title?></h4>
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
                                    <div class="counter-label"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Data Dosen : <?= ucwords($nama) ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-md-12">
                                <center>
                                    <img style="width:500px;height:auto" src="<?= base_url() ?>assets/images/img_dosen/<?= $img_file ?>"/>
                                </center>
                            </div>
                        </div>
                        
                        <div class="row" style="" data-plugin="matchHeight">
                            <div class="col-md-12">
                                <br>
                                <table class="table">
                                    <tr>
                                        <td>NIDN</td>
                                        <td>
                                            <?php echo $nidn; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>
                                            <?php echo $nama; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            <?php echo $gender; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tempat,Tgl Lahir</td>
                                        <td>
                                            <?php echo $tempat_lahir.', '.date('d M Y',strtotime($tgl_lahir)); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>
                                            <?php echo $agama; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>
                                            <?php echo $alamat; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>
                                            <?php 
                                            foreach($jabatan as $data){
                                                if($data->id_jabatan==$id_jabatan){
                                                    $name=$data->nama_jabatan;
                                                }
                                            }
                                            echo $data->nama_jabatan; 
                                            $name=''; 
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><a href="<?php echo site_url('admin/baak/dosen') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a></td>
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
    </div>
</div>
</br>
