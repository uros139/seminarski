<?php
if (!isset ($_GET["naziv"])){
echo "Parametar Naziv nije prosleđen!";
} else {
$pomocna=$_GET["naziv"];
include "konekcija.php";

$sql="SELECT k.naziv,k.godina,a.ImeA,a.PrezimeA,i.ImeI FROM knjige k INNER JOIN autori a ON k.autor=a.idAutor INNER JOIN izdavaci i ON k.izdavac=i.idIzdavac WHERE naziv='".$pomocna."'";
$rezultat = $mysqli->query($sql);
$red = $rezultat->fetch_array(MYSQLI_NUM);

echo "<table   border='2px' border='solid' font-size='small' width='380px' height='150px' text-align='center' background-color='#d7eeef'>
<tr>
<th><b>Naziv</b></th>
<th><b>Godina</b></th>
<th><b>Ime autora</b> </th>
<th><b>Prezime autora</b> </th>
<th><b>Izdavac</b> </th>



</tr>";

 echo "<tr>";
 echo "<td>" . $red[0] . "</td>";
 echo "<td>" . $red[1] . "</td>";
 echo "<td>" . $red[2] . "</td>";
 echo "<td>" . $red[3] . "</td>";
 echo "<td>" . $red[4] . "</td>";

   
     

 echo "</tr>";

echo "</table>";
$target_dir = "D:\wamp64\www\itehProjekat\slike\ ";
$target_dir=trim($target_dir);
$target_file = $target_dir."$pomocna".".jpg";

}
$mysqli->close();
?>

