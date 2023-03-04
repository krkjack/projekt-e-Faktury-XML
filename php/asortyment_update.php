    <?php
		include $_SERVER['DOCUMENT_ROOT'].'/php/config.php';
     
		$id=$_POST['id'];
		$towar=$_POST['towar'];
		$cena=$_POST['cena'];
		$opis=$_POST['opis'];
		$stawki_vat_id=$_POST['stawki_vat_id'];
     	$query = $dbo->prepare("update asortyment set towar='$towar',cena='$cena',stawki_vat_id='$stawki_vat_id', opis='$opis' where id='$id'");
		$query->execute();
    	header("Location: ".$_SERVER['DOCUMENT_ROOT']."asortyment.php");
    ?>