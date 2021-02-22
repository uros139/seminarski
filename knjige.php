<!DOCTYPE html>
<html lang="sr">
<head>
	<meta charset="UTF-8">
	<title>E-knjižara</title>
	<script src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
	<link rel="icon" type="image/png" href="favicon.png">

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
	<script>
		window.onload = function(){
			ucitajKnjige();
		};
		function ucitajKnjige(){
			$.getJSON('servis1.php', function(data) {
			$.each (data.knjige, function(i,knjiga){
				$("#knjigaT tbody").append('<tr><td>'+knjiga.naziv+'</td><td>'+knjiga.godina+'</td><td>'+knjiga.ImeI+' '+knjiga.PrezimeI+'</td><td>'+knjiga.ImeA+' '+knjiga.PrezimeA+'</td><td>'+knjiga.ocena+'</td></tr>');
			})
			})
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
		$("#search").click(function(){
		var ocena = document.getElementById("poljePretraga").value;
		$("#knjigaT tr:gt(0)").remove();
		$.getJSON('servis1.php', { "uslov": ocena }, function(data) {
			$.each (data.knjige, function(i,knjiga){
				$("#knjigaT tbody").append('<tr><td>'+knjiga.naziv+'</td><td>'+knjiga.godina+'</td><td>'+knjiga.ImeI+' '+knjiga.PrezimeI+'</td><td>'+knjiga.ImeA+' '+knjiga.PrezimeA+'</td><td>'+knjiga.ocena+'</td></tr>');
			})
			})

		
});
});
</script>
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
				<li><a href="lokacija.php">Lokacija</a></li>
				<li><a href="glasanje.php">Glas za knjigu dana</a></li>
				<li><a href="prodavnica2/index.php">E-prodavnica</a></li> 
				<li><a href="login.php">LogIn</a></li>
			</ul>
		</div>
		<div id="content">
				<br>
				Prikazi sve knjige sa ocenom vecom ili jednakom od:
  				<input type="text" id="poljePretraga" name="poljeZaPretragu" required>
  				<input type="submit" value="Pronadji" id="search">
			<table id="knjigaT">
			<thead>
				<tr>
					<th>Naziv</th>
					<th>Godina</th>
					<th>Izdavac</th>
					<th>Autor</th>
					<th>Ocena</th>
				</tr>
			</thead>
			<tbody>

			</tbody>	
			</table>
		</div>
		<div id="footer">
			<p id="tim">
			Uros Totovic </p>
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