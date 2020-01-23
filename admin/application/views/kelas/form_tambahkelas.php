<script type="text/javascript">
	function cekform()
	{
		if(!$("#kode").val())
		{
			alert('Kode kelas harus diisi');
			$('#kode').focus()
			return false;
		}
		
		if(!$("#kelas").val())
		{
			alert('Kelas harus diisi');
			$('#kelas').focus()
			return false;
		}

		if(!$("#nip").val())
		{
			alert('NIP harus diisi');
			$('#nip').focus()
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

<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/kelas/simpan" onsubmit="return cekform();">
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Kode Kelas</label>
		<div class="col-sm-3">
			<input type="text" name="kode" id="kode" maxlength="5" placeholder="Kode Kelas" class="form-control" value="<?php echo $kode; ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Kelas</label>
		<div class="col-sm-3">
			<input type="text" name="kelas" id="kelas" maxlength="5" placeholder="Kelas"  pattern = "^[a-zA-Z0-9-]*$" class="form-control" value="<?php echo $kelas; ?>">
		</div>
	</div>


	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Wali Kelas</label>
		<div class="col-sm-3">
			<select name="nip" id="nip" class="form-control">
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
	<br>

<div>
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
	<button type="submit" class="btn btn-primary btn small">Simpan</button>
	<a href="<?php echo base_url(); ?>index.php/kelas" class="btn btn-default">Tutup</a>
</div>
</form>