<script type="text/javascript">
	function cekform()
	{
		if(!$("#kode").val())
		{
			alert('Kode siswa harap diisi');
			$('#kode').focus()
			return false;
		}
		
		if(!$("#username").val())
		{
			alert('username harus harap diisi');
			$('#username').focus()
			return false;
		}

			if(!$("#pass").val())
		{
			alert('Password harus harap diisi');
			$('#pass').focus()
			return false;
		}

		if(!$("#nama").val())
		{
			alert('Nama harap diisi');
			$('#nama').focus()
			return false;
		}

		if(!$("#level").val())
		{
			alert('Level harus diisi');
			$('#level').focus()
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

<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/user/simpan" onsubmit="return cekform();">
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Kode User</label>
		<div class="col-sm-3">
			<input type="text" name="kode" id="kode" placeholder="NIP/NIS" maxlength="18" pattern="^(0|[0-9][0-9]*)$" class="span1" value="<?php echo $kode; ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Username</label>
		<div class="col-sm-3">
			<input type="text" name="username" id="username" placeholder="Username"pattern="[A-Za-z]*" class="form-control" value="<?php echo $username; ?>">
		</div>
	</div>

	
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-3">
			<input type="text" name="pass" id="pass" placeholder="Password" maxlength="12" class="form-control" value="<?php echo $pass; ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Nama User</label>
		<div class="col-sm-3">
			<input type="text" name="nama" id="nama" placeholder="Nama User" pattern="^[A-Za-z -]+$" class="form-control" value="<?php echo $nama; ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Level</label>
		<div class="col-sm-3">
			<input type="text" name="level" id="level" placeholder="Ex: Masukan level (1-3)" pattern="[1-3]" maxlength="1" class="form-control"value="<?php echo $level; ?>">
		</div>
	</div>


	</div>

<br>

<div>
	&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; 
	<button type="submit" class="btn btn-primary btn small">Simpan</button>
	<a href="<?php echo base_url(); ?>index.php/user" class="btn btn-default">Tutup</a>
</div>


</form>