<?php 
	session_start();
	if (isset($_SESSION['uid'])) {
		header("location:profile.php");
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
					<li><a href="#"><span class="glyphicon glyphicon-home"></span> Pocetna</a></li>
					<!-- <li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>Proizvodi</a></li> -->
					<li style="width: 300px; left: 10px;top: 10px;"><input type="text" name="" class="form-control" id="search"></li>
					<li style="top: 10px;left: 20px;"><button class="btn btn-primary" id="search_btn"> Pretraga <span class="glyphicon glyphicon-search"></span></button>
					</li>
					<li style="top: 10px;left: 30px;"><button class="btn btn-primary" id="prikazSveKnjige_btn"> Prikaz Svih Knjiga <span class="glyphicon glyphicon-search"></span></button>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Korpa<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width: 400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">Redni broj</div> <!-- Serial number-->
									<div class="col-md-3">Slika Knjige</div>
									<div class="col-md-3">Naziv Knjige</div>
									<div class="col-md-3">Cena u $</div>								
								</div>
							</div>
							<div class="panel-body"></div>
							<div class="panel-footer"></div>

						</div>
					</div>
					</li>
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
					<!-- Pod meni -->
					<ul class="dropdown-menu">
						<div style="width: 300px;">
							<div class="panel panel-primary">
								<div class="panel-heading"><span class="glyphicon glyphicon-lock"></span> Prijavi se</div>
								<div class="panel-heading">
									<label for="email">Email</label>
									<input type="text" class="form-control" id="email" required/>
									<label for="email">Lozinka</label>
									<input type="text" class="form-control" id="password" required/>
									<p><br/></p>
									<!-- <a href="#" style="color: white; list-style: none;">Forgotten Password</a> -->
									<input type="submit" class="btn btn-success" style="float:right; " id="login" value="Potvrdi">
								</div>
								<div class="panel-footer" id="e_msg">
					
								</div>
							</div>
						</div>
					</ul>
					</li>
					<li><a href="customer_registration.php"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>	

				</ul>
			</div>
		</div>
		<p><br/></p>
		<p><br/></p>
		<p><br/></p>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					
					<!--Autori  -->
					<div id="get_autor">	
					<!-- Ajax -->
					</div>
					
				    <!--Za Kategorije  -->
					<!-- <div class="nav nav-pills nav-stacked">
						<li class="active"><a href="#"><h4>Categories</h4></a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
					</div> -->
					<!-- Izdavaci -->
					<div id="get_izdavac">
						<!-- Ajax -->
					</div>
										
					<!-- <div class="nav nav-pills nav-stacked">
						<li class="active"><a href="#"><h4>Brand</h4></a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
					</div> -->
				</div>
				<!-- ***PANEL veliki -->
				<div class="col-md-8">
					<div class="panel panel-info">
						<div class="panel-heading"><strong>Knjige</strong></div>
						<div class="panel-body">
						    <!--*** Panel POJEDINACNI(mali)   -->
						    <div id="get_proizvod">
						    	
						    </div>
						    <!-- Zbog Ajax-a -->
						    <!--*** Panel POJEDINACNI(mali)   -->
							<!-- <div class="col-md-4">
								<div class="panel panel-info">
									<div class="panel-heading">Samsung Galaxy</div>
									<div class="panel-body">
										<img src="productImages/images Samsungs7.png"/ style="width: 200px;">
									</div>
									<div class="panel-heading">$.500.00<button class="btn btn-danger btn-xs" style="float:right;">AddToCart</button>
									</div>

								</div>
							</div> -->
						</div>
						<div class="panel-footer" >
							<p align="center" style="color: white;">
								<strong><span class="glyphicon glyphicon-copyright-mark"></span>   
                            		Uros Totovic <?php echo date('Y'); ?>		
                            	</strong>
							</p>	

						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<center>
						<ul class="pagination" id="obelezavanje_strana"> <!-- mocna klasa za obelezavanje strana -->
							
							<!-- <li><a href="#">1</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">1</a></li> -->							

						</ul>
					</center>
				</div>
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