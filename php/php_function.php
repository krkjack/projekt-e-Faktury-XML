<?php
	function genNextFakturaIndex($faktura_data) {
		$faktura_index=0;
		$array = scandir(__DIR__."\.."."\\faktury\\",1);
		$found = False;
		foreach ($array as &$file) {	
			$name = pathinfo($file, PATHINFO_FILENAME);
			if(strpos(strtolower($name), strtolower($faktura_data))) {
				$faktura_index=$faktura_index+1;
				$found=True;
			}
		}
		if($found) {
			$faktura_index=sprintf('%03d', $faktura_index);
		}
		else {
			$faktura_index=sprintf('%03d', "0");
		}
		return $faktura_index;
	}
?>