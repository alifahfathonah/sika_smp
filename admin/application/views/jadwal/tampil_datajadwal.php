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

<?php if ($this->session->userdata('level') == "1"){ ?>
<p>
<a href="<?php echo base_url(); ?>index.php/jadwal/tambah" class="btn btn-primary btn-small">Tambah Data Jadwal</a>
</p>
<?php } ?>

<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelajaran</th>
			<th>Nama Guru</th>
			<th>Kelas</th>
			<th>Hari</th>
			<th>Waktu</th>
			<?php if ($this->session->userdata('level') == "1"){ ?> <th>AKSI</th> <?php } ?>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php
			$no = 1;
			foreach ($data->result() as $row) {
			?>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->nm_pelajaran ; ?></td>
			<td><?php echo $row->nm_guru ; ?></td>
			<td><?php echo $row->nm_kelas ; ?></td>
			<td><?php echo $row->hari ; ?></td>
			<td><?php echo $row->waktu ; ?></td>


			<?php if ($this->session->userdata('level') == "1"){ ?>
			<td>
				<a href="<?php echo base_url() ?>index.php/jadwal/edit/<?php echo $row->kd_jadwal; ?>">Edit |</a>
				<a href="<?php echo base_url() ?>index.php/jadwal/delete/<?php echo $row->kd_jadwal; ?>" onclick="return confirm('cuy yakin mau ngapus data ini?')">| Delete</a>
			</td>
			<?php } ?>

		</tr>
	<?php } ?>
	</tbody>
</table>
