<?php
  // prikaz datum u formatu dd.mm.yyyy
  function formatirajDatum($datum) {
	if (!$datum) {
	  return false;
	}
	
	$delovi = explode('-', str_replace(' ', '-', str_replace(':', '-', $datum)));
	
	// moze da se uradi na jedan od ova dva nacina
	//$formatiran = $delovi[2] . '.' . $delovi[1] . '.' . $delovi[0] . '.'; 
	$formatiran = "{$delovi[2]}.{$delovi[1]}.{$delovi[0]}.";
	
	return $formatiran;
  }
  
?>