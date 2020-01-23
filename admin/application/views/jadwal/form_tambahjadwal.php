<script type="text/javascript">
	function cekform()
	{
		if(!$("#kode").val())
		{
			alert('Kode jadwal harus diisi cuy');
			$('#kode').focus()
			return false;
		}

		if(!$("#pelajaran").val())
		{
			alert('Pelajaran harus diisi cuy');
			$('#pelajaran').focus()
			return false;
		}


		if(!$("#guru").val())
		{
			alert('Guru harus diisi cuy');
			$('#guru').focus()
			return false;
		}

		if(!$("#kelas").val())
		{
			alert('Kelas harus diisi cuy');
			$('#tanggal_l').focus()
			return false;
		}

		if(!$("#hari").val())
		{
			alert('Hari harus diisi cuy');
			$('#hari').focus()
			return false;
		}

		if(!$("#waktu").val())
		{
			alert('Waktu harus diisi cuy');
			$('#waktu').focus()
			return false;
		}


	}

</script>


<?php
$info = $this->session->flashdata('info');
if(!empty($info))
{
	echo $info;
}
?>

<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/jadwal/simpan" onsubmit="return cekform();">
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Kode Jadwal</label>
		<div class="col-sm-3">
			<input type="text" name="kode" id="kode" placeholder="Kode Jadwal" class="form-control" value="<?php echo $kode; ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Pelajaran</label>
		<div class="col-sm-3">
			<select name="pelajaran" id="pelajaran" class="form-control">
				<option value="" > Pilih Pelajaran..... </option>
				<?php
				$pelajaran = $this->db->get('mata_pelajaran');
				foreach ($pelajaran->result() as $row) {


				?>
				<option value="<?php echo $row->kd_pelajaran; ?>"><?php echo $row->nm_pelajaran; ?></option>
			<?php } ?>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Guru</label>
		<div class="col-sm-3">
			<select name="guru" id="guru" class="form-control">
				<option value="" > Pilih Guru..... </option>
				<?php
				$guru = $this->db->get('guru');
				foreach ($guru->result() as $row) {


				?>
				<option value="<?php echo $row->nip; ?>"><?php echo $row->nm_guru; ?></option>
			<?php } ?>
			</select>
		</div>
	</div>

			<div class="form-group row">
		<label class="col-sm-2 col-form-label">Kelas</label>
		<div class="col-sm-3">
			<select name="kelas" id="kelas" class="form-control">
				<option value="" > Pilih Kelas..... </option>
				<?php
				$kelas = $this->db->get('kelas');
				foreach ($kelas->result() as $row) {


				?>
				<option value="<?php echo $row->kd_kelas; ?>"><?php echo $row->nm_kelas; ?></option>
			<?php } ?>
			</select>
		</div>
		</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Hari</label>
		<div class="col-sm-3">
			 <select name="hari" id="hari" class="form-control">
			 	<option value=""> Pilih Hari </option>
			  	<option value="<?php echo $hari = 'Senin'; ?>">Senin</option>
			  	<option value="<?php echo $hari = 'Selasa'; ?>">Selasa</option>
			  	<option value="<?php echo $hari = 'Rabu'; ?>">Rabu</option>
			  	<option value="<?php echo $hari = 'Kamis'; ?>">Kamis</option>
			  	<option value="<?php echo $hari = 'Jumat'; ?>">Jumat</option>
			  	<option value="<?php echo $hari = 'Sabtu'; ?>">Sabtu</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Waktu</label>
		<div class="col-sm-3">
			 <select name="waktu" id="waktu" class="form-control">
			 	<option value=""> Pilih Waktu.... </option>
			  	<option value="<?php echo $waktu = '07.00 - 07.40'; ?>">07.00 - 07.40</option>
			  	<option value="<?php echo $waktu = '07.40 - 08.20'; ?>">07.40 - 08.20</option>
			  	<option value="<?php echo $waktu = '08.20 - 09.00'; ?>">08.20 - 09.00</option>
			  	<option value="<?php echo $waktu = '09.00 - 09.40'; ?>">09.00 - 09.40</option>
			  	<option value="<?php echo $waktu = '09.40 - 10.10'; ?>">09.40 - 10.10</option>
			  	<option value="<?php echo $waktu = '10.10 - 11.40'; ?>">10.10 - 10.40</option>
			  	<option value="<?php echo $waktu = '12.40 - 13.20'; ?>">12.40 - 13.20</option>
			  	<option value="<?php echo $waktu = '13.20 - 14.00'; ?>">13.20 - 14.00</option>
			  	<option value="<?php echo $waktu = '14.00 - 15.00'; ?>">14.00 - 14.40</option>
			  	<option value="<?php echo $waktu = '15.20 - 16.40'; ?>">15.20 - 16.40</option>
			</select>
		</div>
	</div>


	</div>
<div>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	<button type="submit" class="btn btn-primary btn small">Simpan</button>
	<a href="<?php echo base_url(); ?>index.php/jadwal" class="btn btn-default">Tutup</a>
</div>

</form>
