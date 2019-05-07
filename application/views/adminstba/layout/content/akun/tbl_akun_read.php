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
        <h2 style="margin-top:0px">Tbl_akun Read</h2>
        <table class="table">
	    <tr><td>Nomor Induk</td><td><?php echo $nomor_induk; ?></td></tr>
	    <tr><td>Pass</td><td><?php echo $pass; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('akun') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>