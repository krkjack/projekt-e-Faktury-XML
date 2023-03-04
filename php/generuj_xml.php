<?php
include $_SERVER['DOCUMENT_ROOT'].'/php/get-info.php';
include $_SERVER['DOCUMENT_ROOT'].'/php/xsd_classes.php';
include $_SERVER['DOCUMENT_ROOT'].'/php/php_function.php';

$dom = new DOMDocument('1.0', 'utf-8');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;

// Tworzenie głownych tagów
$Faktura = $dom->createElement('Faktura');

// Ustawiamy namespace do dokumentu - według schematu
$xmlns = 'http://www.w3.org/2000/xmlns/';
$Faktura->setAttributeNS($xmlns, 'xmlns:etd', 'http://crd.gov.pl/xml/schematy/dziedzinowe/mf/2021/06/09/eD/DefinicjeTypy/');
$Faktura->setAttributeNS($xmlns, 'xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
$Faktura->setAttributeNS($xmlns, 'xmlns', 'http://crd.gov.pl/wzor/2021/11/29/11089/');

// Stwórz i dołącz Nagłówek do Faktury
$FA_naglowek = new FA_naglowek($dom, $_POST['naglowek_data']);
$FA_naglowek->attachToXML($Faktura);

// Stwórz Podmiot1
$FA_Podmiot1 = new FA_Podmiot($dom, "Podmiot1", $_POST['podmiot1_email'],$_POST['podmiot1_telefon'], null);

    // Stwórz i dołącz DaneIdentyfikacyjne do Podmiot1
$FA_DaneIdentyfikacyjne1 = new FA_DaneIdentyfikacyjne1($dom, $_POST['podmiot1_nip'],$_POST['podmiot1_pelnanazwa']);
$FA_DaneIdentyfikacyjne1->attachToXML($FA_Podmiot1->getPodmiotTag());

    // Stwórz i dołącz Adres1 do Podmiot1
$FA_Adres1 = new FA_Adres($dom);
$FA_AdresPol1 = new FA_AdresPol($dom, $_POST['podmiot1_kodkraju'],$_POST['podmiot1_ulica'],$_POST['podmiot1_nrdomu'],$_POST['podmiot1_nrlokalu'],$_POST['podmiot1_miejscowosc'],$_POST['podmiot1_kodpocztowy']);
$FA_AdresPol1->attachToXML($FA_Adres1->getAdresTag());
$FA_Adres1->attachToXML($FA_Podmiot1->getPodmiotTag());

    // Dołącz dodatkowe pola Podmiot1 do Faktury
$FA_Podmiot1->attachToXML($Faktura);

// Stwórz Podmiot2
$FA_Podmiot2 = new FA_Podmiot($dom,  "Podmiot2", $_POST['podmiot2_email'],$_POST['podmiot2_telefon'], $_POST['podmiot2_nrklienta']);

    // Stwórz i dołącz DaneIdentyfikacyjne do Podmiot1
$FA_DaneIdentyfikacyjne2 = new FA_DaneIdentyfikacyjne2($dom, $_POST['podmiot2_imiepierwsze'],$_POST['podmiot2_nazwisko']);
$FA_DaneIdentyfikacyjne2->attachToXML($FA_Podmiot2->getPodmiotTag());

    // Stwórz i dołącz Adres2 do Podmiot2
$FA_Adres2 = new FA_Adres($dom, $_POST['podmiot1_email'],$_POST['podmiot1_telefon'], $_POST['podmiot2_nrklienta']);
$FA_AdresPol2 = new FA_AdresPol($dom, $_POST['podmiot2_kodkraju'],$_POST['podmiot2_ulica'],$_POST['podmiot2_nrdomu'],$_POST['podmiot2_nrlokalu'],$_POST['podmiot2_miejscowosc'],$_POST['podmiot2_kodpocztowy']);
$FA_AdresPol2->attachToXML($FA_Adres2->getAdresTag());
$FA_Adres2->attachToXML($FA_Podmiot2->getPodmiotTag());

    // Dołącz dodatkowe pola Podmiot2 do Faktury
$FA_Podmiot2->attachToXML($Faktura);

// Stwórz kolumnę Fa składającą się z Adnotacje i DodatkowyOpis
$FA_Adnotacje = new FA_Adnotacje($dom, $_POST['fa_p_16'],$_POST['fa_p_17'], $_POST['fa_p_18'], $_POST['fa_p_18a'], $_POST['fa_p_19'], $_POST['fa_p_22'], $_POST['fa_p_23'], $_POST['fa_p_pmarzy']);
$FA_DodatkowyOpis = new FA_DodatkowyOpis($dom, $_POST['fa_opis_klucz'], $_POST['fa_opis_wartosc']);
$FA_Fa = new FA_Fa($dom, $_POST['fa_kodwaluty'], $_POST['fa_datawystawienia'], $_POST['fa_miejscewystawienia'], $_POST['fa_numerfaktury'],  $_POST['fa_datadokonania'], $_POST['wiersz_wartosc_netto_all'], $_POST['wiersz_kwota_vat_all'], $_POST['wiersz_dozaplaty'], $FA_Adnotacje->GetFaAdnotacjeTag(), $_POST['fa_rodzajfaktury'], "1", $FA_DodatkowyOpis->getDodatkowyOpisTag());

// Dołącz DodatkowyOpis do Fa
$FA_DodatkowyOpis->attachToXML($FA_Fa->getFaTag());

// Stwórz Wiersze oraz pojedyńczy Wiersz faktury
$FA_Wiersz = new FA_Wiersz($dom, sizeof($_POST['wiersz_towar']), $_POST['wiersz_towar'], $_POST['wiersz_jm'], $_POST['wiersz_ilosc'], $_POST['wiersz_cena_netto'], $_POST['wiersz_wartosc_netto'], $_POST['wiersz_stawka_vat']);
$FA_Wiersze = new FA_Wiersze($dom, sizeof($_POST['wiersz_towar']), $_POST['wiersz_wartosc_netto_all']);
$FA_NrRBPL = new FA_NrRBPL($dom, $_POST['fa_nrrachunkubankowego']);
$FA_Platnosc = new FA_Platnosc($dom,$_POST['fa_datazaplaty_checkbox'],$_POST['fa_datazaplaty'], $_POST['fa_formaplatnosci'], $FA_NrRBPL->getNrRBPLTag());
$FA_Zamowienia = new FA_Zamowienia($dom, $_POST['fa_datazamowienia_checkbox'], $_POST['fa_datazamowienia'], $_POST['fa_nrzamowienia']);
$FA_WarunkiTransakcji = new FA_WarunkiTransakcji($dom, $FA_Zamowienia->getZamowieniaTag());

// Stwórz stopkę
$FA_Stopka = new FA_Stopka($dom);
$FA_Stopka_Informacje = new FA_Stopka_Informacje($dom, $stopka_result['stopka']); 
$FA_Stopka_Rejestry = new FA_Stopka_Rejestry($dom, $stopka_result['KRS'], $stopka_result['REGON'], $stopka_result['BDO']);

// Sklejanie całości
$FA_Fa->attachToXML($Faktura);
$FA_Wiersze->attachToXML($FA_Fa->getFaTag());
$FA_Wiersz->attachToXML($FA_Wiersze->getFaWierszeTag());
$FA_Platnosc->attachToXML($FA_Fa->getFaTag());
$FA_WarunkiTransakcji->attachToXML($FA_Fa->getFaTag());
$FA_Stopka_Informacje->attachToXML($FA_Stopka->getStopkaTag());
$FA_Stopka_Rejestry->attachToXML($FA_Stopka->getStopkaTag());
$FA_Stopka->attachToXML($Faktura);

// Sklej całość do dom, wygeneruj kolejną nazwę i zapisz
$dom->appendChild($Faktura);
$faktura_data = date("Y-m", strtotime($_POST['fa_datawystawienia']));
$sciezka = '..\faktury/FV_'.$faktura_data."_".genNextFakturaIndex($faktura_data).'.xml';
$dom->save($sciezka);

// Pobieramy plik w przeglądarce
$file = $sciezka;
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
	ob_clean();
	flush();
    readfile($file);
    exit;
}