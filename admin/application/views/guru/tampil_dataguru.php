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
<a href="<?php echo base_url(); ?>index.php/guru/tambah" class="btn btn-primary btn-small">Tambah Data Guru</a>
</p>

<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>NIP</th>
			<th>Nama Guru</th>
			<th>Jabatan</th>
			<th>Jenis Kelamin</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Alamat Rumah</th>
			<th>No Telp</th>
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
			<td><?php echo $row->nip ; ?></td>
			<td><?php echo $row->nm_guru ; ?></td>
			<td><?php echo $row->jabatan ; ?></td>
			<td><?php echo $row->jenis_kelamin ; ?></td>
			<td><?php echo $row->tempat_lahir ; ?></td>
			<td><?php echo $row->tanggal_lahir ; ?></td>
			<td><?php echo $row->alamat_rumah ; ?></td>
			<td><?php echo $row->notelp_guru ; ?></td>



			<td> 
				<a href="<?php echo base_url() ?>index.php/guru/edit/<?php echo $row->nip; ?>">Edit |</a>
				<a href="<?php echo base_url() ?>index.php/guru/delete/<?php echo $row->nip; ?>" onclick="return confirm('Apakah anda yakin mau hapus data ini?')">| Delete</a>
			</td>
			
		</tr>
	<?php } ?>
	</tbody>
</table>