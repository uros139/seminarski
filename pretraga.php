<!DOCTYPE html>
<html lang="sr">
<head>
	<meta charset="UTF-8">
	<title>E-knjižara</title>

	<link rel="stylesheet" type="text/css" href="style/style.css" />
	<link rel="icon" type="image/png" href="favicon.png">
	<script src="js/pronadjinaziv.js"type="text/javascript"></script>
	<script src="js/jszasuger.js"type="text/javascript"> </script>
	
	<script src="js/sugerisi.js" type="text/javascript"></script>
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
				<li><a href="lokacija.php">Lokacija</a></li>
				<li><a href="glasanje.php">Glas za knjigu dana</a></li>
				<li><a href="prodavnica2/index.php">E-prodavnica</a></li>
				<li><a href="login.php">LogIn</a></li> 
 
			</ul>
		</div>
		<div id="content">
			
			<input type="text" id="txt" size="20" onkeyup="sugestija(this.value)" title="Ukucaj naziv proizvoda koji trazis."> 
<input type="button" id="sub" value="Detalji knjige" onclick="PrikaziProizvod(document.getElementById('txt').value); obrisiizmeni('slikka')" >
      
<div id="livesearch"></div>




		</div>
		<div id="footer">
			<p id="tim">
			Uros Totovic</p>
			<p id="datum">
				<script>
					var datum = new Date();
					document.write(datum.getDate()+".02."+datum.getFullYear()+".");
				</script>
			</p>
		</div>

	</div>

<div id="audio" style="display:none">
	<audio controls autoplay loop>
	<source src="audio/muzika.mp3" type="audio/mpeg">
</audio></div>



</body>
</html>