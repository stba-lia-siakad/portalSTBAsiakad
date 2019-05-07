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
        <h2 style="margin-top:0px">Tb_matakuliah Read</h2>
        <table class="table">
	    <tr><td>Kode Mk</td><td><?php echo $kode_mk; ?></td></tr>
	    <tr><td>Nama Mk</td><td><?php echo $nama_mk; ?></td></tr>
	    <tr><td>Id Prasyarat</td><td><?php echo $id_prasyarat; ?></td></tr>
	    <tr><td>Id Kel Mk</td><td><?php echo $id_kel_mk; ?></td></tr>
	    <tr><td>Sks Mk</td><td><?php echo $sks_mk; ?></td></tr>
	    <tr><td>Id Jurusan</td><td><?php echo $id_jurusan; ?></td></tr>
	    <tr><td>Tahun Ajaran</td><td><?php echo $tahun_ajaran; ?></td></tr>
	    <tr><td>Semester</td><td><?php echo $semester; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Semester Prodi</td><td><?php echo $semester_prodi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/baak/plot_kelas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>