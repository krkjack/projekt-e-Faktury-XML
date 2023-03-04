<!doctype html>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/php/config.php';
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
  <link rel="stylesheet" href="css/styl.css">
</head>

<body>
		<ul class="topnav">
  <li><a href="/index">Generator</a></li>
  <li><a  class="active" href="/asortyment">Asortyment</a></li>
</ul><div class="main-wrapper">
	<div>
		<h3>Lista obecnego asortymentu:</h3>
		<table class="tg" border="1">
			<thead>
				<th class="tg-7iun0">ID</th>
				<th class="tg-7iun">Towar</th>
				<th class="tg-7iun">Cena</th>
				<th class="tg-7iun">Stawka VAT</th>
				<th class="tg-7iun1">Opis</th>
				<th class="tg-7iun">Akcja</th>
			</thead>
			<tbody>
				<?php
					$sth = $dbo->prepare("select * from asortyment");
					$sth->execute();
					while($row = $sth->fetch(PDO::FETCH_ASSOC)){
						?>
						<tr>
							<td class="tg-0pky1"><?php echo $row['id']; ?></td>
							<td class="tg-0pky1"><?php echo $row['towar']; ?></td>
							<td class="tg-0pky1"><?php echo $row['cena']; ?> zł</td>
							<td class="tg-0pky1">
								<?php
								switch ($row['stawki_vat_id']) {
									case 1:
										echo "23%";
										break;
									case 2:
										echo "8%";
										break;
									case 3:
										echo "5%";
										break;
									case 4:
										echo "0%";
										break;
									case 5:
										echo "3%";
										break;
									case 6:
										echo "4%";
										break;
									case 7:
										echo "7%";
										break;
									case 8:
										echo "22%";
										break;
									}
								?>	
							</td>
							<td class="tg-0pky1"><?php echo $row['opis']; ?></td>
							<td class="tg-0pky1">
								<a class="fa fa-edit fa-button" href="asortyment_edit.php?id=<?php echo $row['id']; ?>"> Edytuj</a><span>&nbsp;&nbsp;</span>
								<a class="fa fa-trash fa-button" onclick="setTimeout(function(){window.location.reload();},50);" href="php/asortyment_delete.php?id=<?php echo $row['id']; ?>"> Usuń</a>
							</td>
						</tr>
				<?php
					}
					?>
			</tbody>
		</table>
	</div>
		<div>
		<h3>Dodaj nowy produkt:</h3>
		<form method="POST" action="php/asortyment_add.php" onSubmit="setTimeout(function(){window.location.reload();},10);">
			<label>ID<span class="asterrisk">*</span></label> <input type="text" name="id">
			<label>Towar<span class="asterrisk">*</span></label> <input type="text" name="towar">
			<label>Cena<span class="asterrisk">*</span></label> <input type="text" name="cena">
			<label>Stawka VAT<span class="asterrisk">*</span></label> 
								<select name="stawki_vat_id">
								<option value="1">23%</option>
								<option value="2">8%</option>
								<option value="3">5%</option>
								<option value="4">0%</option>
								<option value="5">3%</option>
								<option value="6">4%</option>
								<option value="7">7%</option>
								<option value="8">2%</option>
								</select>
			<label>Opis</label> <input type="text" name="opis">
			<input type="submit" name="asortyment_add" value="Zatwierdź">
		</form>
	</div>
	</div>
</body>
</html>