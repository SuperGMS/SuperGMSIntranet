<?php
session_start();
$mysqli = new mysqli(
	'localhost',
	'admin_SuperGMSWHMCS',
	'Damian123123!',
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
	if ($result2['status'] == "Suspended" | $result2['status'] == "Expired") {
		if ($linkserver == 'mijn.district-rijnmond.net/licentie') {
		} else {
			header("Location: ./licentie");
		}
	}
} else {
	if ($result2['status'] == "Suspended" | $result2['status'] == "Expired") {
		if ($linkserver == 'mijn.district-rijnmond.net/licentie') {
		} else {
			header("Location: ./licentie");
		}
	}
}