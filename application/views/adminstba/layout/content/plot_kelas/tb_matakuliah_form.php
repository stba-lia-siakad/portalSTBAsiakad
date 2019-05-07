<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tb_matakuliah <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode Mk <?php echo form_error('kode_mk') ?></label>
            <input type="text" class="form-control" name="kode_mk" id="kode_mk" placeholder="Kode Mk" value="<?php echo $kode_mk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Mk <?php echo form_error('nama_mk') ?></label>
            <input type="text" class="form-control" name="nama_mk" id="nama_mk" placeholder="Nama Mk" value="<?php echo $nama_mk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Prasyarat <?php echo form_error('id_prasyarat') ?></label>
            <input type="text" class="form-control" name="id_prasyarat" id="id_prasyarat" placeholder="Id Prasyarat" value="<?php echo $id_prasyarat; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Kel Mk <?php echo form_error('id_kel_mk') ?></label>
            <input type="text" class="form-control" name="id_kel_mk" id="id_kel_mk" placeholder="Id Kel Mk" value="<?php echo $id_kel_mk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Sks Mk <?php echo form_error('sks_mk') ?></label>
            <input type="text" class="form-control" name="sks_mk" id="sks_mk" placeholder="Sks Mk" value="<?php echo $sks_mk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Jurusan <?php echo form_error('id_jurusan') ?></label>
            <input type="text" class="form-control" name="id_jurusan" id="id_jurusan" placeholder="Id Jurusan" value="<?php echo $id_jurusan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tahun Ajaran <?php echo form_error('tahun_ajaran') ?></label>
            <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" placeholder="Tahun Ajaran" value="<?php echo $tahun_ajaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Semester <?php echo form_error('semester') ?></label>
            <input type="text" class="form-control" name="semester" id="semester" placeholder="Semester" value="<?php echo $semester; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Semester Prodi <?php echo form_error('semester_prodi') ?></label>
            <input type="text" class="form-control" name="semester_prodi" id="semester_prodi" placeholder="Semester Prodi" value="<?php echo $semester_prodi; ?>" />
        </div>
	    <input type="hidden" name="id_mk" value="<?php echo $id_mk; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('plot_kelas') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>