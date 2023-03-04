<!doctype html>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/php/config.php';

	$id=$_GET['id'];
    $query = $dbo->prepare("select * from asortyment where id='$id'");
	$query->execute();
	$row = $query->fetch(PDO::FETCH_ASSOC)
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="res/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <title>Asortyment - panel</title>
  <meta name="description" content="Generator faktur XML wg. schematu XSD.">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  
  <link rel="apple-touch-icon" sizes="57x57" href="res/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="res/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="res/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="res/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="res/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="res/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="res/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="res/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="res/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="res/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="res/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="res/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="res/favicon-16x16.png">
  <link rel="manifest" href="res/manifest.json">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="css/styl_asortyment.css">
</head>

<body>
	<h3>Edytuj wpis</h3>
	<form method="POST" action="php/asortyment_update.php?id=<?php echo $id; ?>">
		<label>ID<span class="asterrisk">*</span></label> <input type="text" value="<?php echo $row['id']; ?>" name="id">
		<label>Towar<span class="asterrisk">*</span></label> <input type="text" value="<?php echo $row['towar']; ?>" name="towar">
		<label>Cena<span class="asterrisk">*</span></label> <input type="text" value="<?php echo $row['cena']; ?>" name="cena">
		<label>Stawka VAT<span class="asterrisk">*</span></label>
			<select  name="stawki_vat_id" selected="<?php echo $row['stawka']; ?>">
								<option value="1">23%</option>
								<option value="2">8%</option>
								<option value="3">5%</option>
								<option value="4">0%</option>
								<option value="5">3%</option>
								<option value="6">4%</option>
								<option value="7">7%</option>
								<option value="8">2%</option>
			</select> 
		<label>Opis</label> <input type="text" value="<?php echo $row['opis']; ?>" name="opis">
		<input type="submit" name="submit" value="Zatwierdź"><br/><br/>
		<a class="fa fa-arrow-left fa-button" href="asortyment.php">Wróć</a>
	</form>
</body>
</html>
</body>
</html>