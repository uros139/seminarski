<?php
        include "konekcija2.php";

        $table="knjige";
        $sjoin="inner join autori ON knjige.autor=autori.idAutor inner join izdavaci ON knjige.izdavac=izdavaci.idIzdavac";
        $primaryKey='id';
        $columns = array(
array(
        'db' => 'id',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
            return $d;
        }
      ),
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'naziv',  'dt' => 1 ),
    array( 'db' => 'godina',   'dt' => 2 ),
    array( 'db' => 'ImeA',     'dt' => 3 ),
    array( 'db' => 'PrezimeA',     'dt' => 4 ),
    array( 'db' => 'ImeI',     'dt' => 5 ),
    array( 'db' => 'PrezimeI',     'dt' => 6 ),
    

);
$sql_details = array(
    'user' => $db_user,
    'pass' => $db_pass,
    'db'   => $db_db,
    'host' => $db_server
);


require( 'class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,$sjoin )
);
        
?>




