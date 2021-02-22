<?php

require 'flight/Flight.php';
require 'jsonindent.php';

Flight::register('db', 'Database', array('book'));
$json_podaci = file_get_contents("php://input");
Flight::set('json_podaci', $json_podaci );


Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('POST /komentar', function(){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$podaci_json = Flight::get("json_podaci");
	$podaci = json_decode ($podaci_json);
	if ($podaci == null){
	$odgovor["poruka"] = "Niste prosledili podatke";
	$json_odgovor = json_encode ($odgovor);
	echo $json_odgovor;
	return false;
	} else {
	if (!property_exists($podaci,'Ime')||!property_exists($podaci,'Prezime')||!property_exists($podaci,'Email')||!property_exists($podaci,'Komentar')){
			$odgovor["poruka"] = "Niste prosledili korektne podatke";
			$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
			echo $json_odgovor;
			return false;
	} else {
			$podaci_query = array();
			foreach ($podaci as $k=>$v){
				$v = "'".$v."'";
				$podaci_query[$k] = $v;
			}
			if ($db->insert("komentari", "Ime, Prezime, Email, Komentar",
				array($podaci_query["Ime"], $podaci_query["Prezime"], $podaci_query["Email"], $podaci_query["Komentar"]))){
				$odgovor["poruka"] = "Komentar je uspešno poslat";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			} else {
				$odgovor["poruka"] = "Došlo je do greške pri slanju komentara";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
	}
	}	
	}
);

Flight::route('GET /komentari', function(){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->select("komentari","*",null);
	$niz=array();
	while ($red=$db->getResult()->fetch_object()){
		$niz[] = $red;
	}
	$json_niz = json_encode ($niz,JSON_UNESCAPED_UNICODE);
	echo indent($json_niz);
	return false;
});


Flight::start();
?>
