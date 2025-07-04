<?php
include_once('class.database.php');
if(isset($_SESSION['email'])){
    $rank = array();
    $getRank = $db->query("SELECT * FROM user_rank WHERE uid = '".$userFetch['id']."'");
    while($fetchRank = $getRank->fetch_assoc()){
        
        $rankName = $db->query("SELECT * FROM ranks WHERE id = '".$fetchRank['rank_id']."'");
        $rankFetch = $rankName->fetch_assoc();
        
        $instructeur = $rankFetch['instructeur'];
        $teamleider = $rankFetch['teamleider'];
        $leiding = $rankFetch['bestuur'];
        $systeem = $rankFetch['naam'];
        $vertrouwenspersoon = $rankFetch['vertrouwenspersoon'];
        $development = $rankFetch['development'];
        
    }
}
?>