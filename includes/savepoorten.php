<?php
include_once('class.database.php');
$content = $db->quote($_GET['content']);
$id = $db->quote($_GET['id']);

if($content == 'open' || $content == 'onbekend' || $content == 'dicht' || $content == 'upnp open' || $content == 'upnp nat open' || $content == 'nat open'){


        $updateQuery = $db->query("UPDATE users SET poort = '".$content."' WHERE id = '".$id."'");

        if($updateQuery){
            echo 'Succes';
        }else{
            echo 'Error';
        }
}else{
    echo 'Er gaat iets fout';
}
?>