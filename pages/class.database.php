<?php
session_start();

$database['user'] = 'root';
$database['password'] = '1Damian123123!';
$database['database'] = 'admin_DistrictRijnmondSuperGMS';
$database['host'] = 'localhost';

$db = new MySQLi($database['host'], $database['user'], $database['password'], $database['database']);

if($db->connect_error){
    echo "Whoops, Geen database connectie! Meld dit aan Dishairano!<br>";
    echo "Error:(".$db->connect_errno."): ".$db->connect_error;
}

$linkGet = $db->query("SELECT * FROM Configuratie");
$linkFetch = $linkGet->fetch_array();

$link = $linkFetch['Link'];

$site = 'https://mijn.district-rijnmond.net/';

// Saltgenerator
function generateSalt(){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*";
    $salt = NULL;
    for($i = 0; $i < 8; $i++){
        $salt .= $chars[mt_rand(0, 69)];
    }
    return $salt;
}    

function generateRandomString($length){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $string = NULL;
    for($i = 0; $i < $length; $i++){
        $string .= $chars[mt_rand(0, 61)];
    }  
    return $string;
}  

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

if(isset($_SESSION['email'])){
    
    $userQuery = $db->query("SELECT * FROM users WHERE email = '".$db->real_escape_string($_SESSION['email'])."'");
    $userFetch = $userQuery->fetch_assoc();
    
    $ingemeldQuery = $db->query("SELECT * FROM gms_ingemeld WHERE uid = '".$db->real_escape_string($userFetch['id'])."'");
    $ingemeldFetch = $ingemeldQuery->fetch_assoc();

    $configuratieQuery = $db->query("SELECT * FROM Configuratie");
    $configuratieFetch = $configuratieQuery->fetch_assoc();
    
    $getGroepInc2 = $db->query("SELECT * FROM gms_incidentgroepen WHERE mkid = '".$userFetch['id']."'");
    $fetchGroepInc = $getGroepInc2->fetch_assoc();
}
