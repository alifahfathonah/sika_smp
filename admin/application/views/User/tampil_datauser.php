<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  null, null, null, null, null, null,

					  { "bSortable": false }
					],
					"aaSorting": [],
		
			    } );
			})
		</script>

<p>
<a href="<?php echo base_url(); ?>index.php/user/tambah" class="btn btn-primary btn-small">Tambah User</a>
</p>


<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode User</th>
			<th>Username</th>
			<th>Password</th>
			<th>Nama User</th>
			<th>Level</th>
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
			<td><?php echo $row->kd_user ; ?></td>
			<td><?php echo $row->username ; ?></td>
			<td><?php echo $row->password ; ?></td>
			<td><?php echo $row->nama ; ?></td>
			<td><?php echo $row->level ; ?></td>
			
			<td> 
				<a href="<?php echo base_url() ?>index.php/user/edit/<?php echo $row->kd_user; ?>">Edit |</a>
				<a href="<?php echo base_url() ?>index.php/user/delete/<?php echo $row->kd_user; ?>" onclick="return confirm('Apakah anda yakin mau hapus data ini?')">| Delete</a>
			</td>
			
		</tr>
	<?php } ?>
	</tbody>
</table>