<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  null, null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
		
			    } );
			})
		</script>

<p>
<a href="<?php echo base_url(); ?>index.php/kelas/tambah" class="btn btn-primary btn-small">Tambah Data Kelas</a>
</p>

<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode</th>
			<th>Kelas</th>
			<th>Wali Kelas</th>
			<th>AKSI</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php
			$no = 1;
			foreach ($data->result() as $row) {
			?>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->kd_kelas ; ?></td>
			<td><?php echo $row->nm_kelas ; ?></td>
			<td><?php echo $row->nm_guru ; ?></td>
			<td> 
				<a href="<?php echo base_url() ?>index.php/kelas/edit/<?php echo $row->kd_kelas; ?>">Edit |</a>
				<a href="<?php echo base_url() ?>index.php/kelas/delete/<?php echo $row->kd_kelas; ?>" onclick="return confirm('Apakah anda yakin mau hapus data ini?')">| Delete</a>
			</td>
			
		</tr>
	<?php } ?>
	</tbody>
</table>