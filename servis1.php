<?php
if(isset($_GET['uslov'])){
	prikaziSaUslovom($_GET['uslov']);
}else{
 	prikaziSve();
}

function prikaziSve(){
	header("Content-type: application/json");?>{"knjige":<?php
require_once "konekcija.php";
$sql="SELECT naziv, godina, ImeA, PrezimeA, ImeI, PrezimeI, k.ocena FROM knjige k join autori a ON k.autor=a.idAutor join izdavaci i ON k.izdavac=i.idIzdavac";
if (!$q=$mysqli->query($sql)){
//ako se upit ne izvrši
echo '{"greska":"Nastala je greška pri izvršavanju upita."}';
exit();
} else {
//ako je upit u redu
if ($q->num_rows>0){
//ako ima rezultata u bazi
$niz = array();
while ($red=$q->fetch_object()){
$niz[] = $red;
}
// print_r ($niz);
$niz_json = json_encode ($niz);
print ($niz_json);
} else {
//ako nema rezultata u bazi
echo '{"greska":"Nema rezultata."}';
}
}
?>}<?php
}

function prikaziSaUslovom($uslov){
header("Content-type: application/json");?>{"knjige":<?php
if ($uslov>10) {
	echo '{"greska":"Ocene su od 1 do 10."}';
}
require_once "konekcija.php";
$sql="SELECT naziv, godina, ImeA, PrezimeA, ImeI, PrezimeI, k.ocena FROM knjige k join autori a ON k.autor=a.idAutor join izdavaci i ON k.izdavac=i.idIzdavac WHERE k.ocena>='".$uslov."'";
if (!$q=$mysqli->query($sql)){
//ako se upit ne izvrši
echo '{"greska":"Nastala je greška pri izvršavanju upita."}';
exit();
} else {
//ako je upit u redu
if ($q->num_rows>0){
//ako ima rezultata u bazi
$niz = array();
while ($red=$q->fetch_object()){
$niz[] = $red;
}
// print_r ($niz);
$niz_json = json_encode ($niz);
print ($niz_json);
} else {
//ako nema rezultata u bazi
echo '{"greska":"Nema rezultata."}';
}
}
?>}<?php
}
?>