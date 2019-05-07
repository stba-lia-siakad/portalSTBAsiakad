    <div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title">Konfigurasi Tahun Ajaran Aktif</h4>
                 <p class="category">STBA LIA Yogyakarta</p>
             <hr/>
         </br>
    </div> 
    <div class="page" >
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
                            <div class="col-md-12">
                                <br>
                                <form class="" action="" method="post">
                                    <input type="hidden" value="<?= $data->id_ta ?>" name="id_ta" />
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label> Tahun Ajaran</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <select name="ta" class="form-control">
                                                <option value="">- Pilih -</option>
                                                <option value="2019/2020" <?php if($data->ta=='2019/2020'){echo 'selected';} ?>>2019/2020</option>
                                                <option value="2018/2019" <?php if($data->ta=='2018/2019'){echo 'selected';} ?>>2018/2019</option>
                                                <option value="2017/2018" <?php if($data->ta=='2017/2018'){echo 'selected';} ?>>2017/2018</option>
                                                <option value="2016/2017" <?php if($data->ta=='2016/2017'){echo 'selected';} ?>>2016/2017</option>
                                                <option value="2015/2016" <?php if($data->ta=='2015/2016'){echo 'selected';} ?>>2015/2016</option>
                                                <option value="2014/2015" <?php if($data->ta=='2014/2015'){echo 'selected';} ?>>2014/2015</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1">
                                            <label>Semester</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <select name="smt" class="form-control">
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php if($data->smt=='1'){echo 'selected';} ?>>Ganjil</option>
                                                <option value="2" <?php if($data->smt=='2'){echo 'selected';} ?>>Genap</option>
                                                <option value="3" <?php if($data->smt=='3'){echo 'selected';} ?>>Antara</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                                        </div>
                                    </div>
                                </form>
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
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/>

