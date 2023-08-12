<?php
session_start();
$mysqli = new mysqli(
	'localhost',
	'admin_SuperGMSWHMCS',
	'GtyWiVjsM9di4PWi2mtw21s6X5TuF54YoFa7iFoDXONodqAHTl',
	'admin_SuperGMSWHMCS'
);
if ($mysqli->connect_error) {
	echo "Whoops, Geen database connectie! Meld dit aan Dishairano!<br>";
	echo "Error:(" . $mysqli->connect_errno . "): " . $mysqli->connect_error;
}

include_once("includes/class.database.php");

$configuratieQuery = $db->query("SELECT * FROM Configuratie");
$configuratieFetch = $configuratieQuery->fetch_assoc();

$licensekey = $configuratieFetch['stad'];
$linkserver = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$result = $mysqli->query("SELECT * FROM mod_licensing WHERE licensekey='" . $licensekey . "'");
$resultstatus = $mysqli->query("SELECT status FROM mod_licensing WHERE licensekey='" . $licensekey . "'");
$result2 = $result->fetch_assoc();

if ($result->num_rows == 0) {
	if (strpos($linkserver, '/licentie') === false) {
	  header("Location: ./licentie");
	  exit();
	}
  } else {
	if ($result2['status'] == "Suspended" || $result2['status'] == "Expired") {
	  if (strpos($linkserver, '/licentie') === false) {
		header("Location: ./licentie");
		exit();
	  }
	}
  }
  
