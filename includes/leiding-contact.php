<?php
include_once("class.database.php");

$resultaat = $db->query("SELECT * FROM contact_leiding WHERE status = '1' OR status = '2' ORDER BY id");
$arr = array();

while($fetch = $resultaat->fetch(PDO::FETCH_ASSOC)){
    $arr[] = $fetch;
}
echo json_encode($arr);

?>