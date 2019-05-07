<div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title">Jadwal KRS</h4>
                 <p class="category">STBA LIA Yogyakarta</p>
             <hr/>
         </br>
    </div>
    <div class="page">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xxl-12">
                    <div class="card-block p-20 pb-25">
                        <div class="row pb-40" data-plugin="matchHeight">
                            <div class="col-md-6">
                                <div class="counter text-left pl-10">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-lg-12">
                                <br>
                                <?php
                                foreach($prodi as $data){
                                ?>
                                <form class="" action="<?= site_url('krs/jadwal_save') ?>" method="post">
                                    <input type="hidden" value="<?= $data->id_jadwal_krs ?>" name="id_jadwal_krs" />
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label><?= $data->nama_jenjang.' '.$data->nama_jurusan ?></label>
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="form-control" type="date" name="date" value="<?= date('Y-m-d',strtotime($data->tgl_awl_krs)) ?>"/>
                                        </div>
                                        <div class="col-lg-1">
                                            <label>s/d</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="form-control" type="date" name="date_end" value="<?= date('Y-m-d',strtotime($data->tgl_akr_krs)) ?>"/>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <br>
                                <?php        
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
