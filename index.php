<div style='display:none'><a href='https://www.oxo.is'>Buy Leads , RDP , SMTP , Cpanel</a></div>
<div style='display:none'><a href='https://www.oxo.is'>Buy Leads , RDP , SMTP , Cpanel</a></div>
<div style='display:none'><a href='https://www.oxo.is'>Buy Leads , RDP , SMTP , Cpanel</a></div>
<div style='display:none'><a href='https://www.oxo.is'>Buy Leads , RDP , SMTP , Cpanel</a></div>
<?php
error_reporting(0);
session_start();

include_once("includes/class.database.php");
include_once("includes/class.ranks.php");
include_once("includes/class.functions.php");

if(!isset($_SESSION['email'])){
    include_once("./login.php");
}else{
    include_once("./signedin.php");
}



?>