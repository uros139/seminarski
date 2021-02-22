<?php 
	session_start();
	if (!isset($_SESSION['uid'])) {
		header("location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>	
	<title>E-knjizara</title>
	<meta charset="utf-8">

	<!-- Favikon -->
	<link rel="icon" type="image/png" href="productImages/favicon.png">

	<!-- Link za CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/styleProdavnica.css"/>
	<link rel="stylesheet" type="text/css" href="css/styleCart.css"/>


	<!-- Link za JQuery -->
	<script type="text/javascript" src="js/jquery2.js"></script>
	<!-- <script src="js/jquery.js"></script> -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
	<!-- Link za Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>

</head>
<body>

	<div class="container">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar navbar-header">
					<a href="../home.php" class="navbar-brand"><span class="glyphicon glyphicon-book
"></span> E-knjizara</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Pocetna</a></li>
					<!-- <li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li> -->
				</ul>
			</div>
		</div>
		<p><br/></p>
		<p><br/></p>
		<p><br/></p>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" id="cart_msg">
					<!-- Cart Message!!! -->
				</div>
				<div class="col-md-2"></div>

			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-shopping-cart"></span> 
							<strong>Korpa Provera</strong>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-2"><b>Brisanje/Izmena</b></div>
								<div class="col-md-2"><b>Knjiga Slika</b></div>
								<div class="col-md-2"><b>Knjiga Naziv</b></div>
								<div class="col-md-2"><b>Kolicnia</b></div>
								<div class="col-md-2"><b>Cena Knjige</b></div>
								<div class="col-md-2"><b>Ukupna Cena $</b></div>							
							</div>

							<div id="cart_checkout">
								
							</div>
							<!--
							<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<div class="col-md-2">
								    <img src='productImages/LG G5.PNG' style="width: 65px; height: 65px;">
								</div>
								<div class="col-md-2">Product Name</div>
								<div class="col-md-2"><input type="" class="form-control" value="1" ></div>
								<div class="col-md-2">Quantity<input type="" class="form-control" value="1" disabled></div>
								<div class="col-md-2">Price in $<input type="" class="form-control" value="5000" disabled></div>			
							</div>
							-->
							<!-- <div class="row">
								<div class="col-md-8"></div>
								<div class="col-md-4">
									<b>Total $5000000</b>
								</div>
							</div> -->

						</div>
						<div class="panel-footer">
							<p align="center" style="color: white;">
								<strong><span class="glyphicon glyphicon-copyright-mark"></span>   
                            		Uros Totovic <?php echo date('Y'); ?>		
                            	</strong>
							</p>
						</div>

					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>

	<!-- Za muziku -->
	<div id="audio" style="display:none">
		<audio controls autoplay loop>
			<source src="audio/muzika.mp3" type="audio/mpeg">
			
		</audio>
	</div>
</body>
</html>
