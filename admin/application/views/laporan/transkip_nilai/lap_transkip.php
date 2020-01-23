<form method="post" action="">

	<p>
	<div class="form-group row">
			<label class="col-sm-2 col-form-label">Masukan NIS</label>
			<div class="col-sm-3">
				<input type="text" name="nis" id="nis" placeholder="NIS" value="" class="form-control">
			</div>
			<input type="submit" class="btn btn-primary btn-small" value="Pilih"/>
	</p>
	</div>


</form>

<?php
include "koneksi.php";

$sql = "SELECT siswa.*, kelas.nm_kelas AS nama_kelas, guru.nm_guru AS nama_wali
 		 		FROM siswa
 		 		INNER JOIN kelas, guru
 		 		WHERE siswa.kd_kelas = kelas.kd_kelas AND kelas.nip = guru.nip AND nis = '$_POST[nis]'";
$q = mysql_query( $sql );
$data = mysql_fetch_array( $q );

?>

<div class="row">
  <div class="col-sm-6">
  	<p>NIS :
      <?php echo $data["nis"]; ?>
    </p>
    <p>Nama :
      <?php echo $data["nm_siswa"]; ?>
    </p>
    <p>Jenis Kelamin :
      <?php echo $data["jenis_kelamin"]; ?>
    </p>
    <p>Tempat, Tanggal Lahir :
      <?php echo $data["tempat_lahir"] . " " . date("d-m-Y", strtotime($data["tanggal_lahir"])); ?>
    </p>
  </div>
  <div class="col-sm-6">
    <p>Kelas :
      <?php echo $data["nama_kelas"]; ?>
    </p>
    <p>Wali Kelas :
      <?php echo $data["nama_wali"]; ?>
    </p>
  </div>
</div>

<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelajaran</th>
			<th>Bobot</th>
			<th>Nama Guru</th>
			<th>Nilai Tugas</th>
			<th>Nilai UTS</th>
			<th>Nilai UAS</th>
			<th>Nilai</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php
			$no = 1;
			if ( isset( $_POST[ 'nis' ] ) ) {
				$sql = "SELECT * FROM nilai
								INNER JOIN mata_pelajaran, guru
								WHERE mata_pelajaran.kd_pelajaran = nilai.kd_pelajaran AND guru.nip = nilai.nip AND nis = '$_POST[nis]'";
				$q = mysql_query( $sql );
				$rataNilai = 0;
				$jumlahNilai = mysql_num_rows($q);
				while ( $data = mysql_fetch_array( $q ) ) {
					?>
			<td>
				<?php echo $no++; ?>
			</td>
			<td>
				<?php echo $data["nm_pelajaran"] ; ?>
			</td>
			<td>
				<?php echo $data["bobot"] ; ?>
			</td>
			<td>
				<?php echo $data["nm_guru"] ; ?>
			</td>
			<td>
				<?php echo $data["tugas"]; ?>
			</td>
			<td>
				<?php echo $data["uts"] ; ?>
			</td>
			<td>
				<?php echo $data["uas"] ; ?>
			</td>
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
}
	 ?>
	</tbody>
</table>

<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nilai rata-rata</label>
			<div class="col-sm-3">
				<input type="text" name="nilai" id="nilai" placeholder="Nilai" class="form-control" disabled="disabled" value="<?php echo number_format(($rataNilai / $jumlahNilai), 2, ",", "."); ?>">
	</div>
</div>
