<!DOCTYPE html>
<html lang="sr">
<head>
	<meta charset="UTF-8">
	<title>E-knjižara</title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
	<style>
	#dobrodosli{
		font-family: Comic Sans MS;
		font-size: 30px;
		top: 80px;
		left: 140px;
		position: absolute;
		background: rgba(255,0,0,0.3);
		}
	</style>
	<link rel="icon" type="image/png" href="favicon.png">

</head>
<body>
	<div id="wrap">
		<div id="header">
			<img class="hederi" src="img/header1.jpg">
		</div>
		<div id="meni">	
			<ul> 
				<li><a href="home.php">Početna</a></li> 
				<li><a href="knjige.php">Knjige</a></li>
				<li><a href="autori.php">Autori</a></li> 
				<li><a href="kontakt.php">Kontakt</a></li> 
				<li><a href="komentari.php">Komentari</a></li> 
			</ul>
		</div>
		<div id="content">
				<?php
					$url = 'http://localhost/itehProjekat/komentari';
					$curl = curl_init($url);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($curl, CURLOPT_POST, false);
					$curl_odgovor = curl_exec($curl);
					curl_close($curl);
					$parsiran_json = json_decode ($curl_odgovor);
				?>
				<h2>Svi komentari:</h2>
				<?php 
					foreach ($parsiran_json as $value) {
						$a = $value->Ime." ".$value->Prezime." : ".$value->Komentar;
						echo $a;
						echo "<br>";
					}
				 ?>
		</div>
		<div id="footer">
			<p id="tim">
			Stefan Uros Totovic </p>
			<p id="datum">
				<script>
					var datum = new Date();
					document.write(datum.getDate()+".12."+datum.getFullYear()+".");
				</script>
			</p>
		</div>

	</div>
</body>
</html>