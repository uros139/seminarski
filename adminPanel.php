

<html lang="sr">
<head>
	<meta charset="UTF-8">
	<title>E-knjižara</title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
	<?php include "objekti.php"; ?>
	<link rel="icon" type="image/png" href="favicon.png">
	<style>
	#admin{
		font-family: Comic Sans MS;
		font-size: 30px;
		color: #e6b3b3;
		background: rgba(255,0,0,0.3);
		}
	</style>
</head>
<body>



	<div id="wrap">
		<div id="header">
			<p id="admin"><b>ADMIN Panel</b> </p>
		</div>
		<div id="meni">	
			
			<a href="logout.php">Log out</a>
			<a href="izlistajknjige.php">Sve knjige</a>
		</div>
		<div id="content">
			<h1>DODAVANJE AUTORA</h1>
			<div id="dodajAutora">
				<form name="addJ" action="" method="post" accept-charset="utf-8">
   				 	<ul>
       			 		<li>Ime:
        					<input type="text" name="imeAutora" required></li>
        				
        				<li>Prezime: 
        					<input type="text" name="prezimeAutora" required></li>
        				<li>Broj napisanih knjiga: 
        					<input type="text" name="brojNapisanihKnjigaAutora" required></li>
        				
        					<input type="submit" value="Dodaj autora" name="SubmitButton"></li>
    				</ul>
				</form>
				<?php if(isset($_POST['SubmitButton'])) 
						{

						$imeAutora1 = $_POST["imeAutora"];
						
						$prezimeAutora1 = $_POST["prezimeAutora"];
						$brojNapisanihKnjigaAutora1 = $_POST["brojNapisanihKnjigaAutora"];
						

						$novoAutor = new Autor($imeAutora1,$prezimeAutora1,$brojNapisanihKnjigaAutora1);
						
						if ($novoAutor->addToDatabase()) {
							echo "<script>alert('Autor je uspesno ubacen!')</script>";
						} else {
							echo "<script>alert('Autor nije ubacen!')</script>";
						}
						}
				?>

			</div>
			
			<h1>BRISANJE AUTORA</h1>
			<div id="obrisiAutora">
				<?php
					include "konekcija.php";
					$sql="SELECT * FROM autori";
					$rezultat = $mysqli->query($sql);
				?>
				<form method="post"> 
					<b>Izaberi autora za brisanje:</b>
					<select name="autoriKombo">
				<?php
					while($red = $rezultat->fetch_object()){
				?>
					<option value="<?php echo $red->idAutor;?>"><?php echo $red->ImeA?></option>
				<?php
					}
				?>
					</select>
					<input type="submit" value="Obrisi autora" name="ObrisiAutora">
				</form>
				<?php if(isset($_POST['ObrisiAutora'])) 
						{
					   	include "konekcija.php";
					   	if (!isset ($_POST["autoriKombo"])){
							echo "Parametar ID nije prosleđen!";
						} else {
							$id=$_POST["autoriKombo"];
							$sql="DELETE FROM autori WHERE idAutor = ".$id;
							if ($mysqli->query($sql)){
									echo "<script>alert('Autor je uspesno izbrisan!')</script>";
									header("Refresh:0");
							} else {
								$greska = $mysqli->error;
								?>
							"<script>alert(<?php echo $greska; ?>)</script>" <?php 

								}
							}
						}
				?>
			</div>
			
			<br>
			<h1>IZMENA AUTORA</h1>
			<div id="Izmeni autora">
				<?php
					include "konekcija.php";
					$sql="SELECT * FROM autori";
					$rezultat = $mysqli->query($sql);
				?>
				<form method="post">
					<b>Izaberi autora za azuriranje:</b>
					<select name="autoriAzurirnje">
				<?php
					while($red = $rezultat->fetch_object()){
				?>
					<option value="<?php echo $red->idAutor;?>"><?php echo $red->ImeA;?></option>
				<?php
					}
				?>
					</select><br>
					<b>Izaberite atribut za azuriranje:</b>
					<select name="atributiAutora">
						<option value="ImeA">Ime</option>
						
						<option value="PrezimeA">Prezime</option>
						<option value="brojNapisanihKnjiga">brojNapisanihKnjiga</option>
						
					</select><br>
					<b>Unesite novu vrednost:</b>
					<input type="text" name="izmena">
					<input type="submit" value="Azuriraj" name="Azuriraj">
				</form>
				<?php if(isset($_POST['Azuriraj'])) 
						{
					   	include "konekcija.php";
					   	if (!isset ($_POST["autoriAzurirnje"]) || !isset ($_POST["atributiAutora"])){
							echo "Parametar ID nije prosleđen!";
						} else {
							$autorA=$_POST["autoriAzurirnje"];
							$atributA=$_POST["atributiAutora"];
							$vrednostA=$_POST["izmena"];
							$sql="UPDATE autori SET ".$atributA."='".$vrednostA."' WHERE idAutor = ".$autorA;
							if($mysqli->query($sql)){
									echo"<script>alert('Autor je azuriran!')</script>";
							}else {
								$greska = $mysqli->error;
								?>
							<script>alert(<?php echo $greska; ?>)</script>" <?php 

								}
							}
						}
				?>
			</div>
			
			
		
		

	
</body>
</html>