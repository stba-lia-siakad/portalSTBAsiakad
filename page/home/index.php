<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url('assets/css/animate.min.css')?>" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url('assets/css/light-bootstrap-dashboard.css?v=1.4.0')?>" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url('assets/css/demo.css" rel="stylesheet')?>" />


    <!--     Fonts and icons     -->
    
    <link href="<?php echo base_url('assets/css/pe-icon-7-stroke.css" rel="stylesheet')?>" />

<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>Kegiatan</th>
			<th>Tanggal<th>
		</tr>
	<?php
	
	if($fetch_data->num_rows() > 0)
	{
		foreach ($fetch_data->result() as $row) {
	?>
		<tr>
			<td><?php echo $row->nama_kegiatan;?></td>
			<td><?php echo $row->tanggal_kegiatan;?></td>
		</tr>
	<?php
		}
	}
	else
	{
	?>
		<tr>
			<td colspan="3">No data Found</td>
		</tr>
	<?php
	}
	?>
	</table>
</div>