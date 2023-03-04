<?Php
require "config.php";

$sql="SELECT informacje.KRS, informacje.REGON, informacje.BDO, informacje.stopka from informacje;"; 
$informacje_stopka=$dbo->prepare($sql);
$informacje_stopka->execute();
$stopka_result=$informacje_stopka->fetch(PDO::FETCH_ASSOC);
?>

