<?Php
require "config.php";

$row=$dbo->prepare("SELECT asortyment.towar, asortyment.cena, stawka FROM asortyment JOIN stawki_vat ON asortyment.stawki_vat_id=stawki_vat.id;");
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(array('data'=>$result));
?>

