<script type="text/javascript">
	function cekform()
	{
		if(!$("#kode").val())
		{
			alert('Kode harus diisi');
			$('#kode').focus()
			return false;
		}
		
		if(!$("#pelajaran").val())
		{
			alert('Nama pelajaran harus diisi');
			$('#pelajaran').focus()
			return false;
		}

		if(!$("#bobot").val())
		{
			alert('Bobot harus diisi');
			$('#bobot').focus()
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

<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/pelajaran/simpan" onsubmit="return cekform();">
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Kode Pelajaran</label>
		<div class="col-sm-3">
			<input type="text" name="kode" id="kode" placeholder="Kode Pelajaran" class="form-control" value="<?php echo $kode; ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Nama Pelajaran</label>
		<div class="col-sm-3">
			<input type="text" name="pelajaran" id="pelajaran" placeholder="Nama Pelajaran" pattern="^[A-Za-z -]+$" class="form-control" value="<?php echo $pelajaran; ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Bobot</label>
		<div class="col-sm-3">
			<input type="text" name="bobot" id="bobot" placeholder="Ex: Masukan bobot (1-5)" pattern="[1-5]" class="form-control" value="<?php echo $bobot; ?>">
		</div>
	</div>
<div>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	<button type="submit" class="btn btn-primary btn small">Simpan</button>
	<a href="<?php echo base_url(); ?>index.php/pelajaran" class="btn btn-default">Tutup</a>
</div>
</form>