<form method="post" action="">
<p><div class="form-group row">
		<label class="col-sm-2 col-form-label">Kelas</label>
		<div class="col-sm-3">
			<select name="kd_kelas" id="kd_kelas" class="form-control">
				<option value="" > Pilih Kelas..... </option>
				 <?php
				 include "koneksi.php";
				 $a="SELECT * FROM kelas";
				 $sql=mysql_query($a);
				 while($data=mysql_fetch_array($sql)){
				 ?>
				<option value="<?php echo $data['kd_kelas']?>"><?php echo $data['nm_kelas']?></option>
			<?php } ?>
			</select>

		</div>
		<input type="submit"  class="btn btn-primary btn-small" value="Pilih" />
</p></div>
 </form>

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

<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Siswa</th>
			<th>Kelas</th>
			<th>Nama Pelajaran</th>
			<th>Bobot</th>
			<th>Nama Guru</th>
			<th>Tugas</th>
			<th>UTS</th>
			<th>UAS</th>
			<th>Nilai</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			 <?php
			 $no = 1;
			 include "koneksi.php";
			 if(isset($_POST['kd_kelas'])){
			 $sql = "SELECT
						siswa.nm_siswa,
						kelas.nm_kelas,
						mata_pelajaran.nm_pelajaran,
						mata_pelajaran.bobot,
						guru.nm_guru,
						nilai.tugas,
						nilai.uts,
						nilai.uas
						FROM
						nilai ,
						mata_pelajaran ,
						siswa ,
						guru ,
						kelas
						WHERE
						nilai.kd_pelajaran = mata_pelajaran.kd_pelajaran AND
						nilai.nis = siswa.nis AND
						siswa.kd_kelas = kelas.kd_kelas AND
						nilai.nip = guru.nip AND
						siswa.kd_kelas = ".$_POST['kd_kelas'];

 			 $q = mysql_query($sql);


			 while($data = mysql_fetch_array($q)){

			 ?>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data[nm_siswa] ; ?></td>
			<td><?php echo $data[nm_kelas] ; ?></td>
			<td><?php echo $data[nm_pelajaran] ; ?></td>
			<td><?php echo $data[bobot] ; ?></td>
			<td><?php echo $data[nm_guru] ; ?></td>
			<td><?php echo $data[tugas] ; ?></td>
			<td><?php echo $data[uts] ; ?></td>
			<td><?php echo $data[uas] ; ?></td>
			<td>
				<?php
					$rataTugas = $data["tugas"] * 20 /100;
					$rataUts = $data["uts"] * 30 / 100;
					$rataUas = $data["uas"] * 50 / 100;
					$rata = $rataTugas + $rataUts + $rataUas;
					$rataNilai += $rata;

					echo $rata;
				?>
			</td>

		</tr>
	<?php }
	} ?>
	</tbody>
</table>
