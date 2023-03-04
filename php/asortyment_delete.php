    <?php
    	$id=$_GET['id'];
		include $_SERVER['DOCUMENT_ROOT'].'/php/config.php';
		$query = $dbo->prepare("delete from asortyment where id='$id'");
		$query->execute();
		
		$query_getAUTO = $dbo->prepare("SELECT MAX(asortyment.id) FROM asortyment");
		$query_getAUTO->execute();
		$id_AUTO=$query_getAUTO->fetchColumn();
		$id_AUTO=$id_AUTO+1;
		print_r($id_AUTO);
		$query_finish = $dbo->prepare("ALTER TABLE asortyment AUTO_INCREMENT = $id_AUTO");
		$query_finish->execute();
    	header("Location: ".$_SERVER['DOCUMENT_ROOT']."asortyment.php");
    ?>