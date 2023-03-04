 <?php
class FA_naglowek {
    private $NaglowekTag;
    private $KodFormularza;
    private $WariantFormularza;
    private $DataWytworzeniaFa;
    private $SystemInfo;
    
    public function __construct($dom, $data) {
        $this->NaglowekTag       = $dom->createElement('Naglowek');
        $this->KodFormularza     = $dom->createElement('KodFormularza', 'FA');
        $this->WariantFormularza = $dom->createElement('WariantFormularza', '1');
        $this->DataWytworzeniaFa = $dom->createElement('DataWytworzeniaFa', $data);
        $this->SystemInfo        = $dom->createElement('SystemInfo', 'Samplofaktur');
        $kodSystemowy            = $dom->createAttribute('kodSystemowy');
        $kodSystemowy->value     = 'FA (1)';
        $wersjaSchemy            = $dom->createAttribute('wersjaSchemy');
        $wersjaSchemy->value     = '1-0E';
        $this->KodFormularza->appendChild($kodSystemowy);
        $this->KodFormularza->appendChild($wersjaSchemy);
    }
    
    public function attachToXML($tree) {
        $this->NaglowekTag->appendChild($this->KodFormularza);
        $this->NaglowekTag->appendChild($this->WariantFormularza);
        $this->NaglowekTag->appendChild($this->DataWytworzeniaFa);
        $this->NaglowekTag->appendChild($this->SystemInfo);
        $tree->appendChild($this->NaglowekTag);
    }
    
    public function setKodFormularza($qualifiedName, $value, $namespace = "") {
        $this->KodFormularza = new DOMElement($qualifiedName, $value, $namespace = "");
    }
    public function setWariantFormularza($qualifiedName, $value, $namespace = "") {
        $this->WariantFormularza = new DOMElement($qualifiedName, $value, $namespace = "");
    }
    public function setDataWytworzeniaFa($qualifiedName, $value, $namespace = "") {
        $this->DataWytworzeniaFa = new DOMElement($qualifiedName, $value, $namespace = "");
    }
    public function setSystemInfo($qualifiedName, $value, $namespace = "") {
        $this->SystemInfo = new DOMElement($qualifiedName, $value, $namespace = "");
    }
    public function getKodFormularza() {
        return $this->KodFormularza;
    }
    
    public function getWariantFormularza() {
        return $this->WariantFormularza;
    }
    
    public function getDataWytworzeniaFa() {
        return $this->DataWytworzeniaFa;
    }
    
    public function getSystemInfo() {
        return $this->SystemInfo;
    }
}
class FA_DaneIdentyfikacyjne1 {
    private $DaneIdentyfikacyjneTag;
    private $NIP;
    private $PelnaNazwa;
    
    public function __construct($dom, $NIP, $PelnaNazwa) {
        $this->DaneIdentyfikacyjneTag = $dom->createElement('DaneIdentyfikacyjne');
        $this->NIP                    = $dom->createElement('NIP', $NIP);
        $this->PelnaNazwa             = $dom->createElement('PelnaNazwa', $PelnaNazwa);
    }
    
    public function attachToXML($tree) {
        $this->DaneIdentyfikacyjneTag->appendChild($this->NIP);
        $this->DaneIdentyfikacyjneTag->appendChild($this->PelnaNazwa);
        $tree->appendChild($this->DaneIdentyfikacyjneTag);
    }
    public function setNIP($qualifiedName, $value, $namespace = "") {
        $this->NIP = new DOMElement($qualifiedName, $value, $namespace = "");
    }
    public function setPelnaNazwa($qualifiedName, $value, $namespace = "") {
        $this->PelnaNazwa = new DOMElement($qualifiedName, $value, $namespace = "");
    }
    
    public function getNIP() {
        return $this->NIP;
    }
    
    public function getPelnaNazwa() {
        return $this->PelnaNazwa;
    }
}

class FA_DaneIdentyfikacyjne2 {
    private $DaneIdentyfikacyjneTag;
    private $BrakID;
    private $ImiePierwsze;
    private $Nazwisko;
    
    public function __construct($dom, $ImiePierwsze, $Nazwisko) {
        $this->DaneIdentyfikacyjneTag = $dom->createElement('DaneIdentyfikacyjne');
        $this->BrakID                 = $dom->createElement('BrakID', '1');
        $this->ImiePierwsze           = $dom->createElement('ImiePierwsze', $ImiePierwsze);
        $this->Nazwisko               = $dom->createElement('Nazwisko', $Nazwisko);
    }
    
    public function attachToXML($tree) {
        $this->DaneIdentyfikacyjneTag->appendChild($this->BrakID);
        $this->DaneIdentyfikacyjneTag->appendChild($this->ImiePierwsze);
        $this->DaneIdentyfikacyjneTag->appendChild($this->Nazwisko);
        $tree->appendChild($this->DaneIdentyfikacyjneTag);
    }
    public function setImiePierwsze($qualifiedName, $value, $namespace = "") {
        $this->ImiePierwsze = new DOMElement($qualifiedName, $value, $namespace = "");
    }
    public function setNazwisko($qualifiedName, $value, $namespace = "") {
        $this->Nazwisko = new DOMElement($qualifiedName, $value, $namespace = "");
    }
    
    public function getImiePierwsze() {
        return $this->NIP;
    }
    
    public function getNazwisko() {
        return $this->PelnaNazwa;
    }
}
class FA_AdresPol {
    private $AdresPolTag;
    private $KodKraju;
    private $Ulica = null;
    private $NrDomu;
    private $NrLokalu = null;
    private $Miejscowosc;
    private $KodPocztowy;
    public function __construct($dom, $KodKraju, $Ulica = null, $NrDomu, $NrLokalu = null, $Miejscowosc, $KodPocztowy) {
        $this->AdresPolTag = $dom->createElement('AdresPol');
        $this->KodKraju    = $dom->createElement('KodKraju', $KodKraju);
        if ($Ulica != null) {
            $this->Ulica = $dom->createElement('Ulica', $Ulica);
        }
        $this->NrDomu = $dom->createElement('NrDomu', $NrDomu);
        if ($NrLokalu != null) {
            $this->NrLokalu = $dom->createElement('NrLokalu', $NrLokalu);
        }
        $this->Miejscowosc = $dom->createElement('Miejscowosc', $Miejscowosc);
        $this->KodPocztowy = $dom->createElement('KodPocztowy', $KodPocztowy);
    }
    public function attachToXML($tree) {
        $this->AdresPolTag->appendChild($this->KodKraju);
        if ($this->Ulica != null) {
            $this->AdresPolTag->appendChild($this->Ulica);
        }
        $this->AdresPolTag->appendChild($this->NrDomu);
        if ($this->NrLokalu != null) {
            $this->AdresPolTag->appendChild($this->NrLokalu);
        }
        $this->AdresPolTag->appendChild($this->Miejscowosc);
        $this->AdresPolTag->appendChild($this->KodPocztowy);
        $tree->appendChild($this->AdresPolTag);
    }
    public function getAdresPolTag() {
        return $this->AdresPolTag;
    }
    
    public function setAdresPolTag($AdresPolTag) {
        $this->AdresPolTag = $AdresPolTag;
    }
    
    public function getKodKraju() {
        return $this->KodKraju;
    }
    
    public function setKodKraju($KodKraju) {
        $this->KodKraju = $KodKraju;
    }
    
    public function getUlica() {
        return $this->Ulica;
    }
    
    public function setUlica($Ulica) {
        $this->Ulica = $Ulica;
    }
    
    public function getNrDomu() {
        return $this->NrDomu;
    }
    
    public function setNrDomu($NrDomu) {
        $this->NrDomu = $NrDomu;
    }
    
    public function getNrLokalu() {
        return $this->NrLokalu;
    }
    
    public function setNrLokalu($NrLokalu) {
        $this->NrLokalu = $NrLokalu;
    }
    
    public function getMiejscowosc() {
        return $this->Miejscowosc;
    }
    
    public function setMiejscowosc($Miejscowosc) {
        $this->Miejscowosc = $Miejscowosc;
    }
    
    public function getKodPocztowy() {
        return $this->KodPocztowy;
    }
    
    public function setKodPocztowy($KodPocztowy) {
        $this->KodPocztowy = $KodPocztowy;
    }
}
class FA_Podmiot {
    private $PodmiotTag;
    private $Email = null;
    private $Telefon = null;
    private $NrKlienta = null;
    public function __construct($dom, $PodmiotTag, $Email = null, $Telefon = null, $NrKlienta = null) {
        $this->PodmiotTag = $dom->createElement($PodmiotTag);
        if ($Email != null) {
            $this->Email = $dom->createElement('Email', $Email);
        }
        if ($Telefon != null) {
            $this->Telefon = $dom->createElement('Telefon', $Telefon);
        }
        if ($NrKlienta != null) {
            $this->NrKlienta = $dom->createElement('NrKlienta', $NrKlienta);
        }
    }
    public function attachToXML($tree) {
        if ($this->Email != null) {
            $this->PodmiotTag->appendChild($this->Email);
        }
        if ($this->Telefon != null) {
            $this->PodmiotTag->appendChild($this->Telefon);
        }
        if ($this->NrKlienta != null) {
            $this->PodmiotTag->appendChild($this->NrKlienta);
        }
        $tree->appendChild($this->PodmiotTag);
        
    }
    public function getPodmiotTag() {
        return $this->PodmiotTag;
    }
    
    public function setPodmiotTag($PodmiotTag) {
        $this->PodmiotTag = $PodmiotTag;
    }
    
    public function getEmail() {
        return $this->Email;
    }
    
    public function setEmail($Email) {
        $this->Email = $Email;
    }
    
    public function getTelefon() {
        return $this->Telefon;
    }
    
    public function setTelefon($Telefon) {
        $this->Telefon = $Telefon;
    }
    
    public function getNrKlienta() {
        return $this->NrKlienta;
    }
    
    public function setNrKlienta($NrKlienta) {
        $this->NrKlienta = $NrKlienta;
    }
}
class FA_Adres {
    private $AdresTag;
    public function __construct($dom) {
        $this->AdresTag = $dom->createElement('Adres');
    }
    public function attachToXML($tree) {
        $tree->appendChild($this->AdresTag);
    }
    public function setAdresTag($InformacjeTag) {
        $this->AdresTag = $InformacjeTag;
    }
    public function getAdresTag() {
        return $this->AdresTag;
    }
}

class FA_Stopka {
    private $StopkaTag;
    
    public function __construct($dom) {
        $this->StopkaTag = $dom->createElement('Stopka');
    }
    public function attachToXML($tree) {
        $tree->appendChild($this->StopkaTag);
    }
    public function getStopkaTag() {
        return $this->StopkaTag;
    }
}
class FA_Stopka_Informacje {
    private $InformacjeTag;
    private $StopkaFaktury;
    
    public function __construct($dom, $StopkaFaktury) {
        $this->InformacjeTag = $dom->createElement('Informacje');
        $this->StopkaFaktury = $dom->createElement('StopkaFaktury', $StopkaFaktury);
    }
    public function attachToXML($tree) {
        $this->InformacjeTag->appendChild($this->StopkaFaktury);
        $tree->appendChild($this->InformacjeTag);
    }
    public function getInformacjeTag() {
        return $this->InformacjeTag;
    }
    
    public function setInformacjeTag($InformacjeTag) {
        $this->InformacjeTag = $InformacjeTag;
    }
    
    public function getStopkaFaktury() {
        return $this->StopkaFaktury;
    }
    
    public function setStopkaFaktury($StopkaFaktury) {
        $this->StopkaFaktury = $StopkaFaktury;
    }
}
class FA_Stopka_Rejestry {
    private $RejestryTag;
    private $KRS;
    private $REGON;
    private $BDO;
    public function __construct($dom, $KRS, $REGON, $BDO) {
        $this->RejestryTag = $dom->createElement('Rejestry');
        $this->KRS         = $dom->createElement('KRS', $KRS);
        $this->REGON       = $dom->createElement('REGON', $REGON);
        $this->BDO         = $dom->createElement('BDO', $BDO);
    }
    public function attachToXML($tree) {
        $this->RejestryTag->appendChild($this->KRS);
        $this->RejestryTag->appendChild($this->REGON);
        $this->RejestryTag->appendChild($this->BDO);
        $tree->appendChild($this->RejestryTag);
    }
    public function getRejestryTag() {
        return $this->RejestryTag;
    }
    
    public function setRejestryTag($RejestryTag) {
        $this->RejestryTag = $RejestryTag;
    }
    
    public function getKRS() {
        return $this->KRS;
    }
    
    public function setKRS($KRS) {
        $this->KRS = $KRS;
    }
    
    public function getREGON() {
        return $this->REGON;
    }
    
    public function setREGON($REGON) {
        $this->REGON = $REGON;
    }
    
    public function getBDO() {
        return $this->BDO;
    }
    
    public function setBDO($BDO) {
        $this->BDO = $BDO;
    }
}

class FA_Fa {
    private $FaTag;
    private $KodWaluty;
    private $DataWystawienia_P_1;
    private $MiejsceWystawienia_P_1M;
    private $NumerFaktury_P_2;
    private $DataDokonania_P_6;
    private $SumaWartosciNetto_P_13_1;
    private $KwotaPodatku_P_14_1;
    private $KwotaOgolem_P_15;
    private $Fa_Adnotacje;
    private $RodzajFaktury;
    private $FP;
    private $Fa_DodatkowyOpis;
    
    public function __construct($dom, $KodWaluty, $DataWystawienia_P_1, $MiejsceWystawienia_P_1M, $NumerFaktury_P_2, $DataDokonania_P_6 = null, $SumaWartosciNetto_P_13_1, $KwotaPodatku_P_14_1, $KwotaOgolem_P_15, $Fa_Adnotacje, $RodzajFaktury = "VAT", $FP = "1", $Fa_DodatkowyOpis = null) {
        $this->FaTag                    = $dom->createElement('Fa');
        $this->KodWaluty                = $dom->createElement('KodWaluty', $KodWaluty);
        $this->DataWystawienia_P_1      = $dom->createElement('P_1', $DataWystawienia_P_1);
        $this->MiejsceWystawienia_P_1M  = $dom->createElement('P_1M', $MiejsceWystawienia_P_1M);
        $this->NumerFaktury_P_2         = $dom->createElement('P_2', $NumerFaktury_P_2);
        $this->DataDokonania_P_6        = $dom->createElement('P_6', $DataDokonania_P_6);
        $this->SumaWartosciNetto_P_13_1 = $dom->createElement('P_13_1', $SumaWartosciNetto_P_13_1);
        $this->KwotaPodatku_P_14_1      = $dom->createElement('P_14_1', $KwotaPodatku_P_14_1);
        $this->KwotaOgolem_P_15         = $dom->createElement('P_15', $KwotaOgolem_P_15);
        $this->Fa_Adnotacje             = $Fa_Adnotacje;
        $this->RodzajFaktury            = $dom->createElement('RodzajFaktury', $RodzajFaktury);
        $this->FP                       = $dom->createElement('FP', $FP);
        if ($Fa_DodatkowyOpis != null) {
            $this->Fa_DodatkowyOpis = $Fa_DodatkowyOpis;
        }
    }
    public function attachToXML($tree) {
        $this->FaTag->appendChild($this->KodWaluty);
        $this->FaTag->appendChild($this->DataWystawienia_P_1);
        $this->FaTag->appendChild($this->MiejsceWystawienia_P_1M);
        $this->FaTag->appendChild($this->NumerFaktury_P_2);
        $this->FaTag->appendChild($this->DataDokonania_P_6);
        $this->FaTag->appendChild($this->SumaWartosciNetto_P_13_1);
        $this->FaTag->appendChild($this->KwotaPodatku_P_14_1);
        $this->FaTag->appendChild($this->KwotaOgolem_P_15);
        $this->FaTag->appendChild($this->Fa_Adnotacje);
        $this->FaTag->appendChild($this->RodzajFaktury);
        $this->FaTag->appendChild($this->FP);
        if ($this->Fa_DodatkowyOpis != null) {
            $this->FaTag->appendChild($this->Fa_DodatkowyOpis);
        }
        $tree->appendChild($this->FaTag);
    }
    public function getFaTag() {
        return $this->FaTag;
    }
    
    public function setFaTag($FaTag) {
        $this->FaTag = $FaTag;
    }
    
    public function getKodWaluty() {
        return $this->KodWaluty;
    }
    
    public function setKodWaluty($KodWaluty) {
        $this->KodWaluty = $KodWaluty;
    }
    
    public function getDataWystawienia_P_1() {
        return $this->DataWystawienia_P_1;
    }
    
    public function setDataWystawienia_P_1($DataWystawienia_P_1) {
        $this->DataWystawienia_P_1 = $DataWystawienia_P_1;
    }
    
    public function getMiejsceWystawienia_P_1M() {
        return $this->MiejsceWystawienia_P_1M;
    }
    
    public function setMiejsceWystawienia_P_1M($MiejsceWystawienia_P_1M) {
        $this->MiejsceWystawienia_P_1M = $MiejsceWystawienia_P_1M;
    }
    
    public function getNumerFaktury_P_2() {
        return $this->NumerFaktury_P_2;
    }
    
    public function setNumerFaktury_P_2($NumerFaktury_P_2) {
        $this->NumerFaktury_P_2 = $NumerFaktury_P_2;
    }
    
    public function getDataDokonania_P_6() {
        return $this->DataDokonania_P_6;
    }
    
    public function setDataDokonania_P_6($DataDokonania_P_6) {
        $this->DataDokonania_P_6 = $DataDokonania_P_6;
    }
    
    public function getSumaWartosciNetto_P_13_1() {
        return $this->SumaWartosciNetto_P_13_1;
    }
    
    public function setSumaWartosciNetto_P_13_1($SumaWartosciNetto_P_13_1) {
        $this->SumaWartosciNetto_P_13_1 = $SumaWartosciNetto_P_13_1;
    }
    
    public function getKwotaPodatku_P_14_1() {
        return $this->KwotaPodatku_P_14_1;
    }
    
    public function setKwotaPodatku_P_14_1($KwotaPodatku_P_14_1) {
        $this->KwotaPodatku_P_14_1 = $KwotaPodatku_P_14_1;
    }
    
    public function getKwotaOgolem_P_15() {
        return $this->KwotaOgolem_P_15;
    }
    
    public function setKwotaOgolem_P_15($KwotaOgolem_P_15) {
        $this->KwotaOgolem_P_15 = $KwotaOgolem_P_15;
    }
}
class FA_Wiersz {
    private $FaWierszTag;
    private $FaTowarMax;
    private $NrWierszaFa;
    private $UU_ID;
    private $P_7;
    private $P_8A;
    private $P_8B;
    private $P_9A;
    private $P_11;
    private $P_12;
    
    public function __construct($dom, $FaTowarMax, $P_7, $P_8A, $P_8B, $P_9A, $P_11, $P_12) {
        for ($i = 0; $i < $FaTowarMax; $i++) {
            $this->FaTowarMax      = $FaTowarMax;
            $this->FaWierszTag[$i] = $dom->createElement('FaWiersz');
            $this->NrWierszaFa[$i] = $dom->createElement('NrWierszaFa', $i + 1);
            $this->UU_ID[$i]       = $dom->createElement('UU_ID', uniqid());
            $this->P_7[$i]         = $dom->createElement('P_7', $P_7[$i]);
            $this->P_8A[$i]        = $dom->createElement('P_8A', $P_8A[$i]);
            $this->P_8B[$i]        = $dom->createElement('P_8B', $P_8B[$i]);
            $this->P_9A[$i]        = $dom->createElement('P_9A', $P_9A[$i]);
            $this->P_11[$i]        = $dom->createElement('P_11', $P_11[$i]);
            $this->P_12[$i]        = $dom->createElement('P_12', $P_12[$i]);
        }
    }
    public function attachToXML($tree) {
        for ($i = 0; $i < $this->FaTowarMax; $i++) {
            $this->FaWierszTag[$i]->appendChild($this->NrWierszaFa[$i]);
            $this->FaWierszTag[$i]->appendChild($this->UU_ID[$i]);
            $this->FaWierszTag[$i]->appendChild($this->P_7[$i]);
            $this->FaWierszTag[$i]->appendChild($this->P_8A[$i]);
            $this->FaWierszTag[$i]->appendChild($this->P_8B[$i]);
            $this->FaWierszTag[$i]->appendChild($this->P_9A[$i]);
            $this->FaWierszTag[$i]->appendChild($this->P_11[$i]);
            $this->FaWierszTag[$i]->appendChild($this->P_12[$i]);
            $tree->appendChild($this->FaWierszTag[$i]);
        }
        
    }
    public function getFaWierszTag() {
        return $this->FaWierszTag;
    }
    
    public function setFaWierszTag($FaWierszTag) {
        $this->FaWierszTag = $FaWierszTag;
    }
    
    public function getFaTowarMax() {
        return $this->FaTowarMax;
    }
    
    public function setFaTowarMax($FaTowarMax) {
        $this->FaTowarMax = $FaTowarMax;
    }
    
    public function getNrWierszaFa() {
        return $this->NrWierszaFa;
    }
    
    public function setNrWierszaFa($NrWierszaFa) {
        $this->NrWierszaFa = $NrWierszaFa;
    }
    
    public function getUU_ID() {
        return $this->UU_ID;
    }
    
    public function setUU_ID($UU_ID) {
        $this->UU_ID = $UU_ID;
    }
    
    public function getP_7() {
        return $this->P_7;
    }
    
    public function setP_7($P_7) {
        $this->P_7 = $P_7;
    }
    
    public function getP_8A() {
        return $this->P_8A;
    }
    
    public function setP_8A($P_8A) {
        $this->P_8A = $P_8A;
    }
    
    public function getP_8B() {
        return $this->P_8B;
    }
    
    public function setP_8B($P_8B) {
        $this->P_8B = $P_8B;
    }
    
    public function getP_9A() {
        return $this->P_9A;
    }
    
    public function setP_9A($P_9A) {
        $this->P_9A = $P_9A;
    }
    
    public function getP_11() {
        return $this->P_11;
    }
    
    public function setP_11($P_11) {
        $this->P_11 = $P_11;
    }
    
    public function getP_12() {
        return $this->P_12;
    }
    
    public function setP_12($P_12) {
        $this->P_12 = $P_12;
    }
}

class FA_Wiersze {
    private $FaWierszeTag;
    private $LiczbaWierszyFaktury;
    private $WartoscWierszyFaktury1;
    public function __construct($dom, $LiczbaWierszyFaktury, $WartoscWierszyFaktury1) {
        $this->FaWierszeTag           = $dom->createElement('FaWiersze');
        $this->LiczbaWierszyFaktury   = $dom->createElement('LiczbaWierszyFaktury', $LiczbaWierszyFaktury);
        $this->WartoscWierszyFaktury1 = $dom->createElement('WartoscWierszyFaktury1', $WartoscWierszyFaktury1);
        
    }
    public function attachToXML($tree) {
        $this->FaWierszeTag->appendChild($this->LiczbaWierszyFaktury);
        $this->FaWierszeTag->appendChild($this->WartoscWierszyFaktury1);
        $tree->appendChild($this->FaWierszeTag);
    }
    public function getFaWierszeTag() {
        return $this->FaWierszeTag;
    }
    
    public function setFaWierszeTag($FaWierszeTag) {
        $this->FaWierszeTag = $FaWierszeTag;
    }
    
    public function getLiczbaWierszyFaktury() {
        return $this->LiczbaWierszyFaktury;
    }
    
    public function setLiczbaWierszyFaktury($LiczbaWierszyFaktury) {
        $this->LiczbaWierszyFaktury = $LiczbaWierszyFaktury;
    }
    
    public function getWartoscWierszyFaktury1() {
        return $this->WartoscWierszyFaktury1;
    }
    
    public function setWartoscWierszyFaktury1($WartoscWierszyFaktury1) {
        $this->WartoscWierszyFaktury1 = $WartoscWierszyFaktury1;
    }
    
}
class FA_Adnotacje {
    private $FaAdnotacjeTag;
    private $P_16;
    private $P_17;
    private $P_18;
    private $P_18A;
    private $P_19;
    private $P_22;
    private $P_23;
    private $P_PMarzy;
    
    public function __construct($dom, $P_16, $P_17, $P_18, $P_18A, $P_19, $P_22, $P_23, $P_PMarzy) {
        $this->FaAdnotacjeTag = $dom->createElement('Adnotacje');
        $this->P_16           = $dom->createElement('P_16', $P_16 % 3);
        $this->P_17           = $dom->createElement('P_17', $P_17);
        $this->P_18           = $dom->createElement('P_18', $P_18);
        $this->P_18A          = $dom->createElement('P_18A', $P_18A);
        $this->P_19           = $dom->createElement('P_19', $P_19);
        $this->P_22           = $dom->createElement('P_22', $P_22);
        $this->P_23           = $dom->createElement('P_23', $P_23);
        $this->P_PMarzy       = $dom->createElement('P_PMarzy', $P_PMarzy);
        $this->FaAdnotacjeTag->appendChild($this->P_16);
        $this->FaAdnotacjeTag->appendChild($this->P_17);
        $this->FaAdnotacjeTag->appendChild($this->P_18);
        $this->FaAdnotacjeTag->appendChild($this->P_18A);
        $this->FaAdnotacjeTag->appendChild($this->P_19);
        $this->FaAdnotacjeTag->appendChild($this->P_22);
        $this->FaAdnotacjeTag->appendChild($this->P_23);
        $this->FaAdnotacjeTag->appendChild($this->P_PMarzy);
    }
    public function attachToXML($tree) {
        $tree->appendChild($this->FaAdnotacjeTag);
    }
    public function getFaAdnotacjeTag() {
        return $this->FaAdnotacjeTag;
    }
    
    public function setFaAdnotacjeTag($FaAdnotacjeTag) {
        $this->FaAdnotacjeTag = $FaAdnotacjeTag;
    }
    
    public function getP_16() {
        return $this->P_16;
    }
    
    public function setP_16($P_16) {
        $this->P_16 = $P_16;
    }
    
    public function getP_17() {
        return $this->P_17;
    }
    
    public function setP_17($P_17) {
        $this->P_17 = $P_17;
    }
    
    public function getP_18() {
        return $this->P_18;
    }
    
    public function setP_18($P_18) {
        $this->P_18 = $P_18;
    }
    
    public function getP_18A() {
        return $this->P_18A;
    }
    
    public function setP_18A($P_18A) {
        $this->P_18A = $P_18A;
    }
    
    public function getP_19() {
        return $this->P_19;
    }
    
    public function setP_19($P_19) {
        $this->P_19 = $P_19;
    }
    
    public function getP_22() {
        return $this->P_22;
    }
    
    public function setP_22($P_22) {
        $this->P_22 = $P_22;
    }
    
    public function getP_23() {
        return $this->P_23;
    }
    
    public function setP_23($P_23) {
        $this->P_23 = $P_23;
    }
    
    public function getP_PMarzy() {
        return $this->P_PMarzy;
    }
    
    public function setP_PMarzy($P_PMarzy) {
        $this->P_PMarzy = $P_PMarzy;
    }
}

class FA_DodatkowyOpis {
    private $DodatkowyOpisTag;
    private $Klucz;
    private $Wartosc;
    private $isSet;
    
    public function __construct($dom, $Klucz = null, $Wartosc = null) {
        if ($Klucz != null && $Wartosc != null) {
            $this->isSet = true;
        } else {
            $this->isSet = false;
        }
        $this->DodatkowyOpisTag = $dom->createElement('DodatkowyOpis');
        $this->Klucz            = $dom->createElement('Klucz', $Klucz);
        $this->Wartosc          = $dom->createElement('Wartosc', $Wartosc);
    }
    public function attachToXML($tree) {
        $this->DodatkowyOpisTag->appendChild($this->Klucz);
        $this->DodatkowyOpisTag->appendChild($this->Wartosc);
        if ($this->isSet) {
            $tree->appendChild($this->DodatkowyOpisTag);
        }
    }
    public function getDodatkowyOpisTag() {
        if ($this->isSet) {
            return $this->DodatkowyOpisTag;
        } else {
            return null;
        }
    }
    
    public function setDodatkowyOpisTag($DodatkowyOpisTag) {
        $this->DodatkowyOpisTag = $DodatkowyOpisTag;
    }
    
    public function getKlucz() {
        return $this->Klucz;
    }
    
    public function setKlucz($Klucz) {
        $this->Klucz = $Klucz;
    }
    
    public function getWartosc() {
        return $this->Wartosc;
    }
    
    public function setWartosc($Wartosc) {
        $this->Wartosc = $Wartosc;
    }
}

class FA_NrRBPL {
    private $NrRBPLTag;
	
    public function __construct($dom, $NrRBPL) {
	$this->NrRBPLTag = $dom->createElement('NrRBPL', $NrRBPL);
    }
	public function attachToXML($tree) {
		$tree->appendChild($this->NrRBPLTag);
    }
	public function getNrRBPLTag(){
		return $this->NrRBPLTag;
	}

	public function setNrRBPLTag($NrRBPLTag){
		$this->NrRBPLTag = $NrRBPLTag;
	}
}
class FA_Platnosc {
    private $PlatnoscTag;
    private $Zaplacono = null;
    private $DataZaplaty;
    private $FormaPlatnosci;
    private $RachunekBankowy;
    private $NrRBPL;
	
    public function __construct($dom, $DataZaplatyCheckbox, $DataZaplaty, $FormaPlatnosci, $NrRBPL) {
        $this->PlatnoscTag = $dom->createElement('Platnosc');
        if ($DataZaplatyCheckbox)
            $this->Zaplacono = $dom->createElement('Zaplacono', 1);
        $this->DataZaplaty     = $dom->createElement('DataZaplaty', $DataZaplaty);
        $this->FormaPlatnosci  = $dom->createElement('FormaPlatnosci', $FormaPlatnosci);
        $this->RachunekBankowy = $dom->createElement('RachunekBankowy');
        $this->NrRBPL = $NrRBPL;
        if ($this->Zaplacono != null)
            $this->PlatnoscTag->appendChild($this->Zaplacono);
        if ($DataZaplatyCheckbox)
            $this->PlatnoscTag->appendChild($this->DataZaplaty);
        if ($DataZaplatyCheckbox)
            $this->PlatnoscTag->appendChild($this->FormaPlatnosci);
        if ($NrRBPL != null) {
			$this->RachunekBankowy->appendChild($NrRBPL);
            $this->PlatnoscTag->appendChild($this->RachunekBankowy);
		}
    }
    public function attachToXML($tree) {
        if ($this->Zaplacono != null) {
            $tree->appendChild($this->PlatnoscTag);
        }
    }
    public function getPlatnoscTag() {
        return $this->PlatnoscTag;
    }
    
    public function setPlatnoscTag($PlatnoscTag) {
        $this->PlatnoscTag = $PlatnoscTag;
    }
    
    public function getZaplacono() {
        return $this->Zaplacono;
    }
    
    public function setZaplacono($Zaplacono) {
        $this->Zaplacono = $Zaplacono;
    }
    
    public function getDataZaplaty() {
        return $this->DataZaplaty;
    }
    
    public function setDataZaplaty($DataZaplaty) {
        $this->DataZaplaty = $DataZaplaty;
    }
    
    public function getFormaPlatnosci() {
        return $this->FormaPlatnosci;
    }
    
    public function setFormaPlatnosci($FormaPlatnosci) {
        $this->FormaPlatnosci = $FormaPlatnosci;
    }
    
    public function getRachunekBankowy() {
        return $this->RachunekBankowy;
    }
    
    public function setRachunekBankowy($RachunekBankowy) {
        $this->RachunekBankowy = $RachunekBankowy;
    }
}

class FA_WarunkiTransakcji {
    private $WarunkiTransakcjiTag;
    private $Zamowienia;
    
    public function __construct($dom, $Zamowienia) {
        $this->WarunkiTransakcjiTag = $dom->createElement('WarunkiTransakcji');
        $this->Zamowienia           = $Zamowienia;
    }
    public function attachToXML($tree) {
        if ($this->Zamowienia->hasChildNodes()) {
            $this->WarunkiTransakcjiTag->appendChild($this->Zamowienia);
            $tree->appendChild($this->WarunkiTransakcjiTag);
        }
    }
    public function getWarunkiTransakcjiTag() {
        return $this->WarunkiTransakcjiTag;
    }
    
    public function setWarunkiTransakcjiTag($WarunkiTransakcjiTag) {
        $this->WarunkiTransakcjiTag = $WarunkiTransakcjiTag;
    }
    
    public function getZamowienia() {
        return $this->Zamowienia;
    }
    
    public function setZamowienia($Zamowienia) {
        $this->Zamowienia = $Zamowienia;
    }
}

class FA_Zamowienia {
    private $ZamowieniaTag;
    private $DataZamowienia;
    private $NrZamowienia;
    
    public function __construct($dom, $DataZamowieniaCheckbox, $DataZamowienia, $NrZamowienia) {
        $this->ZamowieniaTag  = $dom->createElement('Zamowienia');
        $this->DataZamowienia = $dom->createElement('DataZamowienia', $DataZamowienia);
        $this->NrZamowienia   = $dom->createElement('NrZamowienia', $NrZamowienia);
        if ($DataZamowieniaCheckbox ) {
            $this->ZamowieniaTag->appendChild($this->DataZamowienia);
        }
        if ($NrZamowienia != null) {
            $this->ZamowieniaTag->appendChild($this->NrZamowienia);
        }
    }
    public function attachToXML($tree) {
        $tree->appendChild($this->ZamowieniaTag);
    }
    
    public function getZamowieniaTag() {
        return $this->ZamowieniaTag;
    }
    
    public function setZamowieniaTag($ZamowieniaTag) {
        $this->ZamowieniaTag = $ZamowieniaTag;
    }
    
    public function getDataZamowienia() {
        return $this->DataZamowienia;
    }
    
    public function setDataZamowienia($DataZamowienia) {
        $this->DataZamowienia = $DataZamowienia;
    }
    
    public function getNrZamowienia() {
        return $this->NrZamowienia;
    }
    
    public function setNrZamowienia($NrZamowienia) {
        $this->NrZamowienia = $NrZamowienia;
    }
}
?> 