// JQuery funkcja do zapełnienia listy "Towar / usługa*" w index.php produktami z asortymentu
$(document).ready(function() {
$.getJSON("php/get-asortyment.php", function(return_data){
	$.each(return_data.data, function(key,value){
		$("#wiersz_towar\\[0\\]").append("<option value='" + value.towar + "' data-price=" + value.cena +" data-tax=" + value.stawka+">"+value.towar+"</option>");
		});
});
});

// Funkcja do automatycznego wyboru ceny oraz stawki VAT po wyborze produktu z listy
function setPriceAndTax(index) {
	$('#wiersz_cena_netto\\['+index+'\\]').val($('#wiersz_towar\\['+index+'\\] option:selected').attr('data-price'));
	$('#wiersz_stawka_vat\\['+index+'\\]').val($('#wiersz_towar\\['+index+'\\] option:selected').attr('data-tax')*100);
	updatePrice(index);
}

// Funkcja do dodawania kolejnych wierszy w fakturze
function addField( table ){
  var tableRef = document.getElementById(table);
  var newRow   = tableRef.insertRow(-1);
  var newCell = newRow.insertCell(0);
  var newElem = document.createElement('button');
  var index = document.getElementById("fakturawiersz").rows.length-2; // Indeks wiersza (-2 bo liczymy również wiersz nagłówkowy
  
  // Tworzenie kolejnego przycisku do usuwania tego wiersza
  newElem.className ="fa fa-close"; // Klasa ikony krzyżyka
  newElem.setAttribute("type", "button"); // Atrybut przycisku
  newElem.setAttribute("onclick", 'SomeDeleteRowFunction(this),updatePrice('+0+')') // Po kliknięciu usuwa wiersz i aktualizuje cenę
  newCell.appendChild(newElem); // Dodajemy nowy element (tutaj przycisk) do wiersza

  // Tworzenie kolejnego wiersza listy "Towar / usługa*"
  newCell = newRow.insertCell(1);
  newCell.className ="formularz"; // Klasa formularza 
  newElem = document.querySelector('select[name="wiersz_towar[]"').cloneNode(true); // Wybieramy startową listę i ją klonujemy
  newElem.value = "";
  newElem.setAttribute("id", "wiersz_towar["+index+"]"); // Aktualizacja indeksu dla ID wiersza
  newElem.setAttribute("onchange", "updatePrice("+index+");setPriceAndTax("+index+")"); // Aktualizacja indeksu dla funkcji wiersza
  newCell.appendChild(newElem); // Dodajemy element

  //  Tworzenie kolejnego wiersza listy "Jm."
  newCell = newRow.insertCell(2);
  newCell.className ="formularz";
  newElem = document.querySelector('select[name="wiersz_jm[]"').cloneNode(true);
  newElem.value = 2;
  newElem.setAttribute("id", "wiersz_jm["+index+"]");
  newElem.setAttribute("onchange", "updatePrice("+index+")");
  newCell.appendChild(newElem);
  
  //  Tworzenie kolejnego wiersza listy "Ilość"
  newCell = newRow.insertCell(3);
  newCell.className ="formularz";
  newElem = document.querySelector('input[name="wiersz_ilosc[]"').cloneNode(true);
  newElem.value = 0;
  newElem.setAttribute("id", "wiersz_ilosc["+index+"]");
  newElem.setAttribute("onchange", "updatePrice("+index+")");
  newCell.appendChild(newElem);

  newCell = newRow.insertCell(4);
  newCell.className ="formularz";
  newElem = document.querySelector('input[name="wiersz_cena_netto[]"').cloneNode(true);
  newElem.value = ""
  newElem.setAttribute("id", "wiersz_cena_netto["+index+"]");
  newElem.setAttribute("onchange", "updatePrice("+index+")");
  newCell.appendChild(newElem);
  
  newCell = newRow.insertCell(5);
  newCell.className ="formularz";
  newElem = document.querySelector('input[name="wiersz_wartosc_netto[]"').cloneNode(true);
  newElem.value = "";
  newElem.setAttribute("id", "wiersz_wartosc_netto["+index+"]");
  newCell.appendChild(newElem);

  newCell = newRow.insertCell(6);
  newCell.className ="formularz";
  newElem = document.querySelector('select[name="wiersz_stawka_vat[]"').cloneNode(true);
  newElem.value = 23 // Domyślna stawka VAT to 23%
  newElem.setAttribute("id", "wiersz_stawka_vat["+index+"]");
  newElem.setAttribute("onchange", "updatePrice("+index+")");
  newCell.appendChild(newElem);
  
  newCell = newRow.insertCell(7);
  newCell.className ="formularz";
  newElem = document.querySelector('input[name="wiersz_kwota_vat[]"').cloneNode(true);
  newElem.value = "";
  newElem.setAttribute("id", "wiersz_kwota_vat["+index+"]");
  newCell.appendChild(newElem);

  newCell = newRow.insertCell(8);
  newCell.className ="formularz";
  newElem = document.querySelector('input[name="wiersz_wartosc_brutto[]"').cloneNode(true);
  newElem.value = "";
  newElem.setAttribute("id", "wiersz_wartosc_brutto["+index+"]");
  newCell.appendChild(newElem);
  
}

// Funkcja do usuwania wiersza z faktury
window.SomeDeleteRowFunction = function SomeDeleteRowFunction(o) {
	 if (document.getElementById("fakturawiersz").rows.length-2!=0) { // Nie usuwamy pierwszego wiersza, conajmniej 1
     var p=o.parentNode.parentNode;
     p.parentNode.removeChild(p);
	 }
}

// Funkcja do obliczania oraz aktualizowania ceny
function updatePrice(index) {
	var index2 = document.getElementById("fakturawiersz").rows.length-1;
	var suma_netto=0
	var suma_vat=0
	var suma_brutto=0;
	
	// Pobieramy wartości netto/brutto poszczególnych towarów oraz ogółem
	var ilosc = document.getElementById('wiersz_ilosc['+index+']').value;
	var cena_netto = document.getElementById('wiersz_cena_netto['+index+']').value;
	var wartosc_netto = document.getElementById('wiersz_wartosc_netto['+index+']').value;
	var stawka_vat = (document.getElementById('wiersz_stawka_vat['+index+']').value)/100;
	var kwota_vat = document.getElementById('wiersz_kwota_vat['+index+']').value;
	var wartosc_brutto = document.getElementById('wiersz_kwota_vat['+index+']').value;
	var dozaplaty = document.getElementsByName('wiersz_dozaplaty')[0].value;
	
	// Obliczanie poszczególnych wartości towarów i ustawianie ich
	wartosc_netto =  Math.round(ilosc * cena_netto*100)/100;
	document.getElementById('wiersz_wartosc_netto['+index+']').value =  Math.round(ilosc * cena_netto*100)/100;
	kwota_vat =  Math.round(wartosc_netto * stawka_vat*100)/100;
	document.getElementById('wiersz_kwota_vat['+index+']').value = Math.round(wartosc_netto * stawka_vat*100)/100;
	wartosc_brutto = wartosc_netto + kwota_vat;
	document.getElementById('wiersz_wartosc_brutto['+index+']').value = wartosc_brutto;

    // Obliczanie ceny ogółem
	for (var i=0;i<index2;i++) {
		suma_netto += parseFloat(document.getElementById('wiersz_wartosc_netto['+i+']').value);
		suma_vat += parseFloat(document.getElementById('wiersz_kwota_vat['+i+']').value);
		suma_brutto += parseFloat(document.getElementById('wiersz_wartosc_brutto['+i+']').value);
	}
	
	// Ustawianie pól cen ogółem
	document.getElementsByName('wiersz_wartosc_netto_all')[0].value = Math.round(suma_netto*100)/100;
	document.getElementsByName('wiersz_kwota_vat_all')[0].value = Math.round(suma_vat*100)/100;
	document.getElementsByName('wiersz_wartosc_brutto_all')[0].value = Math.round(suma_brutto*100)/100;
	document.getElementsByName('wiersz_dozaplaty')[0].value = Math.round(suma_brutto*100)/100;
	
}

// Funkcja JQuery do pokazywania adnotacji (wysuwanie)
function showAdnotacje() {
  if ( $( "#adnotacje" ).is( ":hidden" ) ) {
    $( "#adnotacje" ).slideDown( "slow" );
  } else {
    $( "#adnotacje" ).slideUp("slow");
  }
}