<?php

include ('koneksi.php');	

$nama  = $_POST['nama'];
$subject = $_POST['subject'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$input = mysql_query ("INSERT INTO contact (id ,nama , subject, email, pesan)
VALUES ('','$nama','$subject','$email','$pesan')");		
	
	if ($input){
		echo '<script language="javascript">alert("Pesan terkirim")</script>';
		echo '<script language="javascript">window.location = "index.php?page=contact"</script>';
	} else {
		echo '<script language="javascript">alert("Pesan gagal dikirim")</script>';
		echo '<script language="javascript">window.location = "?page=contact"</script>';
	}
?>