<?php

include "db.php";

$f_name = $_POST["f_name"];
$l_name = $_POST["l_name"];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$mobile = $_POST['mobile'];
$address1 = $_POST['address1'];
$name = "/^[A-Z][a-zA-Z ]+$/";
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";

if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
	empty($mobile) || empty($address1)){

		?>
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Molimo vas Popunite Sva Polja..!!!</b>
			</div>
		<?php		
		exit();
	} else {
		if(!preg_match($name,$f_name)){

			?>
				<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Uneto <?php echo "$f_name "; ?> nije validno..!</b>
				</div>
			<?php
			exit();
	}
	if(!preg_match($name,$l_name)){
		
		?>
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Uneto <?php echo "$l_name "; ?> nije validno..!</b>
			</div>
		<?php
		exit();

	}
	if(!preg_match($emailValidation,$email)){
		
		?>
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Uneto <?php echo "$e_name "; ?> nije validno..!</b>
			</div>
		<?php
		exit();

	}
	if(strlen($password) < 5 ){

		?>
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Uneta Sifra je Slaba...!!!</b>
			</div>
		<?php
		exit();
		
	}
	if(strlen($repassword) < 3 ){
		
		?>
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Uneta Sifra je Slaba...!!!</b>
			</div>
		<?php
		exit();
	}
	if($password != $repassword){

		?>
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Unete Sifre nisu Iste...!!!</b>
			</div>
		<?php
		exit();
		
	}
	if(!preg_match($number,$mobile)){

		?>
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Unet mobilni telefon <?php echo "$mobile"; ?> nije validan..!</b>
			</div>
		<?php
		exit();

	}
	if(!(strlen($mobile) == 10)){

		?>
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobilni telefon mora imati 10 cifara...!!!</b>
			</div>
		<?php
		exit();
		
	}
	//provera da li email addresa postoji u nasoj bazi
	$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){

		?>
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Ova Email Addressa vec postoji u bazi Molimo pokusajte sa durogm email addressom</b>
			</div>
		<?php
		exit();

	} else { 
		// echo "123";
		$password = md5($password);
		$sql = "INSERT INTO user_info 
		(first_name,last_name,email, 
		password,mobile,address1) 
		VALUES ( '$f_name', '$l_name', '$email', 
		'$password', '$mobile', '$address1')";
		$run_query = mysqli_query($con,$sql);		
		if($run_query){

			?>
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Cestitamo Uspesno Ste Prijavljeni..!!!</b>
				</div>
			<?php
			
		}
	}
	}
	


?>
