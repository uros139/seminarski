<?php 
	
	include "konekcija.php";

	abstract class StavkaMenija
	{
		var $idAutor;
		var $ImeA;
		

		function __construct($ImeA){
			$this->ImeA = trim($ImeA);
			
		}

		abstract public function addToDatabase();

	}




	class Autor extends StavkaMenija
	{
		var $PrezimeA;
		var $brojNapisanihKnjiga;
		
		

		function __construct($ImeA,$PrezimeA,$brojNapisanihKnjiga)
		{
			parent::__construct($ImeA);
			$this->PrezimeA = $PrezimeA;
			$this->brojNapisanihKnjiga = $brojNapisanihKnjiga;
		
			

			
		}

		public function addToDatabase(){

						include "konekcija.php";

						$ImeAutora = $this->ImeA;
						$PrezimeAutora = $this->PrezimeA;
						$brojNapisanihKnjigaAutora = $this->brojNapisanihKnjiga;
						
						

						$sql="INSERT INTO autori (ImeA, PrezimeA, brojNapisanihKnjiga) VALUES ('".$ImeAutora."', '".$PrezimeAutora."','".$brojNapisanihKnjigaAutora."')";
						if ($mysqli->query($sql)){
								return true; } 
							else {
								return false;
						}
		}
	}

	
 
 ?>