<?php
$vote = $_REQUEST['glas'];
$filename = "anketarezultati.txt";
$sadrzaj = file($filename);

$niz = explode("||", $sadrzaj[0]);
$odlicna = $niz[0];
$vrlodobra = $niz[1];
$dobra=$niz[2];
$losa=$niz[3];

if ($vote == 0) {
  $odlicna = $odlicna + 1;
}
if ($vote == 1) {
  $vrlodobra = $vrlodobra + 1;
}
if ($vote == 2) {
  $dobra = $dobra + 1;
}
if ($vote == 3) {
  $losa = $losa + 1;
}

$ubaciglas = $odlicna."||".$vrlodobra."||".$dobra."||".$losa;
$fp = fopen($filename,"w");
fputs($fp,$ubaciglas);
fclose($fp);
?>

<h2>Rezultati glasanja:</h2>
<table style="color:black">
<tr>
<td><b>Odlicna:<b></td>
<td>

<?php echo(100*round($odlicna/($vrlodobra+$odlicna+$dobra+$losa),2)); ?>%
</td>
</tr>
<tr>
<td><b>Vrlo dobra:<b></td>
<td>
<?php echo(100*round($vrlodobra/($vrlodobra+$odlicna+$dobra+$losa),2)); ?>%
</td>
</tr>
<tr>
<td><b>Dobra:<b></td>
<td>
<?php echo(100*round($dobra/($vrlodobra+$odlicna+$dobra+$losa),2)); ?>%
</td>
</tr>
<tr>
<td><b>Losa:<b></td>
<td>
<?php echo(100*round($losa/($vrlodobra+$odlicna+$dobra+$losa),2)); ?>%
</td>
</tr>
</table>