<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  null, null, null, null, null, null, null, null, null,

					  { "bSortable": false }
					],
					"aaSorting": [],
		
			    } );
			})
		</script>

<p>
<a href="../cetak/cetak_siswa.php" class="btn btn-primary btn-small">Cetak Data Siswa</a>
</p>


<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>NIS</th>
			<th>Nama Siswa</th>
			<th>Kelas</th>
			<th>Jenis Kelamin</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Alamat Rumah</th>
			<th>No Telp</th>
			<th>No Telp Orangtua</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php
			$no = 1;
			foreach ($data->result() as $row) {
			?>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->nis ; ?></td>
			<td><?php echo $row->nm_siswa ; ?></td>
			<td><?php echo $row->nm_kelas ; ?></td>
			<td><?php echo $row->jenis_kelamin ; ?></td>
			<td><?php echo $row->tempat_lahir ; ?></td>
			<td><?php echo $row->tanggal_lahir ; ?></td>
			<td><?php echo $row->alamat_rumah ; ?></td>
			<td><?php echo $row->notelp_siswa ; ?></td>
			<td><?php echo $row->notelp_orangtua ; ?></td>

		</tr>
	<?php } ?>
	</tbody>
</table>