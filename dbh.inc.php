<?php



$host = "localhost";
$dbusername = "root";
$dbname ="sensori";
$dbpassword = "";


//data base handler
// .php file 
//no closing php tags ( pure php file)

// tietokannan yhteys pidetään erillisena 
try{

  $conn = new PDO("mysql:host=$host;dbname=$dbname",$dbusername,$dbpassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  exit ( "Connection failed: " . $e->getMessage());
}
