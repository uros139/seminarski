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
	<script type="text/javascript">
	$(document).ready(function(){
		 $("#email").blur(function(){
			proveriEmail();
		});
	})
		function proveriEmail(){ 
		var check=document.getElementById("email").value;
		 $.post("eksterniServis.php",
		    {
		        usr: "stefan",
		        pwd: "stefan",
		        check: check
		    },
		    function(data){
		       if(data=="BAD"){
		       	 alert("Uneli ste los e-mail!");
		       	 document.getElementById("email").value="";
		       }
		    });
		
		}
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
		
			<form method="GET" action="">
				<br>
				Ime:<br>
  				<input type="text" name="ime" required>
  				<br>
  				Prezime:<br>
  				<input type="text" name="prezime" required>
  				<br>
  				E-mail:<br>
  				<input type="text" id="email" name="email" required>
  				<br>
  				Komentar:<br>
  				<textarea rows="5" cols="50" name="kom" required>
				</textarea> <br>
				<input type="submit" value="Posalji">
			</form>
					<?php
					if (isset ($_GET['ime']) && isset ($_GET['prezime'])&& isset ($_GET['email'])&& isset ($_GET['kom'])){
							$url = 'http://localhost/itehProjekat/komentar';
							$curl = curl_init($url);
							$ime=$_GET['ime'];
							$prezime=$_GET['prezime'];
							$email=$_GET['email'];
							$kom=$_GET['kom'];

							curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
							curl_setopt($curl, CURLOPT_POST, true);

							$arr = array('Ime' => $ime, 'Prezime' => $prezime, 'Email' => $email, 'Komentar' => $kom);

							curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($arr));
							$curl_odgovor = curl_exec($curl);
							$json_objekat=json_decode($curl_odgovor);
							curl_close($curl);
							?>
					<div id="odgServisa">
					<p><?php echo $json_objekat->poruka;?></p>
					</div>
					<?php
					}
					?>
				
					 

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