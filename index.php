<!doctype html>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/php/php_function.php';
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="res/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <title>Generator E-faktur XML</title>
  <meta name="description" content="Generator faktur XML wg. schematu XSD.">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
  <link rel="stylesheet" href="css/styl.css">
</head>

<body>
	<ul class="topnav">
  <li><a class="active" href="/index">Generator</a></li>
  <li><a href="/asortyment">Asortyment</a></li>
</ul>

<div class="main-wrapper">
 <form action="php/generuj_xml.php" method="POST">
<div class="naglowek"><table class="tg">
<thead>
  <tr>
    <th class="tg-zapj">Dokument</th>
    <th class="tg-zapj">Numer faktury<span class="asterrisk">*</span></th>
    <th class="tg-zapj">Data wystawienia<span class="asterrisk">*</span><br></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0pky1"><input class="formularz" type="text" required name="fa_rodzajfaktury" value="VAT"/></td>
    <td class="tg-0pky1"><input class="formularz" type="text" name="fa_numerfaktury" required value="FV<?php echo date('Y/m')."/".genNextFakturaIndex(date ('Y-m'))?>"/></td>
    <td class="tg-0pky1"><input class="formularz" type="date" min="2022-01-01" step="1" value="<?php echo date('Y-m-d');?>" name="fa_datawystawienia"/></td>
  </tr>
  <tr>
    <td class="tg-zapj">Miejsce wystawienia<span class="asterrisk">*</span><br></td>
    <td class="tg-zapj">Data sprzedaży<br></td>
    <td class="tg-zapj">Data dokonania<br></td>
  </tr>
  <tr>
    <td class="tg-0pky1"><input class="formularz" type="text" required name="fa_miejscewystawienia"/></td>
    <td class="tg-0pky1" colspan="1"><input class="formularz" type="datetime-local" min="2022-01-01T00:00" step="1" value="<?php echo date('Y-m-d\TH:i:s');?>" name="naglowek_data"/></td>
		  <td class="tg-0pky1"><input class="formularz" type="date" min="2022-01-01" step="1" value="<?php echo date('Y-m-d');?>" name="fa_datadokonania"/></td>
  </tr>
</tbody>
</table>
</div>
<div class="podmioty">
	<div class="podmiot"><table class="tg">

<thead>
  <tr>
    <th class="tg-0pky">Pełna nazwa<span class="asterrisk">*</span></th>
    <th class="tg-0pky1"><input class="formularz" required  type=text name="podmiot1_pelnanazwa"/></th>
  </tr>
</thead>
<tbody>
	  <tr>
    <td class="tg-0pky">Państwo</td>
    <td class="tg-0pky1">
	<select class="rozwij" name="podmiot1_kodkraju">
    <option value="AF">Afganistan</option>
    <option value="AX">Wyspy Alandzkie</option>
    <option value="AL">Albania</option>
    <option value="DZ">Algieria</option>
    <option value="AS">Samoa Amerykańskie</option>
    <option value="AD">Andora</option>
    <option value="AO">Angola</option>
    <option value="AI">Anguilla</option>
    <option value="AQ">Antarktyda</option>
    <option value="AG">Antigua i Barbuda</option>
    <option value="AR">Argentyna</option>
    <option value="AM">Armenia</option>
    <option value="AW">Aruba</option>
    <option value="AU">Australia</option>
    <option value="AT">Austria</option>
    <option value="AZ">Azerbejdżan</option>
    <option value="BS">Bahamy</option>
    <option value="BH">Bahrajn</option>
    <option value="BD">Bangladesz</option>
    <option value="BB">Barbados</option>
    <option value="BY">Białoruś</option>
    <option value="BE">Belgia</option>
    <option value="BZ">Belize</option>
    <option value="BJ">Benin</option>
    <option value="BM">Bermudy</option>
    <option value="BT">Bhutan</option>
    <option value="BO">Boliwia</option>
    <option value="BQ">Bonaire, Sint Eustatius i Saba</option>
    <option value="BA">Bośnia i Hercegowina</option>
    <option value="BW">Botswana</option>
    <option value="BV">Wyspa Bouveta</option>
    <option value="BR">Brazylia</option>
    <option value="IO">Brytyjskie Terytorium Oceanu Indyjskiego</option>
    <option value="BN">Brunei Darussalam</option>
    <option value="BG">Bułgaria</option>
    <option value="BF">Burkina Faso</option>
    <option value="BI">Burundi</option>
    <option value="KH">Kambodża</option>
    <option value="CM">Kamerun</option>
    <option value="CA">Kanada</option>
    <option value="CV">Wyspy Zielonego Przylądka</option>
    <option value="KY">Kajmany</option>
    <option value="CF">Republika Środkowoafrykańska</option>
    <option value="TD">Czad</option>
    <option value="CL">Chile</option>
    <option value="CN">Chiny</option>
    <option value="CX">Wyspa Bożego Narodzenia</option>
    <option value="CC">Wyspy Kokosowe (Keelinga)</option>
    <option value="CO">Kolumbia</option>
    <option value="KM">Komory</option>
    <option value="CG">Kongo</option>
    <option value="CD">Kongo, Demokratyczna Republika Konga</option>
    <option value="CK">Wyspy Cooka</option>
    <option value="CR">Kostaryka</option>
    <option value="CI">Wybrzeże Kości Słoniowej</option>
    <option value="HR">Chorwacja</option>
    <option value="CU">Kuba</option>
    <option value="CW">Curacao</option>
    <option value="CY">Cypr</option>
    <option value="CZ">Republika Czeska</option>
    <option value="DK">Dania</option>
    <option value="DJ">Dżibuti</option>
    <option value="DM">Dominika</option>
    <option value="DO">Republika Dominikany</option>
    <option value="EC">Ekwador</option>
    <option value="EG">Egipt</option>
    <option value="SV">Salwador</option>
    <option value="GQ">Gwinea Równikowa</option>
    <option value="ER">Erytrea</option>
    <option value="EE">Estonia</option>
    <option value="ET">Etiopia</option>
    <option value="FK">Falklandy (Malwiny)</option>
    <option value="FO">Wyspy Owcze</option>
    <option value="FJ">Fidżi</option>
    <option value="FI">Finlandia</option>
    <option value="FR">Francja</option>
    <option value="GF">Gujana Francuska</option>
    <option value="PF">Polinezja Francuska</option>
    <option value="TF">Francuskie Terytoria Południowe</option>
    <option value="GA">Gabon</option>
    <option value="GM">Gambia</option>
    <option value="GE">Gruzja</option>
    <option value="DE">Niemcy</option>
    <option value="GH">Ghana</option>
    <option value="GI">Gibraltar</option>
    <option value="GR">Grecja</option>
    <option value="GL">Grenlandia</option>
    <option value="GD">Grenada</option>
    <option value="GP">Gwadelupa</option>
    <option value="GU">Guam</option>
    <option value="GT">Gwatemala</option>
    <option value="GG">Guernsey</option>
    <option value="GN">Gwinea</option>
    <option value="GW">Gwinea Bissau</option>
    <option value="GY">Gujana</option>
    <option value="HT">Haiti</option>
    <option value="HM">Wyspy Heard i McDonalda</option>
    <option value="VA">Stolica Apostolska (Państwo Watykańskie)</option>
    <option value="HN">Honduras</option>
    <option value="HK">Hongkong</option>
    <option value="HU">Węgry</option>
    <option value="IS">Islandia</option>
    <option value="IN">Indie</option>
    <option value="ID">Indonezja</option>
    <option value="IR">Iran (Islamska Republika</option>
    <option value="IQ">Irak</option>
    <option value="IE">Irlandia</option>
    <option value="IM">Wyspa Man</option>
    <option value="IL">Izrael</option>
    <option value="IT">Włochy</option>
    <option value="JM">Jamajka</option>
    <option value="JP">Japonia</option>
    <option value="JE">Golf</option>
    <option value="JO">Jordania</option>
    <option value="KZ">Kazachstan</option>
    <option value="KE">Kenia</option>
    <option value="KI">Kiribati</option>
    <option value="KP">Koreańska Republika Ludowo-Demokratyczna</option>
    <option value="KR">Republika Korei</option>
    <option value="XK">Kosowo</option>
    <option value="KW">Kuwejt</option>
    <option value="KG">Kirgistan</option>
    <option value="LA">Laotańska Republika Ludowo-Demokratyczna</option>
    <option value="LV">Łotwa</option>
    <option value="LB">Liban</option>
    <option value="LS">Lesotho</option>
    <option value="LR">Liberia</option>
    <option value="LY">Libijska Arabska Dżamahirija</option>
    <option value="LI">Liechtenstein</option>
    <option value="LT">Litwa</option>
    <option value="LU">Luksemburg</option>
    <option value="MO">Makao</option>
    <option value="MK">Macedonia, Była Jugosłowiańska Republika</option>
    <option value="MG">Madagaskar</option>
    <option value="MW">Malawi</option>
    <option value="MY">Malezja</option>
    <option value="MV">Malediwy</option>
    <option value="ML">Mali</option>
    <option value="MT">Malta</option>
    <option value="MH">Wyspy Marshalla</option>
    <option value="MQ">Martynika</option>
    <option value="MR">Mauretania</option>
    <option value="MU">Mauritius</option>
    <option value="YT">Majotta</option>
    <option value="MX">Meksyk</option>
    <option value="FM">Mikronezja, Sfederowane Stany</option>
    <option value="MD">Mołdawia, Republika</option>
    <option value="MC">Monako</option>
    <option value="MN">Mongolia</option>
    <option value="ME">Czarnogóra</option>
    <option value="MS">Montserrat</option>
    <option value="MA">Maroko</option>
    <option value="MZ">Mozambik</option>
    <option value="MM">Myanmar</option>
    <option value="NA">Namibia</option>
    <option value="NR">Nauru</option>
    <option value="NP">Nepal</option>
    <option value="NL">Holandia</option>
    <option value="AN">Antyle Holenderskie</option>
    <option value="NC">Nowa Kaledonia</option>
    <option value="NZ">Nowa Zelandia</option>
    <option value="NI">Nikaragua</option>
    <option value="NE">Niger</option>
    <option value="NG">Nigeria</option>
    <option value="NU">Niue</option>
    <option value="NF">Wyspa Norfolk</option>
    <option value="MP">Mariany Północne</option>
    <option value="NO">Norwegia</option>
    <option value="OM">Oman</option>
    <option value="PK">Pakistan</option>
    <option value="PW">Palau</option>
    <option value="PS">Teretorium Paleństynskie, Okupowane</option>
    <option value="PA">Panama</option>
    <option value="PG">Papua Nowa Gwinea</option>
    <option value="PY">Paragwaj</option>
    <option value="PE">Peru</option>
    <option value="PH">Filipiny</option>
    <option value="PN">Pitcairn</option>
    <option selected="selected" value="PL">Polska</option>
    <option value="PT">Portugalia</option>
    <option value="PR">Portoryko</option>
    <option value="QA">Katar</option>
    <option value="RE">Zjazd</option>
    <option value="RO">Rumunia</option>
    <option value="RU">Federacja Rosyjska</option>
    <option value="RW">Rwanda</option>
    <option value="BL">Saint Barthelemy</option>
    <option value="SH">Święta Helena</option>
    <option value="KN">Saint Kitts i Nevis</option>
    <option value="LC">święta Lucia</option>
    <option value="MF">święty Marcin</option>
    <option value="PM">Saint-Pierre i Miquelon</option>
    <option value="VC">Saint Vincent i Grenadyny</option>
    <option value="WS">Samoa</option>
    <option value="SM">San Marino</option>
    <option value="ST">Wyspy Świętego Tomasza i Książęca</option>
    <option value="SA">Arabia Saudyjska</option>
    <option value="SN">Senegal</option>
    <option value="RS">Serbia</option>
    <option value="CS">Serbia i Czarnogóra</option>
    <option value="SC">Seszele</option>
    <option value="SL">Sierra Leone</option>
    <option value="SG">Singapur</option>
    <option value="SX">St Martin</option>
    <option value="SK">Słowacja</option>
    <option value="SI">Słowenia</option>
    <option value="SB">Wyspy Salomona</option>
    <option value="SO">Somali</option>
    <option value="ZA">Afryka Południowa</option>
    <option value="GS">Georgia Południowa i Sandwich Południowy</option>
    <option value="SS">Południowy Sudan</option>
    <option value="ES">Hiszpania</option>
    <option value="LK">Sri Lanka</option>
    <option value="SD">Sudan</option>
    <option value="SR">Surinam</option>
    <option value="SJ">Svalbard i Jan Mayen</option>
    <option value="SZ">Suazi</option>
    <option value="SE">Szwecja</option>
    <option value="CH">Szwajcaria</option>
    <option value="SY">Republika Syryjsko-Arabska</option>
    <option value="TW">Tajwan, prowincja Chin</option>
    <option value="TJ">Tadżykistan</option>
    <option value="TZ">Tanzania, Zjednoczona Republika</option>
    <option value="TH">Tajlandia</option>
    <option value="TL">Timor Wschodni</option>
    <option value="TG">Iść</option>
    <option value="TK">Tokelau</option>
    <option value="TO">Tonga</option>
    <option value="TT">Trynidad i Tobago</option>
    <option value="TN">Tunezja</option>
    <option value="TR">indyk</option>
    <option value="TM">Turkmenia</option>
    <option value="TC">Wyspy Turks i Caicos</option>
    <option value="TV">Tuvalu</option>
    <option value="UG">Uganda</option>
    <option value="UA">Ukraina</option>
    <option value="AE">Zjednoczone Emiraty Arabskie</option>
    <option value="GB">Zjednoczone Królestwo</option>
    <option value="US">Stany Zjednoczone</option>
    <option value="UM">Stany Zjednoczone Dalekie Wyspy Mniejsze</option>
    <option value="UY">Urugwaj</option>
    <option value="UZ">Uzbekistan</option>
    <option value="VU">Vanuatu</option>
    <option value="VE">Wenezuela</option>
    <option value="VN">Viet Nam</option>
    <option value="VG">Wyspy Dziewicze, Brytyjskie</option>
    <option value="VI">Wyspy Dziewicze Stanów Zjednoczonych</option>
    <option value="WF">Wallis i Futuna</option>
    <option value="EH">Sahara Zachodnia</option>
    <option value="YE">Jemen</option>
    <option value="ZM">Zambia</option>
    <option value="ZW">Zimbabwe</option>
</select>
	</td>
  </tr>
  <tr>
    <td class="tg-0pky">NIP<span class="asterrisk">*</span></td>
    <td class="tg-0pky1"><input class="formularz" maxlength="10" size="10"  type=text pattern="^[0-9]{10}$" required placeholder="1234567890" title="Nieprawidłowy format format numeru NIP." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="podmiot1_nip"/></td>
  </tr>
  <tr>
    <td class="tg-0pky">Ulica</td>
    <td class="tg-0pky1"><input class="formularz" type=text name="podmiot1_ulica"/></td>
  </tr>
  <tr>
  <tr>
    <td class="tg-0pky">Nr domu<span class="asterrisk">*</span></td>
    <td class="tg-0pky1"><input class="formularz" maxlength="4" size="4" required   type=text name="podmiot1_nrdomu"/></td>
  </tr>
  <tr>
  <tr>
    <td class="tg-0pky">Nr lokalu</td>
    <td class="tg-0pky1"><input class="formularz" maxlength="4" size="4" type=text name="podmiot1_nrlokalu"/></td>
  </tr>
  <tr>
    <td class="tg-0pky">Miejscowość<span class="asterrisk">*</span></td>
    <td class="tg-0pky1"><input class="formularz"  required type=text name="podmiot1_miejscowosc"/></td>
  </tr>
  <tr>
    <td class="tg-0pky">Kod pocztowy<span class="asterrisk">*</span></td>
    <td class="tg-0pky1"><input class="formularz"  required type=text pattern="^[0-9]{2}-[0-9]{3}$" maxlength="6" size="6" placeholder="12-123"
    title="Nieprawidłowy format kodu pocztowego." name="podmiot1_kodpocztowy"/></td>
  </tr>
  <tr>
    <td class="tg-0pky">Email</td>
    <td class="tg-0pky1"><input class="formularz" type=email placeholder="twoj@email.com" maxlength="64" size="64" name="podmiot1_email"/></td>
  </tr>
  <tr>
  <tr>
    <td class="tg-0pky">Telefon</td>
    <td class="tg-0pky1"><input class="formularz" type=tel pattern="[0-9]{9}$" placeholder="123456789" maxlength="9" size="9"  title="Nieprawidłowy format numeru telefonu." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="podmiot1_telefon"/></td>
  </tr>
  <tr>
</tbody>
</table>
</div>
	<div class="podmiot"><table class="tg">

<thead>
  <tr>
    <th class="tg-0pky">Imię pierwsze<span class="asterrisk">*</span></th>
    <th class="tg-0pky1"><input  class="formularz"  required type=text name="podmiot2_imiepierwsze"/></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0pky">Nazwisko<span class="asterrisk">*</span></td>
    <td class="tg-0pky1"><input  class="formularz" required type=text name="podmiot2_nazwisko"/></td>
  </tr>
  <tr>
    <td class="tg-0pky">Państwo</td>
    <td class="tg-0pky1">
	<select class="rozwij" name="podmiot2_kodkraju">
    <option value="AF">Afganistan</option>
    <option value="AX">Wyspy Alandzkie</option>
    <option value="AL">Albania</option>
    <option value="DZ">Algieria</option>
    <option value="AS">Samoa Amerykańskie</option>
    <option value="AD">Andora</option>
    <option value="AO">Angola</option>
    <option value="AI">Anguilla</option>
    <option value="AQ">Antarktyda</option>
    <option value="AG">Antigua i Barbuda</option>
    <option value="AR">Argentyna</option>
    <option value="AM">Armenia</option>
    <option value="AW">Aruba</option>
    <option value="AU">Australia</option>
    <option value="AT">Austria</option>
    <option value="AZ">Azerbejdżan</option>
    <option value="BS">Bahamy</option>
    <option value="BH">Bahrajn</option>
    <option value="BD">Bangladesz</option>
    <option value="BB">Barbados</option>
    <option value="BY">Białoruś</option>
    <option value="BE">Belgia</option>
    <option value="BZ">Belize</option>
    <option value="BJ">Benin</option>
    <option value="BM">Bermudy</option>
    <option value="BT">Bhutan</option>
    <option value="BO">Boliwia</option>
    <option value="BQ">Bonaire, Sint Eustatius i Saba</option>
    <option value="BA">Bośnia i Hercegowina</option>
    <option value="BW">Botswana</option>
    <option value="BV">Wyspa Bouveta</option>
    <option value="BR">Brazylia</option>
    <option value="IO">Brytyjskie Terytorium Oceanu Indyjskiego</option>
    <option value="BN">Brunei Darussalam</option>
    <option value="BG">Bułgaria</option>
    <option value="BF">Burkina Faso</option>
    <option value="BI">Burundi</option>
    <option value="KH">Kambodża</option>
    <option value="CM">Kamerun</option>
    <option value="CA">Kanada</option>
    <option value="CV">Wyspy Zielonego Przylądka</option>
    <option value="KY">Kajmany</option>
    <option value="CF">Republika Środkowoafrykańska</option>
    <option value="TD">Czad</option>
    <option value="CL">Chile</option>
    <option value="CN">Chiny</option>
    <option value="CX">Wyspa Bożego Narodzenia</option>
    <option value="CC">Wyspy Kokosowe (Keelinga)</option>
    <option value="CO">Kolumbia</option>
    <option value="KM">Komory</option>
    <option value="CG">Kongo</option>
    <option value="CD">Kongo, Demokratyczna Republika Konga</option>
    <option value="CK">Wyspy Cooka</option>
    <option value="CR">Kostaryka</option>
    <option value="CI">Wybrzeże Kości Słoniowej</option>
    <option value="HR">Chorwacja</option>
    <option value="CU">Kuba</option>
    <option value="CW">Curacao</option>
    <option value="CY">Cypr</option>
    <option value="CZ">Republika Czeska</option>
    <option value="DK">Dania</option>
    <option value="DJ">Dżibuti</option>
    <option value="DM">Dominika</option>
    <option value="DO">Republika Dominikany</option>
    <option value="EC">Ekwador</option>
    <option value="EG">Egipt</option>
    <option value="SV">Salwador</option>
    <option value="GQ">Gwinea Równikowa</option>
    <option value="ER">Erytrea</option>
    <option value="EE">Estonia</option>
    <option value="ET">Etiopia</option>
    <option value="FK">Falklandy (Malwiny)</option>
    <option value="FO">Wyspy Owcze</option>
    <option value="FJ">Fidżi</option>
    <option value="FI">Finlandia</option>
    <option value="FR">Francja</option>
    <option value="GF">Gujana Francuska</option>
    <option value="PF">Polinezja Francuska</option>
    <option value="TF">Francuskie Terytoria Południowe</option>
    <option value="GA">Gabon</option>
    <option value="GM">Gambia</option>
    <option value="GE">Gruzja</option>
    <option value="DE">Niemcy</option>
    <option value="GH">Ghana</option>
    <option value="GI">Gibraltar</option>
    <option value="GR">Grecja</option>
    <option value="GL">Grenlandia</option>
    <option value="GD">Grenada</option>
    <option value="GP">Gwadelupa</option>
    <option value="GU">Guam</option>
    <option value="GT">Gwatemala</option>
    <option value="GG">Guernsey</option>
    <option value="GN">Gwinea</option>
    <option value="GW">Gwinea Bissau</option>
    <option value="GY">Gujana</option>
    <option value="HT">Haiti</option>
    <option value="HM">Wyspy Heard i McDonalda</option>
    <option value="VA">Stolica Apostolska (Państwo Watykańskie)</option>
    <option value="HN">Honduras</option>
    <option value="HK">Hongkong</option>
    <option value="HU">Węgry</option>
    <option value="IS">Islandia</option>
    <option value="IN">Indie</option>
    <option value="ID">Indonezja</option>
    <option value="IR">Iran (Islamska Republika</option>
    <option value="IQ">Irak</option>
    <option value="IE">Irlandia</option>
    <option value="IM">Wyspa Man</option>
    <option value="IL">Izrael</option>
    <option value="IT">Włochy</option>
    <option value="JM">Jamajka</option>
    <option value="JP">Japonia</option>
    <option value="JE">Golf</option>
    <option value="JO">Jordania</option>
    <option value="KZ">Kazachstan</option>
    <option value="KE">Kenia</option>
    <option value="KI">Kiribati</option>
    <option value="KP">Koreańska Republika Ludowo-Demokratyczna</option>
    <option value="KR">Republika Korei</option>
    <option value="XK">Kosowo</option>
    <option value="KW">Kuwejt</option>
    <option value="KG">Kirgistan</option>
    <option value="LA">Laotańska Republika Ludowo-Demokratyczna</option>
    <option value="LV">Łotwa</option>
    <option value="LB">Liban</option>
    <option value="LS">Lesotho</option>
    <option value="LR">Liberia</option>
    <option value="LY">Libijska Arabska Dżamahirija</option>
    <option value="LI">Liechtenstein</option>
    <option value="LT">Litwa</option>
    <option value="LU">Luksemburg</option>
    <option value="MO">Makao</option>
    <option value="MK">Macedonia, Była Jugosłowiańska Republika</option>
    <option value="MG">Madagaskar</option>
    <option value="MW">Malawi</option>
    <option value="MY">Malezja</option>
    <option value="MV">Malediwy</option>
    <option value="ML">Mali</option>
    <option value="MT">Malta</option>
    <option value="MH">Wyspy Marshalla</option>
    <option value="MQ">Martynika</option>
    <option value="MR">Mauretania</option>
    <option value="MU">Mauritius</option>
    <option value="YT">Majotta</option>
    <option value="MX">Meksyk</option>
    <option value="FM">Mikronezja, Sfederowane Stany</option>
    <option value="MD">Mołdawia, Republika</option>
    <option value="MC">Monako</option>
    <option value="MN">Mongolia</option>
    <option value="ME">Czarnogóra</option>
    <option value="MS">Montserrat</option>
    <option value="MA">Maroko</option>
    <option value="MZ">Mozambik</option>
    <option value="MM">Myanmar</option>
    <option value="NA">Namibia</option>
    <option value="NR">Nauru</option>
    <option value="NP">Nepal</option>
    <option value="NL">Holandia</option>
    <option value="AN">Antyle Holenderskie</option>
    <option value="NC">Nowa Kaledonia</option>
    <option value="NZ">Nowa Zelandia</option>
    <option value="NI">Nikaragua</option>
    <option value="NE">Niger</option>
    <option value="NG">Nigeria</option>
    <option value="NU">Niue</option>
    <option value="NF">Wyspa Norfolk</option>
    <option value="MP">Mariany Północne</option>
    <option value="NO">Norwegia</option>
    <option value="OM">Oman</option>
    <option value="PK">Pakistan</option>
    <option value="PW">Palau</option>
    <option value="PS">Teretorium Paleństynskie, Okupowane</option>
    <option value="PA">Panama</option>
    <option value="PG">Papua Nowa Gwinea</option>
    <option value="PY">Paragwaj</option>
    <option value="PE">Peru</option>
    <option value="PH">Filipiny</option>
    <option value="PN">Pitcairn</option>
    <option selected="selected" value="PL">Polska</option>
    <option value="PT">Portugalia</option>
    <option value="PR">Portoryko</option>
    <option value="QA">Katar</option>
    <option value="RE">Zjazd</option>
    <option value="RO">Rumunia</option>
    <option value="RU">Federacja Rosyjska</option>
    <option value="RW">Rwanda</option>
    <option value="BL">Saint Barthelemy</option>
    <option value="SH">Święta Helena</option>
    <option value="KN">Saint Kitts i Nevis</option>
    <option value="LC">święta Lucia</option>
    <option value="MF">święty Marcin</option>
    <option value="PM">Saint-Pierre i Miquelon</option>
    <option value="VC">Saint Vincent i Grenadyny</option>
    <option value="WS">Samoa</option>
    <option value="SM">San Marino</option>
    <option value="ST">Wyspy Świętego Tomasza i Książęca</option>
    <option value="SA">Arabia Saudyjska</option>
    <option value="SN">Senegal</option>
    <option value="RS">Serbia</option>
    <option value="CS">Serbia i Czarnogóra</option>
    <option value="SC">Seszele</option>
    <option value="SL">Sierra Leone</option>
    <option value="SG">Singapur</option>
    <option value="SX">St Martin</option>
    <option value="SK">Słowacja</option>
    <option value="SI">Słowenia</option>
    <option value="SB">Wyspy Salomona</option>
    <option value="SO">Somali</option>
    <option value="ZA">Afryka Południowa</option>
    <option value="GS">Georgia Południowa i Sandwich Południowy</option>
    <option value="SS">Południowy Sudan</option>
    <option value="ES">Hiszpania</option>
    <option value="LK">Sri Lanka</option>
    <option value="SD">Sudan</option>
    <option value="SR">Surinam</option>
    <option value="SJ">Svalbard i Jan Mayen</option>
    <option value="SZ">Suazi</option>
    <option value="SE">Szwecja</option>
    <option value="CH">Szwajcaria</option>
    <option value="SY">Republika Syryjsko-Arabska</option>
    <option value="TW">Tajwan, prowincja Chin</option>
    <option value="TJ">Tadżykistan</option>
    <option value="TZ">Tanzania, Zjednoczona Republika</option>
    <option value="TH">Tajlandia</option>
    <option value="TL">Timor Wschodni</option>
    <option value="TG">Iść</option>
    <option value="TK">Tokelau</option>
    <option value="TO">Tonga</option>
    <option value="TT">Trynidad i Tobago</option>
    <option value="TN">Tunezja</option>
    <option value="TR">indyk</option>
    <option value="TM">Turkmenia</option>
    <option value="TC">Wyspy Turks i Caicos</option>
    <option value="TV">Tuvalu</option>
    <option value="UG">Uganda</option>
    <option value="UA">Ukraina</option>
    <option value="AE">Zjednoczone Emiraty Arabskie</option>
    <option value="GB">Zjednoczone Królestwo</option>
    <option value="US">Stany Zjednoczone</option>
    <option value="UM">Stany Zjednoczone Dalekie Wyspy Mniejsze</option>
    <option value="UY">Urugwaj</option>
    <option value="UZ">Uzbekistan</option>
    <option value="VU">Vanuatu</option>
    <option value="VE">Wenezuela</option>
    <option value="VN">Viet Nam</option>
    <option value="VG">Wyspy Dziewicze, Brytyjskie</option>
    <option value="VI">Wyspy Dziewicze Stanów Zjednoczonych</option>
    <option value="WF">Wallis i Futuna</option>
    <option value="EH">Sahara Zachodnia</option>
    <option value="YE">Jemen</option>
    <option value="ZM">Zambia</option>
    <option value="ZW">Zimbabwe</option>
</select>
	</td>
  </tr>
  <tr>
  <tr>
    <td class="tg-0pky">Ulica</td>
    <td class="tg-0pky1"><input class="formularz"  type=text name="podmiot2_ulica"/></td>
  </tr>
  <tr>
    <td class="tg-0pky">Nr domu<span class="asterrisk">*</span></td>
    <td class="tg-0pky1"><input class="formularz" required  maxlength="4" size="4"  type=text name="podmiot2_nrdomu"/></td>
  </tr>
  <tr>
  <tr>
    <td class="tg-0pky">Nr lokalu</td>
    <td class="tg-0pky1"><input class="formularz" maxlength="4" size="4" type=text name="podmiot2_nrlokalu"/></td>
  </tr>
  <tr>
  <tr>
    <td class="tg-0pky">Miejscowość<span class="asterrisk">*</span></td>
    <td class="tg-0pky1"><input  class="formularz"  required type=text name="podmiot2_miejscowosc"/></td>
  </tr>
  <tr>
    <td class="tg-0pky">Kod pocztowy<span class="asterrisk">*</span></td>
    <td class="tg-0pky1"><input class="formularz" required type=text pattern="^[0-9]{2}-[0-9]{3}$" placeholder="12-123" maxlength="6" size="6" title="Nieprawidłowy format kodu pocztowego. xx-xxx" name="podmiot2_kodpocztowy"/></td>
  </tr>
  <tr>
    <td class="tg-0pky"></input>Email</td>
    <td class="tg-0pky1"><input class="formularz" type=email placeholder="twoj@email.com"  maxlength="64" size="64" name="podmiot2_email"/></td>
  </tr>
  <tr>
  <tr>
    <td class="tg-0pky">Telefon</td>
    <td class="tg-0pky1"><input class="formularz" type=tel pattern="[0-9]{9}$" placeholder="123456789"  maxlength="9" size="9" title="Nieprawidłowy format numeru telefonu." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="podmiot2_telefon"/></td>
  </tr>
  <tr>
    <td class="tg-0pky">Nr klienta</input></td>
    <td class="tg-0pky1"><input class="formularz" type=text name="podmiot2_nrklienta"/></td>
  </tr>
</tbody>
</table>
</div>
</div>
<div class="wiersz">
	<table class="tg" id="fakturawiersz">
  <tr>
    <th style="width:25px;" class="tg-7iun"><i class="fa fa-cog" style="display:flex;justify-content:center;"></i></th>
    <th class="tg-7iun1">Towar / usługa<span class="asterrisk">*</span></th>
    <th class="tg-7iun">Jm.</th>
    <th class="tg-7iun">Ilość</th>
    <th class="tg-7iun">Cena netto</th>
    <th class="tg-7iun">Wartość netto</th>
    <th class="tg-7iun">Stawka VAT</th>
    <th class="tg-7iun">Kwota VAT</th>
    <th class="tg-7iun">Wartość Brutto</th>
  </tr>
  <tr>
    <td><button type="button" class="fa fa-close" onclick="SomeDeleteRowFunction(this)" onclick="updatePrice(0)"></button></td>
    <td class="tg-wiersz">
		<select class="formularz" required onchange="updatePrice(0);setPriceAndTax(0)" id="wiersz_towar[0]" name="wiersz_towar[]"> 		 <option hidden disabled selected value></option></select>

	</td>
	    <td class="tg-wiersz">
	<select id="wiersz_jm[0]" name="wiersz_jm[]" class="formularz" onchange="updatePrice(0)" tabindex="-1"><option value="0">&nbsp;</option><option value="1">usł.</option><option value="2" selected="">szt.</option><option value="3">AT</option><option value="4">GJ</option><option value="5">MW</option><option value="6">doba</option><option value="7">dzień</option><option value="8">godz.</option><option value="9">gr</option><option value="10">grupa</option><option value="11">h</option><option value="12">hl</option><option value="13">kW</option><option value="14">kWh</option><option value="15">kg</option><option value="16">km</option><option value="17">kpl.</option><option value="18">kurs</option><option value="19">l</option><option value="20">m</option><option value="21">m2</option><option value="22">m3</option><option value="23">mb</option><option value="24">mies.</option><option value="25">min</option><option value="26">ml</option><option value="27">mp</option><option value="28">obw</option><option value="29">opak.</option><option value="30">par</option><option value="31">pkt.</option><option value="32">rolka</option><option value="33">strona</option><option value="34">słowa</option><option value="35">tona</option><option value="36">sem</option><option value="37">fracht</option><option value="38">osoba</option><option value="39">rbg</option><option value="40">Mg</option><option value="41">ryczałt</option><option value="42">udział</option><option value="43">pojemnik</option><option value="44">zabieg</option><option value="45">cm</option><option value="46">MWh</option><option value="47">ha</option><option value="48">kwartał</option><option value="49">yard</option><option value="50">etat</option><option value="51">abonament</option><option value="52">ar</option><option value="53">Kb</option><option value="54">KB</option><option value="55">MB</option><option value="56">GB</option><option value="57">TB</option><option value="58">MHZ</option><option value="59">mm</option><option value="60">MPA</option><option value="61">MVA</option><option value="62">g</option><option value="63">tys.</option><option value="64">bl.</option><option value="65">tkm</option><option value="66">pakiet</option><option value="67">osobogodzina</option><option value="68">pęczek</option><option value="69">hm</option><option value="70">dt</option><option value="71">osobodoba</option><option value="72">KMTR</option><option value="73">HM</option><option value="74">TSZT</option><option value="75">mth</option><option value="76">mtg</option></select></td>
    <td class="tg-wiersz"><input class="formularz" type="number" min="0" max="1000000" id="wiersz_ilosc[0]" name="wiersz_ilosc[]" onchange="updatePrice(0)" value="0"/></td>
    <td class="tg-wiersz">
	<input class="formularz" type="number" min="0.00" max="10000.00" step="0.01" lang="pl" placeholder="0,00" id="wiersz_cena_netto[0]" id="wiersz_cena_netto[0]" name="wiersz_cena_netto[]" onchange="updatePrice(0)"/></td>
    <td class="tg-wiersz">
	<input class="formularz_readonly" type="number" min="0.00" max="10000.00" step="0.01" lang="pl" placeholder="0,00" id="wiersz_wartosc_netto[0]" name="wiersz_wartosc_netto[]" readonly=""/></td>
    <td class="tg-wiersz">
	<select id="wiersz_stawka_vat[0]" name="wiersz_stawka_vat[]"  tabindex="-1" onchange="updatePrice(0)" class="formularz"><option value="0">zw.</option><option value="0">0%</option><option value="3">3%</option><option value="4">4%</option><option value="5">5%</option><option value="7">7%</option><option value="8">8%</option><option value="22">22%</option><option value="23" selected="">23%</option></td>
    <td class="tg-wiersz"><input class="formularz_readonly" type="number" min="0.00" max="10000.00" step="0.01" lang="pl" placeholder="0,00"  id="wiersz_kwota_vat[0]" name="wiersz_kwota_vat[]" readonly=""/></td>
    <td class="tg-wiersz"><input class="formularz_readonly" type="number" min="0.00" max="10000.00" step="0.01" lang="pl" placeholder="0,00" id="wiersz_wartosc_brutto[0]" name="wiersz_wartosc_brutto[]" readonly=""/></td>
  </tr>
</table>
	<table class="tg" id="fakturawiersz_podsumowanie">
  <tr>
    <td style="width:25px;"> <button type="button" class="fa fa-plus"  onclick="addField('fakturawiersz');" ></button></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="text-align:right;">Razem</td>
    <td class="tg-wiersz"><input class="formularz_readonly" type="number" min="0.00" max="10000.00" step="0.01" lang="pl" placeholder="0,00" name="wiersz_wartosc_netto_all" readonly=""/></td>
    <td>
	</td>
    <td class="tg-wiersz"><input class="formularz_readonly" type="number" min="0.00" max="10000.00" step="0.01" lang="pl" placeholder="0,00"  name="wiersz_kwota_vat_all" readonly=""/></td>
    <td class="tg-wiersz"><input class="formularz_readonly" type="number" min="0.00" max="10000.00" step="0.01" lang="pl" placeholder="0,00" name="wiersz_wartosc_brutto_all" readonly=""/></td>
  </tr>
</table>
</table>
	<table class="tg" id="fakturawiersz_dozaplaty">
  <tr>
    <td style="width:25px;"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="text-align:right;">Do zapłaty</td>
    <td class="tg-wiersz"><input class="formularz_readonly" type="number" min="0.00" max="10000.00" step="0.01" lang="pl" placeholder="0,00" name="wiersz_dozaplaty" readonly=""/></td>
	<td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</table>
	<table class="tg" id="fakturawiersz_dozaplaty">
  <tr>
    <td style="width:25px;"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="text-align:right;">Waluta</td>
    <td class="tg-wiersz">
	<select class="rozwij" name="fa_kodwaluty">
    <option value="AFN">AFN - Afghan Afghani</option>
    <option value="ALL">ALL - Albanian Lek</option>
    <option value="DZD">DZD - Algerian Dinar</option>
    <option value="AOA">AOA - Angolan Kwanza</option>
    <option value="ARS">ARS - Argentine Peso</option>
    <option value="AMD">AMD - Armenian Dram</option>
    <option value="AWG">AWG - Aruban Florin</option>
    <option value="AUD">AUD - Australian Dollar</option>
    <option value="AZN">AZN - Azerbaijani Manat</option>
    <option value="BSD">BSD - Bahamian Dollar</option>
    <option value="BHD">BHD - Bahraini Dinar</option>
    <option value="BDT">BDT - Bangladeshi Taka</option>
    <option value="BBD">BBD - Barbadian Dollar</option>
    <option value="BYR">BYR - Belarusian Ruble</option>
    <option value="BEF">BEF - Belgian Franc</option>
    <option value="BZD">BZD - Belize Dollar</option>
    <option value="BMD">BMD - Bermudan Dollar</option>
    <option value="BTN">BTN - Bhutanese Ngultrum</option>
    <option value="BTC">BTC - Bitcoin</option>
    <option value="BOB">BOB - Bolivian Boliviano</option>
    <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark</option>
    <option value="BWP">BWP - Botswanan Pula</option>
    <option value="BRL">BRL - Brazilian Real</option>
    <option value="GBP">GBP - British Pound Sterling</option>
    <option value="BND">BND - Brunei Dollar</option>
    <option value="BGN">BGN - Bulgarian Lev</option>
    <option value="BIF">BIF - Burundian Franc</option>
    <option value="KHR">KHR - Cambodian Riel</option>
    <option value="CAD">CAD - Canadian Dollar</option>
    <option value="CVE">CVE - Cape Verdean Escudo</option>
    <option value="KYD">KYD - Cayman Islands Dollar</option>
    <option value="XOF">XOF - CFA Franc BCEAO</option>
    <option value="XAF">XAF - CFA Franc BEAC</option>
    <option value="XPF">XPF - CFP Franc</option>
    <option value="CLP">CLP - Chilean Peso</option>
    <option value="CNY">CNY - Chinese Yuan</option>
    <option value="COP">COP - Colombian Peso</option>
    <option value="KMF">KMF - Comorian Franc</option>
    <option value="CDF">CDF - Congolese Franc</option>
    <option value="CRC">CRC - Costa Rican ColÃ³n</option>
    <option value="HRK">HRK - Croatian Kuna</option>
    <option value="CUC">CUC - Cuban Convertible Peso</option>
    <option value="CZK">CZK - Czech Republic Koruna</option>
    <option value="DKK">DKK - Danish Krone</option>
    <option value="DJF">DJF - Djiboutian Franc</option>
    <option value="DOP">DOP - Dominican Peso</option>
    <option value="XCD">XCD - East Caribbean Dollar</option>
    <option value="EGP">EGP - Egyptian Pound</option>
    <option value="ERN">ERN - Eritrean Nakfa</option>
    <option value="EEK">EEK - Estonian Kroon</option>
    <option value="ETB">ETB - Ethiopian Birr</option>
    <option value="EUR">EUR - Euro</option>
    <option value="FKP">FKP - Falkland Islands Pound</option>
    <option value="FJD">FJD - Fijian Dollar</option>
    <option value="GMD">GMD - Gambian Dalasi</option>
    <option value="GEL">GEL - Georgian Lari</option>
    <option value="DEM">DEM - German Mark</option>
    <option value="GHS">GHS - Ghanaian Cedi</option>
    <option value="GIP">GIP - Gibraltar Pound</option>
    <option value="GRD">GRD - Greek Drachma</option>
    <option value="GTQ">GTQ - Guatemalan Quetzal</option>
    <option value="GNF">GNF - Guinean Franc</option>
    <option value="GYD">GYD - Guyanaese Dollar</option>
    <option value="HTG">HTG - Haitian Gourde</option>
    <option value="HNL">HNL - Honduran Lempira</option>
    <option value="HKD">HKD - Hong Kong Dollar</option>
    <option value="HUF">HUF - Hungarian Forint</option>
    <option value="ISK">ISK - Icelandic KrÃ³na</option>
    <option value="INR">INR - Indian Rupee</option>
    <option value="IDR">IDR - Indonesian Rupiah</option>
    <option value="IRR">IRR - Iranian Rial</option>
    <option value="IQD">IQD - Iraqi Dinar</option>
    <option value="ILS">ILS - Israeli New Sheqel</option>
    <option value="ITL">ITL - Italian Lira</option>
    <option value="JMD">JMD - Jamaican Dollar</option>
    <option value="JPY">JPY - Japanese Yen</option>
    <option value="JOD">JOD - Jordanian Dinar</option>
    <option value="KZT">KZT - Kazakhstani Tenge</option>
    <option value="KES">KES - Kenyan Shilling</option>
    <option value="KWD">KWD - Kuwaiti Dinar</option>
    <option value="KGS">KGS - Kyrgystani Som</option>
    <option value="LAK">LAK - Laotian Kip</option>
    <option value="LVL">LVL - Latvian Lats</option>
    <option value="LBP">LBP - Lebanese Pound</option>
    <option value="LSL">LSL - Lesotho Loti</option>
    <option value="LRD">LRD - Liberian Dollar</option>
    <option value="LYD">LYD - Libyan Dinar</option>
    <option value="LTL">LTL - Lithuanian Litas</option>
    <option value="MOP">MOP - Macanese Pataca</option>
    <option value="MKD">MKD - Macedonian Denar</option>
    <option value="MGA">MGA - Malagasy Ariary</option>
    <option value="MWK">MWK - Malawian Kwacha</option>
    <option value="MYR">MYR - Malaysian Ringgit</option>
    <option value="MVR">MVR - Maldivian Rufiyaa</option>
    <option value="MRO">MRO - Mauritanian Ouguiya</option>
    <option value="MUR">MUR - Mauritian Rupee</option>
    <option value="MXN">MXN - Mexican Peso</option>
    <option value="MDL">MDL - Moldovan Leu</option>
    <option value="MNT">MNT - Mongolian Tugrik</option>
    <option value="MAD">MAD - Moroccan Dirham</option>
    <option value="MZM">MZM - Mozambican Metical</option>
    <option value="MMK">MMK - Myanmar Kyat</option>
    <option value="NAD">NAD - Namibian Dollar</option>
    <option value="NPR">NPR - Nepalese Rupee</option>
    <option value="ANG">ANG - Netherlands Antillean Guilder</option>
    <option value="TWD">TWD - New Taiwan Dollar</option>
    <option value="NZD">NZD - New Zealand Dollar</option>
    <option value="NIO">NIO - Nicaraguan CÃ³rdoba</option>
    <option value="NGN">NGN - Nigerian Naira</option>
    <option value="KPW">KPW - North Korean Won</option>
    <option value="NOK">NOK - Norwegian Krone</option>
    <option value="OMR">OMR - Omani Rial</option>
    <option value="PKR">PKR - Pakistani Rupee</option>
    <option value="PAB">PAB - Panamanian Balboa</option>
    <option value="PGK">PGK - Papua New Guinean Kina</option>
    <option value="PYG">PYG - Paraguayan Guarani</option>
    <option value="PEN">PEN - Peruvian Nuevo Sol</option>
    <option value="PHP">PHP - Philippine Peso</option>
    <option selected="selected" value="PLN">PLN - Polish Zloty</option>
    <option value="QAR">QAR - Qatari Rial</option>
    <option value="RON">RON - Romanian Leu</option>
    <option value="RUB">RUB - Russian Ruble</option>
    <option value="RWF">RWF - Rwandan Franc</option>
    <option value="SVC">SVC - Salvadoran ColÃ³n</option>
    <option value="WST">WST - Samoan Tala</option>
    <option value="SAR">SAR - Saudi Riyal</option>
    <option value="RSD">RSD - Serbian Dinar</option>
    <option value="SCR">SCR - Seychellois Rupee</option>
    <option value="SLL">SLL - Sierra Leonean Leone</option>
    <option value="SGD">SGD - Singapore Dollar</option>
    <option value="SKK">SKK - Slovak Koruna</option>
    <option value="SBD">SBD - Solomon Islands Dollar</option>
    <option value="SOS">SOS - Somali Shilling</option>
    <option value="ZAR">ZAR - South African Rand</option>
    <option value="KRW">KRW - South Korean Won</option>
    <option value="XDR">XDR - Special Drawing Rights</option>
    <option value="LKR">LKR - Sri Lankan Rupee</option>
    <option value="SHP">SHP - St. Helena Pound</option>
    <option value="SDG">SDG - Sudanese Pound</option>
    <option value="SRD">SRD - Surinamese Dollar</option>
    <option value="SZL">SZL - Swazi Lilangeni</option>
    <option value="SEK">SEK - Swedish Krona</option>
    <option value="CHF">CHF - Swiss Franc</option>
    <option value="SYP">SYP - Syrian Pound</option>
    <option value="STD">STD - São Tomé and Príncipe Dobra</option>
    <option value="TJS">TJS - Tajikistani Somoni</option>
    <option value="TZS">TZS - Tanzanian Shilling</option>
    <option value="THB">THB - Thai Baht</option>
    <option value="TOP">TOP - Tongan pa'anga</option>
    <option value="TTD">TTD - Trinidad & Tobago Dollar</option>
    <option value="TND">TND - Tunisian Dinar</option>
    <option value="TRY">TRY - Turkish Lira</option>
    <option value="TMT">TMT - Turkmenistani Manat</option>
    <option value="UGX">UGX - Ugandan Shilling</option>
    <option value="UAH">UAH - Ukrainian Hryvnia</option>
    <option value="AED">AED - United Arab Emirates Dirham</option>
    <option value="UYU">UYU - Uruguayan Peso</option>
    <option value="USD">USD - US Dollar</option>
    <option value="UZS">UZS - Uzbekistan Som</option>
    <option value="VUV">VUV - Vanuatu Vatu</option>
    <option value="VEF">VEF - Venezuelan BolÃ­var</option>
    <option value="VND">VND - Vietnamese Dong</option>
    <option value="YER">YER - Yemeni Rial</option>
    <option value="ZMK">ZMK - Zambian Kwacha</option>
</select>
</td>
	<td></td>
    <td></td>
    <td></td>
  </tr>
</table>



  </div>
  </div><div class="naglowek"><table class="tg">
<thead>
  <tr>
    <th class="tg-zapj">Data zapłaty<input type="hidden" value="0" name="fa_datazaplaty_checkbox"><input type="checkbox" name="fa_datazaplaty_checkbox"/></th>
    <th class="tg-zapj">Forma płatności</th>
    <th colspan="2"  style="text-align:center;" class="tg-zapj">Numer rachunku bankowego<br></th>
  </tr>
</thead>
<tbody>
  <tr>
	<td class="tg-0pky1"><input class="formularz" type="date" min="2022-01-01" step="1" value="<?php echo date('Y-m-d');?>" name="fa_datazaplaty"/></td>
	<td class="tg-0pky1"><select class="rozwij" name="fa_formaplatnosci">
		<option value="1">gotówka</option>
		<option value="2">karta</option>
		<option value="3">bon</option>
		<option value="4">czek</option>
		<option value="5">kredyt</option>
		<option selected="selected" value="6">przelew</option>
		<option value="6">mobilna</option>
	</select></td>
	<td class="tg-0pky1" colspan="2"><input class="formularz" maxlength="26" size="26"  type="text" pattern="^[0-9]{26}$" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" title="Nieprawidłowy format format NRB (Numer Rachunku Bankowego)" placeholder="49102028922276300500000000" name="fa_nrrachunkubankowego"/></td>
  </tr>
  <tr>
    <td class="tg-zapj">Data zamówienia<input type="hidden" value="0" name="fa_datazamowienia_checkbox"><input type="checkbox" name="fa_datazamowienia_checkbox"/><br></td>
    <td class="tg-zapj">Nr zamówienia<br></td>
    <td class="tg-zapj" colspan="2" style="text-align:center;">Dodatkowy opis<br></td>
  </tr>
  <tr>
     <td class="tg-0pky1"><input class="formularz" type="date" min="2022-01-01" step="1" value="<?php echo date('Y-m-d');?>" name="fa_datazamowienia"/></td>
    <td class="tg-0pky1"><input class="formularz" maxlength="240" size="240"  type="text" placeholder="9999999999" name="fa_nrzamowienia"/></td>
	<td class="tg-0pky1"><input class="formularz" maxlength="240" size="240" placeholder="Opis - klucz" type="text" name="fa_opis_klucz"/></td>
	<td class="tg-0pky1"><input class="formularz" maxlength="240" size="240" placeholder="Opis - wartość" type="text" name="fa_opis_wartosc"/></td>

  </tr>
</tbody>

</table> 
<button id="button-type1" type="button" onclick="showAdnotacje()">Pokaż adnotacje (zaawansowane)</button><br/>
<div class="naglowek" id="adnotacje" style="display:none;">
<table class="tg">
<tbody>
	<th class="tg-0pky" style="text-align:center;" colspan="4">Najedź na poszczególne pole, aby uzyskać więcej informacji co do danej adnotacji.</th>
  <tr>
    <td class="tg-0pky1" title="Zaznacz w przypadku dostawy towarów lub świadczenia usług, w odniesieniu do których obowiązek podatkowy powstaje zgodnie z art. 19a ust. 5 pkt 1 lub art. 21 ust. 1 ustawy - wyrazy 'metoda kasowa'">P_16 (metoda kasowa)<input type="hidden" value="2" name="fa_p_16"><input value="1" type="checkbox"  name="fa_p_16"/></td>
    <td class="tg-0pky1" title="Zaznacz w przypadku faktur, o których mowa w art. 106d ust. 1 ustawy - wyraz 'samofakturowanie'">P_17 (samofakturowanie)<input type="hidden" value="2" name="fa_p_17"><input  value="1"  type="checkbox" name="fa_p_17"/></td>
    <td class="tg-0pky1" title="Zaznacz w przypadku dostawy towarów lub wykonania usługi, dla których obowiązanym do rozliczenia podatku od wartości dodanej lub podatku o podobnym charakterze jest nabywca towaru lub usługi">P_18 (odwrotne obciążenie)<input type="hidden" value="2" name="fa_p_18"><input  value="1"  type="checkbox"  name="fa_p_18"/></td>
    <td class="tg-0pky1" title="Zaznacz w przypadku faktur, w których kwota należności ogółem przekracza kwotę 15 000 zł lub jej równowartość wyrażoną w walucie obcej, obejmujących dokonaną na rzecz podatnika dostawę towarów lub świadczenie usług, o których mowa w załączniku nr 15 do ustawy - wyrazy 'mechanizm podzielonej płatności', przy czym do przeliczania na złote kwot wyrażonych w walucie obcej stosuje się zasady przeliczania kwot stosowane w celu określenia podstawy opodatkowania">P_18A (mechanizm podzielonej płatności)<input type="hidden" value="2" name="fa_p_18a"><input  value="1"  type="checkbox"  name="fa_p_18a"/></td>
  </tr>
  <tr>
    <td class="tg-0pky1" title="Zaznacz w przypadku dostawy towarów lub świadczenia usług zwolnionych od podatku na podstawie art. 43 ust. 1, art. 113 ust. 1 i 9 albo przepisów wydanych na podstawie art. 82 ust. 3 ustawy lub na podstawie innych przepisów ">P_19 (zwoln. od podatku)<input type="hidden" value="2" name="fa_p_19"><input  value="1"  type="checkbox" name="fa_p_19"/></td>
    <td class="tg-0pky1" title="Zaznacz w przypadku gdy przedmiotem wewnątrzwspólnotowej dostawy są nowe środki transportu ">P_22 (nowe środki transportu)<input type="hidden" value="2" name="fa_p_22"><input  value="1"  type="checkbox"  name="fa_p_22"/></td>
    <td class="tg-0pky1" title="Zaznacz w przypadku faktur wystawianych w procedurze uproszczonej przez drugiego w kolejności podatnika, o którym mowa w art. 135 ust. 1 pkt 4 lit. b i c oraz ust. 2, zawierającej adnotację, o której mowa w art. 136 ust. 1 pkt 1 i stwierdzenie, o którym mowa w art. 136 ust. 1 pkt 2 ustawy ">P_23 (proc. uproszcz. przez drugiego w kolejności podatnika)<input type="hidden" value="2" name="fa_p_23"><input  value="1"  type="checkbox"  name="fa_p_23"/></td>
    <td class="tg-0pky1" title="Zaznacz w przypadku wystąpienia procedur marży, o których mowa w art. 119 lub 120 ustawy">P_PMarzy (wystąpienie marży)<input type="hidden" value="2" name="fa_p_pmarzy"><input  value="1"  type="checkbox" name="fa_p_pmarzy"/></td>
  </tr>
</tbody>
</table>
</div>
<div class="buttonHolder">
	<p class="info">Pola oznaczone <span class="asterrisk">*</span> są wymagane</p>
<input id="button-type2" type=submit value="Generuj"/></div>
  </form>
</div>
</body>
</html>