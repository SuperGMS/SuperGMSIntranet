<?php
include_once("class.database.php");

$afdeling = $db->quote($_POST['afdeling']);
$uid = $db->quote($_POST['uid']);
$naam = $db->quote($_POST['naam']);
$email = $db->quote($_POST['email']);
$onderwerp = $db->quote($_POST['onderwerp']);
$message = $db->quote($_POST['message']);

if(empty($afdeling)){
    ?><script>toastr.error("Je hebt geen afdeling ingevult!", "Oeps")</script><?php
}elseif(empty($uid)){
    ?><script>toastr.error("Het systeem doet iets fout!", "Oeps")</script><?php
}elseif(empty($naam)){
    ?><script>toastr.error("Het systeem doet iets fout!", "Oeps")</script><?php
}elseif(empty($email)){
    ?><script>toastr.error("Je hebt geen email ingevult!", "Oeps")</script><?php
}elseif(empty($onderwerp)){
    ?><script>toastr.error("Je hebt geen onderwerp ingevult!", "Oeps")</script><?php
}elseif(empty($message)){
    ?><script>toastr.error("Je hebt geen bericht ingevult!", "Oeps")</script><?php
}else{
    $query = $db->query("INSERT INTO contact_in (afdeling,naam,uid,email,onderwerp,message,date) VALUES (
    '".$afdeling."',
    '".$naam."',
    '".$uid."',
    '".$email."',
    '".$onderwerp."',
    '".$message."',
    NOW())");
    if($query){
        ?><script>toastr.success("Je bericht is verzonden naar je instructeur!", "Succes!")</script><?php
    }else{
        ?><script>toastr.error("Er ging iets mis met het versturen van je bericht!", "Oeps")</script><?php
    }
}

?>