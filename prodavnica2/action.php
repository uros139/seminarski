<?php 	
	include "db.php"; 
	session_start();
?>
<?php 

// **za autore
if (isset($_POST["autor"])) {
	$autori_query="SELECT * FROM autori";
	$run_query=mysqli_query($con,$autori_query);
			
	?>
		<div class="nav nav-pills nav-stacked">
			<li class="active"><a href="#"><h4>Autori</h4></a></li>
	<?php
	if (mysqli_num_rows($run_query)>0) {
		while ($row=mysqli_fetch_array($run_query)) {
			$autor_id=$row["autor_id"];
			$autor_naziv=$row["autor_naziv"];
			
			?>
				<li><a href="#" class="autor" aid="<?php echo "$autor_id"; ?>"><?php echo "$autor_naziv"; ?></a></li>
			<?php
		}
		
		?>
			</div>
		<?php
	}
}
	

// **za izdavace
if (isset($_POST["izdavac"])) {
	$izdavaci_query="SELECT * FROM izdavaci";
	$run_query=mysqli_query($con,$izdavaci_query);
			
	?>
		<div class="nav nav-pills nav-stacked">
			<li class="active"><a href="#"><h4>Izdavaci</h4></a></li>
	<?php
	if (mysqli_num_rows($run_query)>0) {
		while ($row=mysqli_fetch_array($run_query)) {
			$izdavac_id=$row["izdavac_id"];
			$izdavac_naziv=$row["izdavac_naziv"];
			
			?>
				<li><a href="#" class="selectIzdavac" iid="<?php echo "$izdavac_id"; ?>"><?php echo "$izdavac_naziv"; ?></a></li>
			<?php
		}
		
		?>
			</div>
		<?php
	}
}

// za broj strana
if (isset($_POST['str'])) {
	$sql="SELECT * FROM knjige";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	// echo "$count"; //broj svih knjiga u bazi tipa sad je 21
	$broj_strana=ceil($count/9);//koliko strana ima sajt jer smo Limitirali na duzinu 9 (pa je ukupan br) proizvoda na jednoj strani
	// echo "$br_strana";

	for ($i=1; $i <=$broj_strana ; $i++) { 
		// ***!!!ovde dajem ID
		?>
			<li><a href="#" strana='<?php echo "$i"; ?>' id="strana"><?php echo "$i"; ?></a></li> 

		<?php

	}
}

// **za proizvode ***glavni za sve
if (isset($_POST["getProizvod"])) {
	$limit=9;
	// prvo proverimo da li su postavljeni brojevi strana
	if (isset($_POST['setStrana'])) {
		$broj_strane=$_POST['stranaBroj'];
		$start=($broj_strane *$limit)-$limit;		
	}else{
		$start=1;
	}

	$proizvodi_query="SELECT * FROM knjige LIMIT $start,$limit "; //prvi broj od kog elementa a drugi duzinu!!!
	$run_query=mysqli_query($con,$proizvodi_query);
	
	if (mysqli_num_rows($run_query)>0) {
		while ($row=mysqli_fetch_array($run_query)) {
			$knjiga_id=$row['knjiga_id'];
			$knjiga_autor=$row['knjiga_autor'];
			$knjiga_naziv=$row['knjiga_naziv'];
			$knjiga_cena=$row['knjiga_cena'];
			$knjiga_opis=$row['knjiga_opis'];
			$knjiga_image=$row['knjiga_image'];
			$knjiga_tag=$row['knjiga_tag'];
			?>
				<div class="col-md-4">
					<div class="panel panel-info">
						<div class="panel-heading"><?php echo "$knjiga_naziv"; ?></div>
						<div class="panel-body">
							<img src='productImages/<?php echo "$knjiga_image";  ?>'; style="width: 150px; height: 200px; " />
						</div>
						<div class="panel-heading"> $<?php echo "$knjiga_cena"; ?>.00<button kid="<?php echo "$knjiga_id"; ?>"  id="knjiga" class="btn btn-danger btn-xs" style="float:right;">Dodaj U Korpu</button>
						</div>
					</div>
				</div>
			<?php
		}		
	}
}

if (isset($_POST["get_selected_Autor"])) {
	$aid=$_POST["autor_id"];
	$sql="SELECT * FROM knjige WHERE knjiga_autor='$aid'";
	$run_query=mysqli_query($con,$sql);
	while ($row=mysqli_fetch_array($run_query)) {
			$knjiga_id=$row['knjiga_id'];
			$knjiga_autor=$row['knjiga_autor'];
			$knjiga_naziv=$row['knjiga_naziv'];
			$knjiga_cena=$row['knjiga_cena'];
			$knjiga_opis=$row['knjiga_opis'];
			$knjiga_image=$row['knjiga_image'];
			$knjiga_tag=$row['knjiga_tag'];
			?>
				<div class="col-md-4">
					<div class="panel panel-info">
						<div class="panel-heading"><?php echo "$knjiga_naziv"; ?></div>
						<div class="panel-body">
							<img src='productImages/<?php echo "$knjiga_image";  ?>'; style="width: 150px; height: 165px; "/ >
						</div>
						<div class="panel-heading">$<?php echo "$knjiga_cena"; ?>.00<button kid="<?php echo "$knjiga_id"; ?>" class="btn btn-danger btn-xs" style="float:right;" id="knjiga">Dodaj U Korpu</button>
						</div>

					</div>
				</div>
			<?php
	}

}

if (isset($_POST["selectIzdavac"])) {
	$iid=$_POST["izdavac_id"];
	$sql="SELECT * FROM knjige WHERE knjiga_izdavac='$iid'";
	$run_query=mysqli_query($con,$sql);
	while ($row=mysqli_fetch_array($run_query)) {
			$knjiga_id=$row['knjiga_id'];
			$knjiga_autor=$row['knjiga_autor'];
			$knjiga_naziv=$row['knjiga_naziv'];
			$knjiga_cena=$row['knjiga_cena'];
			$knjiga_opis=$row['knjiga_opis'];
			$knjiga_image=$row['knjiga_image'];
			$knjiga_tag=$row['knjiga_tag'];
			?>
				<div class="col-md-4">
					<div class="panel panel-info">
						<div class="panel-heading"><?php echo "$knjiga_naziv"; ?></div>
						<div class="panel-body">
							<img src='productImages/<?php echo "$knjiga_image";  ?>'; style="width: 150px; height: 165px;"/ >
						</div>
						<div class="panel-heading">$<?php echo "$knjiga_cena"; ?>.00<button kid="<?php echo "$knjiga_id"; ?>" class="btn btn-danger btn-xs" style="float:right;" id="knjiga">Dodaj U Korpu</button>
						</div>

					</div>
				</div>
			<?php
	}

}

if (isset($_POST["search"])) {
	$tag=$_POST["tag"];
	$sql="SELECT * FROM knjige WHERE knjiga_tag LIKE '%$tag%' ";
	$run_query=mysqli_query($con,$sql);
	while ($row=mysqli_fetch_array($run_query)) {
			// $pro_id=$row['product_id'];
			$knjiga_id=$row['knjiga_id'];
			$knjiga_autor=$row['knjiga_autor'];
			$knjiga_naziv=$row['knjiga_naziv'];
			$knjiga_cena=$row['knjiga_cena'];
			$knjiga_opis=$row['knjiga_opis'];
			$knjiga_image=$row['knjiga_image'];
			$knjiga_tag=$row['knjiga_tag'];
			?>
				<div class="col-md-4">
					<div class="panel panel-info">
						<div class="panel-heading"><?php echo "$knjiga_naziv"; ?></div>
						<div class="panel-body">
							<img src='productImages/<?php echo "$knjiga_image";  ?>'; style="width: 150px; height: 165px;"/ >
						</div>
						<div class="panel-heading"><?php echo "$knjiga_cena"; ?>.00<button kid="<?php echo "$knjiga_id"; ?>" class="btn btn-danger btn-xs" style="float:right;">Dodaj u Korpu</button>
						</div>

					</div>
				</div>
			<?php
	}
}

//***123
if (isset($_POST['dodavanjeKnjige'])) {
	// echo "123";
	$knjiga_id=$_POST['knjigaId'];
	$user_id=$_SESSION['uid'];
	// echo "$p_id";
	// echo "$user_id";
	$sql="SELECT * FROM korpa WHERE knjiga_id='$knjiga_id' AND user_id='$user_id' ";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	if ($count>0) {
		
		?>
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Knjiga je vec ubacena u korpu Nastavite Kupovinu...!!!</b>

			</div>
		<?php
	}else{
		// echo "456";
		$sql1="SELECT * FROM knjige WHERE knjiga_id='$knjiga_id' ";
		$run_query1=mysqli_query($con,$sql1);
		$row=mysqli_fetch_array($run_query1);
			// echo "789";
			$knjiga_id1=$row['knjiga_id'];
			$knjiga_autor=$row['knjiga_autor'];
			$knjiga_naziv=$row['knjiga_naziv'];
			$knjiga_cena=$row['knjiga_cena'];
			$knjiga_opis=$row['knjiga_opis'];
			$knjiga_image=$row['knjiga_image'];
			$knjiga_tag=$row['knjiga_tag'];
			
			$sql2 = "INSERT INTO `korpa` (`id_`, `knjiga_id`, `ip_add`, `user_id`, `knjiga_naziv`, `knjiga_image`, `qty`, `cena`, `ukupan_iznos`) VALUES (NULL, '$knjiga_id1', '0', '$user_id', '$knjiga_naziv', '$knjiga_image', '1', '$knjiga_cena', '$knjiga_cena');";
		$run_query2 = mysqli_query($con,$sql2);
		if ($run_query2) {
			// echo "izvrsen insert";
			?>
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Knjiga je Uspesno Dodata u Korpu...!!!</b>
				</div>
			<?php
		}
	}

}

// za profile.php u navigaciji za mnozenje Kolicina*Cena
if (isset($_POST['get_cart_product'])) {

	$uid=$_SESSION['uid'];
	$sql="SELECT * FROM korpa WHERE user_id='$uid' ";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	if ($count>0) {
		$no=1;
		$total_amt=0;
		while ($row=mysqli_fetch_array($run_query)) {
			$id=$row['id_'];
			$pro_id=$row['knjiga_id'];
			$pro_title=$row['knjiga_naziv'];
			$pro_image=$row['knjiga_image'];
			$pro_price=$row['cena'];			 
			$qty=$row['qty'];
			$total=$row['ukupan_iznos'];
			$price_array = array($total);
			$total_sum = array_sum($price_array);
			$total_amt = $total_amt + $total_sum;

			?>
				<div class="row">
					<div class="col-md-3"><?php echo "$no"; ?></div> <!-- Sl.no -->
					<div class="col-md-3"><img src='productImages/<?php echo "$pro_image";  ?>'; style="width: 60px;height: 60px; "/ ></div><!-- Product Image -->
					<div class="col-md-3"><?php echo "$pro_title"; ?></div><!-- Product Name -->
					<div class="col-md-3">$.<?php echo "$pro_price"; ?>.00</div><!-- Price in $. -->
				</div>
				
			<?php
			$no=$no+1;
		}
		?>
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<b>Ukupno: $ <?php echo "$total_amt"; ?></b>
				</div>
			</div>
		<?php
	}
}

// ***Za brojanje proizvoda u korpi u profile.php
if (isset($_POST['cart_count'])) {
	if (isset($_SESSION['uid'])) {
		$uid=$_SESSION['uid'];
		$sql="SELECT * FROM korpa WHERE user_id='$uid'";
		$run_query=mysqli_query($con,$sql);
		$count=mysqli_num_rows($run_query);
		echo "$count";
	}
	

}

//za checkout u cart.php za Qunantity,Price,Total
if (isset($_POST['cart_checkout'])) {
	$uid=$_SESSION['uid'];
	$sql="SELECT * FROM korpa WHERE user_id='$uid' ";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	if ($count>0) {
		$no=1;
		$total_amt=0;
		while ($row=mysqli_fetch_array($run_query)) {
			$id=$row['id_'];
			$pro_id=$row['knjiga_id'];
			$pro_title=$row['knjiga_naziv'];
			$pro_image=$row['knjiga_image'];
			$pro_price=$row['cena'];			 
			$qty=$row['qty'];
			$total=$row['ukupan_iznos'];
			$price_array = array($total);
			$total_sum = array_sum($price_array);
			$total_amt = $total_amt + $total_sum;
			 			
			?>

				<div class="row">
					<div class="col-md-2">
						<div class="btn-group">
							<a href="#" remove_id='<?php echo "$pro_id"; ?>' order_id='<?php echo "$id"; ?>' class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
							<a href="#" update_id='<?php echo "$pro_id"; ?>' class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
						</div>
					</div>
					<div class="col-md-2">
					    <img src='productImages/<?php echo "$pro_image"; ?>' style="width: 65px; height: 65px;">
					</div>
					<div class="col-md-2"><!-- Product Name --><?php echo "$pro_title"; ?></div> 					
					<div class="col-md-2"><!-- Quantity --><input type="text" class='form-control qty' pid='<?php echo "$pro_id"; ?>' id="qty-<?php echo "$pro_id"; ?>" value='<?php echo "$qty"; ?>' ></div><!-- ***PAZI!!!! u value mora '' a ne "" kad ima php !!!! -->
					<div class="col-md-2"><!-- Product Price --><input type="text" class='form-control price' pid='<?php echo "$pro_id"; ?>' id='price-<?php echo "$pro_id"; ?>' value='<?php echo "$pro_price"; ?>' disabled></div><!-- ***PAZI!!!! u value mora '' a ne "" kad ima php !!!! -->
					<div class="col-md-2"><!-- Price in $ --><input type="text" class='form-control total' pid='<?php echo "$pro_id"; ?>' id='total-<?php echo "$pro_id"; ?>' value='<?php echo "$total"; ?>' disabled></div>	<!-- ***PAZI!!!! u value mora '' a ne "" kad ima php !!!! -->		
				</div>
			<?php
			$no=$no+1;
		}

		?>
			<div class="row">
				<div class="col-md-8"></div>
				<div class="col-md-4">
					<b>Ukupno: $ <?php echo "$total_amt"; ?></b>
				</div>
			</div>

		<?php
	}
}

//za brisanje iz cart.php
if (isset($_POST['removeFromCart'])) {
	$pid=$_POST['removeId'];
	$oid=$_POST['orderId'];
	$uid=$_SESSION['uid'];
	$sql="DELETE FROM korpa WHERE id_='$oid'";
	$run_query=mysqli_query($con,$sql);
	if ($run_query) {
		
		?>
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Knjiga je Uspesno Obrisana iz Korpe Nastavite Kupovinu!!!</b>

			</div>
		<?php
	}
}

//za update cart.php
if (isset($_POST['updateProdactFromCart'])) {
	$pid=$_POST['updateId'];
	$uid=$_SESSION['uid'];	
	$qty=$_POST['qty'];
	$price=$_POST['price'];
	$total=$_POST['total'];
	// echo "$qty"; radi
	$sql="UPDATE korpa SET qty='$qty',cena='$price',ukupan_iznos='$total' WHERE user_id='$uid' AND knjiga_id='$pid' ";
	$run_query=mysqli_query($con,$sql);
	if ($run_query) {
		
		?>
			<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Broj Knjiga je Uspesno Izmenjen Korpi Nastavite Kupovinu!!!</b>
			</div>
		<?php
	}
}





?>