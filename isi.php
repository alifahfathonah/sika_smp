<?php
	if(isset($_GET['page'])){
		$page=htmlentities($_GET['page']);
	}else{
		$page="home";
	}
		switch($page){
		
			case "welcome";
			include "welcome.php";
			break;
			
			case "profil";
			include "profil.php";
			break;

			case "kurikulum";
			include "kurikulum.php";
			break;
			
			case "gallery";
			include "gallery.php";
			break;
						
			case "contact";
			include "contact.php";
			break;
		
			default;
			include "welcome.php";
			break;
			
			
		}
?>