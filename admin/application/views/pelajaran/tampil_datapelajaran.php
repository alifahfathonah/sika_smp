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


<?php if ($this->session->userdata('level') == "1"){ ?>
<p>
<a href="<?php echo base_url(); ?>index.php/pelajaran/tambah" class="btn btn-primary btn-small">Tambah Data Pelajaran</a>
</p>
<?php } ?>

<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th class ="center" >Kode</th>
			<th>Nama Pelajaran</th>
			<th>Bobot</th>
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
			<td><?php echo $row->kd_pelajaran ; ?></td>
			<td><?php echo $row->nm_pelajaran ; ?></td>
			<td><?php echo $row->bobot ; ?></td>

			<?php if ($this->session->userdata('level') == "1"){ ?>
			<td> 
				<a href="<?php echo base_url() ?>index.php/pelajaran/edit/<?php echo $row->kd_pelajaran; ?>">Edit |</a>
				<a href="<?php echo base_url() ?>index.php/pelajaran/delete/<?php echo $row->kd_pelajaran; ?>" onclick="return confirm('Apakah anda yakin mau hapus data ini?')">| Delete</a>
			</td>
				<?php } ?>

		</tr>
	<?php } ?>
	</tbody>
</table>