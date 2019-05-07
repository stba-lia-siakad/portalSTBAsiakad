

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