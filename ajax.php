<?php

	include 'connect.php';
	if($_POST['type'] == ""){
		$sql = "SELECT * FROM sehirler";

		$sehirsor=$db->prepare("SELECT * from sehirler");
		$sehirsor->execute();
		
		$str = "";
		while($sehircek=$sehirsor->fetch(PDO::FETCH_ASSOC)){
		  $str .= "<option value='{$sehircek['SehirId']}'>{$sehircek['SehirAdi']}</option>";
		}
	}else if($_POST['type'] == "stateData"){

		$vdsor=$db->prepare("SELECT * FROM vergi_daireleri WHERE Plaka = {$_POST['id']}");
		$vdsor->execute();
		
		$str = "";
		while($vdcek=$vdsor->fetch(PDO::FETCH_ASSOC)){
		  $str .= "<option value='{$vdcek['Plaka']}'>{$vdcek['VergiDairesiMudurluguAdi']}</option>";
		}
	}

	echo $str;
 ?>
