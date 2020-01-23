<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable =
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  null, null, null, null, null, null, null, null, null, null, 

					  { "bSortable": false }
					],
					"aaSorting": [],

			    } );
			})
		</script>

<p>
<a href="<?php echo base_url(); ?>index.php/nilai/tambah" class="btn btn-primary btn-small">Tambah Data Nilai</a>
</p>


<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Nilai</th>
			<th>Nama Siswa</th>
			<th>Kelas</th>
			<th>Nama Pelajaran</th>
			<th>Bobot</th>
			<th>Nama Guru</th>
			<th>Tugas</th>
			<th>UTS</th>
			<th>UAS</th>
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
			<td><?php echo $row->kd_nilai ; ?></td>
			<td><?php echo $row->nm_siswa ; ?></td>
			<td><?php echo $row->nm_kelas ; ?></td>
			<td><?php echo $row->nm_pelajaran ; ?></td>
			<td><?php echo $row->bobot ; ?></td>
			<td><?php echo $row->nm_guru ; ?></td>
			<td><?php echo $row->tugas ; ?></td>
			<td><?php echo $row->uts ; ?></td>
			<td><?php echo $row->uas ; ?></td>

			<td>
				<a href="<?php echo base_url() ?>index.php/nilai/edit/<?php echo $row->kd_nilai; ?>">Edit |</a>
				<a href="<?php echo base_url() ?>index.php/nilai/delete/<?php echo $row->kd_nilai; ?>" onclick="return confirm('Apakah anda yakin mau hapus data ini?')">| Delete</a>
			</td>

		</tr>
	<?php } ?>
	</tbody>
</table>
