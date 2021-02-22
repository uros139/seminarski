<?php
class Database
{
private $hostname="localhost";
private $username="root";
private $password="";
private $dbname;
private $dblink; // veza sa bazom
private $result; // Holds the MySQL query result
private $records; // Holds the total number of records returned
private $affected; // Holds the total number of affected rows
function __construct($dbname)
{
$this->dbname = $dbname;
                $this->Connect();
}
public function getResult()
{
return $this->result;
}
public function getRecords(){
return $this->records;

}
//konekcija sa bazom
function Connect()
{
$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
if ($this->dblink ->connect_errno) {
    printf("Konekcija neuspešna: %s\n", $mysqli->connect_error);
    exit();
}
$this->dblink->set_charset("utf8");
}
//select funkcija
function select ($table,$rows,$where){
$q="select".$rows." from ".$table;
if($where!=null){
    $q.=" WHERE ".$where;
}
$this->ExecuteQuery($q);
//print_r($this->getResult()->fetch_object());
}

function insert ($table,$rows, $values){
$query_values = implode(',',$values);
$insert = 'INSERT INTO '.$table;  
            if($rows != null)  
            {  
                $insert .= ' ('.$rows.')';   
            }  
            $insert .= ' VALUES ('.$query_values.')';
if ($this->ExecuteQuery($insert))
return true;
else return false;
}
function update ($table, $id, $keys, $values){
$set_query = array();
for ($i=0; $i<sizeof($keys);$i++){
    $set_query[] = $keys[$i] . " = '".$values[$i]."'";
    }
    $set_query_string = implode(',',$set_query);


$update = "UPDATE ".$table." SET ". $set_query_string ." WHERE idKomentara='". $id."'";
if (($this->ExecuteQuery($update)) && ($this->affected >0))
return true;
else return false;
}
function delete ($table,  $key, $value)
{
$delete = "DELETE FROM ".$table." WHERE ".$key." = '".$value."'";
if ($this->ExecuteQuery($delete))
return true;
else return false;
}

//funkcija za izvrsavanje upita
function ExecuteQuery($query)
{
if($this->result = $this->dblink->query($query)){
if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
return true;
}
else
{
return false;
}
}
function close(){
    $this->dblink->close();
}
function CleanData()
{
//mysql_string_escape () uputiti ih na skriptu vezanu za bezbednost i sigurnost u php aplikacijama!!
}

}
?>
