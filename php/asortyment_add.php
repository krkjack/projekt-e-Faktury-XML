    <?php
		include $_SERVER['DOCUMENT_ROOT'].'/php/config.php';
		$id=$_POST['id'];
		$towar=$_POST['towar'];
		$cena=$_POST['cena'];
		$opis=$_POST['opis'];
		$stawki_vat_id=$_POST['stawki_vat_id'];
		$query = $dbo->prepare("insert into asortyment (id, towar, cena, stawki_vat_id, opis) values ('$id','$towar','$cena','$stawki_vat_id','$opis')");
		$query->execute();
    	header("Location: ".$_SERVER['DOCUMENT_ROOT']."asortyment.php");
    ?>