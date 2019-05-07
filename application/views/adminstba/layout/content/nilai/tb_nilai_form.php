<div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title">Data Nilai</h4>
                 <p class="category">STBA LIA Yogyakarta</p>
             <hr/>
         </br>
    </div>
    <div class="page" ">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xxl-12">
                
                    <div class="card-block p-20 pb-25">
                        <div class="row pb-40" data-plugin="matchHeight">
                            <div class="col-md-6">
                                
                            </div>
                        </div>

                        <div class="row" style="margin-top: -40px" data-plugin="matchHeight">
                            <div class="col-md-12">
                                <br>
                                <form action="<?php echo $action; ?>" method="post">
                                    <div class="form-group">
                                        <label for="varchar">Nilai Huruf
                                            <?php echo form_error('nilai_huruf') ?></label>
                                        <input type="text" class="form-control" name="nilai_huruf" id="nilai_huruf" placeholder="Nilai Huruf" value="<?php echo $nilai_huruf; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="varchar">Nilai Angka
                                            <?php echo form_error('nilai_angka') ?></label>
                                        <input type="text" class="form-control" name="nilai_angka" id="nilai_angka" placeholder="Nilai Angka" value="<?php echo $nilai_angka; ?>" />
                                    </div>
                                    
                                    <input type="hidden" name="id" value="<?php echo $id_nilai; ?>" />
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo $button ?></button>
                                    <a href="<?php echo site_url('admin/baak/nilai') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </form>
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</div>
        </div>
    </div>
</div>
<br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>